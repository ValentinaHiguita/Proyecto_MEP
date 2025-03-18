const db = require("../database");
const bcrypt = require("bcryptjs");
const jwt = require("jsonwebtoken");
const dotenv = require("dotenv");

dotenv.config(); // Cargar variables de entorno

// ✅ Obtener todos los usuarios
const getUsers = (req, res) => {
    db.query("SELECT * FROM users", (err, results) => {
        if (err) return res.status(500).json({ message: "Error al obtener usuarios", error: err.message });
        res.json(results);
    });
};

// ✅ Crear usuario (Registro)
const createUser = async (req, res) => {
    const { name, email, password } = req.body;

    if (!name || !email || !password) {
        return res.status(400).json({ message: "Todos los campos son requeridos" });
    }

    // Encriptar contraseña
    const hashedPassword = await bcrypt.hash(password, 10);

    db.query("INSERT INTO users (name, email, password) VALUES (?, ?, ?)", [name, email, hashedPassword], (err, result) => {
        if (err) return res.status(500).json({ message: "Error al crear usuario", error: err.message });
        res.json({ message: "Usuario creado", id: result.insertId });
    });
};

// ✅ Iniciar sesión
const loginUser = (req, res) => {
    const { email, password } = req.body;

    if (!email || !password) {
        return res.status(400).json({ message: "Todos los campos son requeridos" });
    }

    db.query("SELECT * FROM users WHERE email = ?", [email], async (err, results) => {
        if (err) return res.status(500).json({ message: "Error en la consulta", error: err.message });
        
        if (results.length === 0) {
            return res.status(401).json({ message: "Usuario no encontrado" });
        }

        const user = results[0];
        const isMatch = await bcrypt.compare(password, user.password);

        if (!isMatch) {
            return res.status(401).json({ message: "Contraseña incorrecta" });
        }

        // Generar token JWT
        const token = jwt.sign({ id: user.id, email: user.email }, process.env.JWT_SECRET, { expiresIn: "1h" });
        res.json({ message: "Inicio de sesión exitoso", token, user: { id: user.id, name: user.name, email: user.email } });
    });
};

// ✅ Recuperar contraseña
const recoverPassword = (req, res) => {
    const { email } = req.body;

    if (!email) {
        return res.status(400).json({ message: "El correo electrónico es requerido" });
    }

    db.query("SELECT * FROM users WHERE email = ?", [email], (err, results) => {
        if (err) return res.status(500).json({ message: "Error en la consulta", error: err.message });
        if (results.length === 0) {
            return res.status(404).json({ message: "Usuario no encontrado" });
        }
        
        res.json({ message: "Si el correo está registrado, recibirás instrucciones para restablecer tu contraseña" });
    });
};

// ✅ Asignar rol a usuario
const assignRole = (req, res) => {
    const { id } = req.params;
    const { role_id } = req.body;

    if (!role_id) {
        return res.status(400).json({ message: "Se requiere role_id," });
    }

    db.query("INSERT IGNORE INTO user_roles (user_id, role_id) VALUES (?, ?)", [id, role_id], (err, result) => {
        if (err) return res.status(500).json({ message: "Error al asignar rol", error: err.message });
        res.json({ message: "Rol asignado correctamente", affectedRows: result.affectedRows });
    });
};

module.exports = { getUsers, createUser, loginUser, recoverPassword, assignRole };

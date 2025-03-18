const express = require("express");
const router = express.Router();
const db = require("../database"); // Importando la conexión a la base de datos

// Ruta de prueba
router.get("/", (req, res) => {
    res.json({ message: "Rutas de usuario funcionando 🚀" });
});

// ✅ Ruta para asignar un rol a un usuario
router.post("/:userId/roles", (req, res) => {
    const { userId } = req.params;
    const { role_id } = req.body;

    if (!role_id) {
        return res.status(400).json({ message: "Se requiere role_id" });
    }

    // Verificar si el usuario existe
    db.query("SELECT * FROM users WHERE id = ?", [userId], (err, userResults) => {
        if (err) return res.status(500).json({ message: "Error interno", error: err.message });
        if (userResults.length === 0) return res.status(404).json({ message: "Usuario no encontrado" });

        // Verificar si el rol existe
        db.query("SELECT * FROM roles WHERE id = ?", [role_id], (err, roleResults) => {
            if (err) return res.status(500).json({ message: "Error interno", error: err.message });
            if (roleResults.length === 0) return res.status(404).json({ message: "Rol no encontrado" });

            // Asignar rol al usuario si no existe
            db.query("INSERT IGNORE INTO user_roles (user_id, role_id) VALUES (?, ?)", [userId, role_id], (err, result) => {
                if (err) return res.status(500).json({ message: "Error interno", error: err.message });
                res.status(201).json({ message: "Rol asignado correctamente", affectedRows: result.affectedRows });
            });
        });
    });
});

module.exports = router;


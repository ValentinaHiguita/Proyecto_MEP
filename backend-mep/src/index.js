const express = require("express");
const cors = require("cors");
const userRoutes = require("./routes/user.routes"); // Importamos las rutas de usuarios
const dotenv = require("dotenv");

dotenv.config(); // Carga las variables de entorno

const app = express();

// Middleware
app.use(cors()); // Permite peticiones desde el frontend
app.use(express.json()); // Permite recibir JSON en las peticiones

// Ruta principal de prueba
app.get("/", (req, res) => {
    res.json({ message: "Servidor corriendo correctamente" });
});

// Rutas de usuarios
app.use("/api", userRoutes);

// Middleware para manejar rutas no encontradas
app.use((req, res) => {
    res.status(404).json({ message: "Ruta no encontrada" });
});

// Iniciar servidor
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`✅ Servidor corriendo en http://localhost:${PORT}`);
});

const express = require('express');
const app = express();

app.use(express.json()); // Para procesar JSON en las solicitudes

app.post('/', (req, res) => {
    res.json({ message: "POST recibido correctamente en /" });
});

const PORT = 3000;
app.listen(PORT, () => {
    console.log(`Servidor corriendo en http://localhost:${PORT}`);
});

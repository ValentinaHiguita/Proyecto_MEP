document.addEventListener("DOMContentLoaded", () => {
    // Registro de usuario
    document.getElementById("register-btn")?.addEventListener("click", async () => {
        const name = document.getElementById("register-name").value;
        const email = document.getElementById("register-email").value;
        const password = document.getElementById("register-password").value;

        const response = await fetch("/api/users/register", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ name, email, password })
        });

        const data = await response.json();
        alert(data.message);
    });

    // Inicio de sesión
    document.getElementById("login-btn")?.addEventListener("click", async () => {
        const email = document.getElementById("login-email").value;
        const password = document.getElementById("login-password").value;

        const response = await fetch("/api/users/login", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ email, password })
        });

        const data = await response.json();
        if (response.ok) {
            localStorage.setItem("token", data.token);
            alert("Inicio de sesión exitoso");
        } else {
            alert(data.message);
        }
    });

    // Recuperar contraseña
    document.getElementById("forgot-password-btn")?.addEventListener("click", async () => {
        const email = document.getElementById("forgot-email").value;

        const response = await fetch("/api/users/recover-password", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ email })
        });

        const data = await response.json();
        alert(data.message);
    });
});

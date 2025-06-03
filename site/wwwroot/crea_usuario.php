<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registrar'])) {
    // Conexión a la base de datos
    $conn = new mysqli("localhost", "usuario_mysql", "TuContraseña123", "mi_sitio");

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Captura de datos
    $nombre_usuario = $_POST['nombre_usuario'];
    $correo = $_POST['correo'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT); // Encriptar

    // Insertar en la base de datos
    $sql = "INSERT INTO usuarios (nombre_usuario, correo, contrasena)
            VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nombre_usuario, $correo, $contrasena);

    if ($stmt->execute()) {
        echo "Usuario registrado correctamente.";
    } else {
        echo "Error al registrar: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de nuevo usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2>Crear nuevo usuario</h2>
        <form action="crea_usuario.php" method="POST">
            <div class="mb-3">
                <label for="usuario" class="form-label">Nombre de usuario:</label>
                <input type="text" class="form-control" id="usuario" name="nombre_usuario" required>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo electrónico:</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <div class="mb-3">
                <label for="contrasena" class="form-label">Contraseña:</label>
                <input type="password" class="form-control" id="contrasena" name="contrasena" required>
            </div>
            <button type="submit" class="btn btn-primary" name="registrar">Registrar</button>
            <a href="index.php" class="btn btn-link">¿Ya tienes cuenta? Inicia sesión</a>
        </form>
    </div>
</body>
</html>

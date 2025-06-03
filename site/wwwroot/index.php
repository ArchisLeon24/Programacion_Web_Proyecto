<?php
session_start();

// Evitar que el navegador almacene en caché esta página
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


// Si ya hay sesión activa, redirigir
if (isset($_SESSION['usuario'])) {
    header("Location: bloqueo.php");
    exit;
}

// Si hay cookie de recordar
if (isset($_COOKIE['usuario_recordado'])) {
    $_SESSION['usuario'] = $_COOKIE['usuario_recordado'];
    header("Location: bloqueo.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Iniciar Sesión</h2>
        <form method="POST" action="login.php">
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario</label>
                <input type="text" class="form-control" name="usuario" required>
            </div>
            <div class="mb-3">
                <label for="clave" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="clave" required>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="recordar" value="1">
                <label class="form-check-label">Recuérdame</label>
            </div>
            <button type="submit" class="btn btn-primary">Ingresar</button>
		</form>
		<div class="mt-3">
			<a href="crea_usuario.php" class="btn btn-secondary">Crear nuevo usuario</a>
			</div>
        <div class="mt-3">
            <a href="crea_usuario.php">Crear nuevo usuario</a><br>
            <a href="reset-password.php">Recuperar contraseña</a><br>
        </div>
    </div>
	
	<script>
    // Si el usuario llega usando el botón "Atrás", forzar recarga
    window.addEventListener('pageshow', function (event) {
        if (event.persisted) {
            window.location.reload();
        }
    });
	</script>
	<script src="JS/bootstrap.bundle.min.js"></script>
</body>
</html>

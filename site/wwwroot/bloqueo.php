<?php
session_start();
session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Zona Protegida</title>
    <link rel="stylesheet" href="lib/Bootstrap/css/bootstrap.min.css">
</head>
<body class="bg-white">
    <div class="container mt-5">
        <h1>Bienvenido, <?= htmlspecialchars($_SESSION['usuario']) ?></h1>
        <p>Estás dentro de una zona protegida del sistema. No se puede ingesar poniendo el link en el navegador</p>
        <a href="logout.php" class="btn btn-danger">Cerrar Sesión</a>
    </div>
	<script>
    // Forzar recarga si la página viene de caché del navegador
    window.addEventListener('pageshow', function (event) {
        if (event.persisted) {
            window.location.reload();
        }
    });
</script>

</body>
</html>

<?php
session_start();

// Simulamos una base de datos de usuario
$usuario_valido = 'admin';
$clave_valida = '12345';

$usuario = $_POST['usuario'] ?? '';
$clave = $_POST['clave'] ?? '';
$recordar = $_POST['recordar'] ?? '';

if ($usuario === $usuario_valido && $clave === $clave_valida) {
    $_SESSION['usuario'] = $usuario;

    if ($recordar) {
        setcookie("usuario_recordado", $usuario, time() + (86400 * 30), "/"); // 30 días
    }

    header("Location: Bienvenida.php");
} else {
    echo "<script>alert('Usuario o contraseña incorrectos'); window.location='index.php';</script>";
}

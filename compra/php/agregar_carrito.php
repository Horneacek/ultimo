<?php
session_start();

// Asegurarse de que el carrito exista
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

// Recibir datos del formulario
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];

// Agregar paquete al carrito
$_SESSION['carrito'][] = array(
    'id' => $id,
    'nombre' => $nombre,
    'precio' => $precio
);

// Redireccionar a carrito
header("Location: carrito.php");
exit();
?>

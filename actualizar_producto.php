<?php
#Entrada
$id = $_GET['id'];
$nombre = $_POST["nombre"];
$precio = $_POST["precio"];
$descripcion = $_POST["descripcion"];

#Proceso

$db = new PDO('mysql:host=localhost;dbname=proyecto_taller_software; charset=utf8mb4', 'root', '');
$stmt = $db->query("UPDATE productos SET nombre='$nombre', precio='$precio', descripcion='$descripcion' WHERE id_producto = '$id'");

#Salida

header("Location:productos.php");

?>
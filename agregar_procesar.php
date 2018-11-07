<?php
#Entrada

$nombre = $_POST["nombre"];
$precio = $_POST["precio"];
$descripcion = $_POST["descripcion"];
$img = $_POST["img"];

#Proceso

$db = new PDO('mysql:host=localhost;dbname=proyecto_taller_software; charset=utf8mb4', 'root', '');
$stmt = $db->query("INSERT INTO productos VALUES (NULL, '$nombre', '$descripcion', '$precio', '$img')");


#Salida

header("Location: productos.php");


?>
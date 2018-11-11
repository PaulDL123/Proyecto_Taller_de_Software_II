<?php
#Entrada

$nombre = $_POST["nombre"];
$precio = $_POST["precio"];
$descripcion = $_POST["descripcion"];
$img = addslashes(file_get_contents($_FILES['img']['tmp_name']));

#Proceso

$db = new PDO('mysql:host=localhost;dbname=proyecto_taller_software; charset=utf8mb4', 'root', '');
$stmt = $db->query("INSERT INTO productos VALUES (NULL, '$nombre', '$descripcion', '$precio', '$img')");

#Salida

header("Location: productos.php");


?>
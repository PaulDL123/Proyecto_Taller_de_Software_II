<?php
#Entrada

$id = $_POST["id_producto"];

#Proceso

$db = new PDO('mysql:host=localhost;dbname=proyecto_taller_software; charset=utf8mb4', 'root', '');
$stmt = $db->query("DELETE FROM productos WHERE id_producto = '$id'");

#Salida

header('Location: operaciones_prod.php')

?>
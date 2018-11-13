<?php
#Entrada

$idusuario = $_POST["id_usuario"];
$idproducto = $_POST["id_producto"];
$dec = $_POST["decision"];
#Proceso

$db = new PDO('mysql:host=localhost;dbname=proyecto_taller_software; charset=utf8mb4', 'root', '');
$stmt = $db->query("INSERT INTO carrito VALUES (NULL, '$idusuario', '$idproducto')");

#Salida

header("Location: $dec");

?>
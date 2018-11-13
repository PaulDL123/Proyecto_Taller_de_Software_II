<?php
#Entrada

$idusuario = $_POST["id_usuario"];
$idproducto = $_POST["id_producto"];

#Proceso

$db = new PDO('mysql:host=localhost;dbname=proyecto_taller_software; charset=utf8mb4', 'root', '');
$stmt = $db->query("INSERT INTO carrito VALUES (NULL, '$idusuario', '$idproducto')");


#Salida

header("Location: prod_unidad.php?id=$idproducto?aceptar")

?>
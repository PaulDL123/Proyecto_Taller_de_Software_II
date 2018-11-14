<?php
#Entrada

$idusuario = $_POST["id_usuario"];
$idproducto = $_POST["id_producto"];
$dec = $_POST["decision"];
#Proceso

$db = new PDO('mysql:host=localhost;dbname=proyecto_taller_software; charset=utf8mb4', 'root', '');
$stmt = $db->query("SELECT * FROM carrito WHERE idusuario='$idusuario' AND idproducto='$idproducto'");
$prod_carrito = $stmt->fetchObject();


if(count(($prod_carrito)==1){
    $cant = $prod_carrito->cantidad + 1;
    $stmt2 = $db->query("UPDATE carrito SET cantidad = '$cant' WHERE idusuario='$idusuario' AND idproducto='$idproducto'");
}else{
    $stmt1 = $db->query("INSERT INTO carrito VALUES (NULL, '$idusuario', '$idproducto', '1', 'no')");
}

#Salida

header("Location: $dec");

?>
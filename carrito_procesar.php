<?php
#Entrada

$idusuario = $_POST["id_usuario"];
$idproducto = $_POST["id_producto"];
$dec = $_POST["decision"];
#Proceso

$db = new PDO('mysql:host=localhost;dbname=proyecto_taller_software; charset=utf8mb4', 'root', '');
#die("SELECT * FROM carrito WHERE idusuario='$idusuario' AND idproducto='$idproducto'");
$stmt = $db->query("SELECT * FROM carrito WHERE idusuario='$idusuario' AND idproducto='$idproducto'");
$prod_carrito = $stmt->fetch();


//echo isset($prod_carrito["cantidad"]);
//die();
if(isset($prod_carrito["cantidad"])){

    $stmt2 = $db->query("UPDATE carrito SET cantidad = cantidad+1 WHERE idusuario='$idusuario' AND idproducto='$idproducto'");
}else{
    $stmt1 = $db->query("INSERT INTO carrito VALUES (NULL, '$idusuario', '$idproducto', '1', 'no')");
}

#Salida

header("Location: $dec");

?>
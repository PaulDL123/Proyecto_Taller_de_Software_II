<?php

session_start();
$user = $_SESSION['usuario'];

$db = new PDO('mysql:host=localhost;dbname=proyecto_taller_software; charset=utf8mb4', 'root', '');
$stmt = $db->query("SELECT * FROM usuarios WHERE usuario = '$user'");
$usuarios = $stmt->fetch();
$iduser = $usuarios["id"];

$stmt1 = $db->query("SELECT * FROM carrito INNER JOIN productos ON carrito.idproducto = productos.id_producto WHERE idusuario = '$iduser' AND pedido='no'");
$carrito = $stmt1->fetchAll();

foreach($carrito as $c){
    $stmt = $db->query("UPDATE carrito SET pedido='si'");
}

header("Location: carrito.php")

?>
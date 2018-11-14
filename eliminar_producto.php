<?php
#Entrada

$id = $_POST["id_producto"];
$vuelta = $_POST["vuelta"];

#Proceso
$db = new PDO('mysql:host=localhost;dbname=proyecto_taller_software; charset=utf8mb4', 'root', '');
if($vuelta == 1){
    $stmt = $db->query("DELETE FROM productos WHERE id_producto = '$id'");

    header('Location: operaciones_prod.php');
}else{
    $stmt = $db->query("DELETE FROM carrito WHERE id_carrito = '$id'");
    header('Location: carrito.php');
}



#Salida



?>
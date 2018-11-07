<?php
#Entrada

$nombre = $_POST["nombre"];
$precio = $_POST["precio"];
$descripcion = $_POST["descripcion"];
$img = $_FILES['img']['name'];

#Proceso

$db = new PDO('mysql:host=localhost;dbname=proyecto_taller_software; charset=utf8mb4', 'root', '');
$stmt = $db->query("INSERT INTO productos VALUES (NULL, '$nombre', '$descripcion', '$precio', '$img')");

if($stmt){
    echo '<script type="text/javascript"> alert("Agregado correctamente"); window.location="productos.php";</script>';
}
#Salida

header("Location: productos.php");


?>
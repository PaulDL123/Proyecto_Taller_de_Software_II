<?php
#Entrada

$correo = $_POST["correo"];
$password = $_POST["password"];
$nombres = $_POST["nombres"];
$apellidos = $_POST["apellidos"];
$usuario = $_POST["usuario"];

#Proceso

$password = sha1($password);//sirve para encriptar a la variable 'password'

$db = new PDO('mysql:host=localhost;dbname=proyecto_taller_software; charset=utf8mb4', 'root', '');
$stmt = $db->query("INSERT INTO usuarios VALUES (NULL, '$nombres', '$apellidos', '$usuario', '$correo', '$password')");

#Salida

header("Location: registro_confirmar.php");

?>
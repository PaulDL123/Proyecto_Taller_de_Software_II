<?php
#Entrada
$id = $_POST['id'];
$nombres = $_POST["nombres"];
$apellidos = $_POST["apellidos"];
$usuario = $_POST["usuario"];
$email = $_POST["email"];

#Proceso

$db = new PDO('mysql:host=localhost;dbname=proyecto_taller_software; charset=utf8mb4', 'root', '');
$stmt = $db->query("UPDATE usuarios SET nombres='$nombres', apellidos='$apellidos', usuario='$usuario', correo='$email' WHERE id = '$id'");
session_start();
$_SESSION["usuario"]=$usuario;
#Salida

header("Location:index.php");

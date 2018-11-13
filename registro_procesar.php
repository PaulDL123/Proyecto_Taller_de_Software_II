<?php
#Entrada

$correo = $_POST["email"];
$password = $_POST["password"];
$nombres = $_POST["nombres"];
$apellidos = $_POST["apellidos"];
$usuario = $_POST["usuario"];

#Proceso

$db = new PDO('mysql:host=localhost;dbname=proyecto_taller_software; charset=utf8mb4', 'root', '');
$stmt = $db->query("SELECT * FROM usuarios WHERE usuario = '$usuario'");
$user = $stmt->fetchAll();


if(count($user) == 0){
    $password = sha1($password);//sirve para encriptar a la variable 'password'
    
    $stmt = $db->query("INSERT INTO usuarios VALUES (NULL, '$nombres', '$apellidos', '$usuario', '$correo', '$password', 'usuario')");
    session_start();
    $_SESSION["usuario"]=$usuario;

    header("Location: registro_confirmar.php");
}else{

    header("Location: registro.php?error=0");
}



?>
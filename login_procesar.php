<?php 
#Entrada

$usuario = $_POST["usuario"];
$password = $_POST["password"];
$retorno = $_POST["retorno"];
#Proceso

#$password = sha1($password);
$db = new PDO('mysql:host=localhost;dbname=proyecto_taller_software; charset=utf8mb4', 'root', '');
$stmt = $db->query("SELECT * FROM usuarios WHERE (usuario = '$usuario' OR correo='$usuario') AND password = '$password'");
$usuarios = $stmt->fetchAll();

$validacion = false;
if (count($usuarios) == 1) {
    # Datos correctos
    $validacion = true;
    session_start();
    $_SESSION["usuario"]= $usuario;
}
#Salida

if ($validacion) {
    header("Location: $retorno");
}
else{
    header("Location: $retorno?error=1");
}

?>
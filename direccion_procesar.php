<?php
#Entrada

$idusuario = $_POST["id_usuario"];
$tipo_direccion = $_POST["tipo_direccion"];
$direccion = $_POST["direccion"];
$lote = $_POST["lote"];
$departamento = $_POST["departamento"];
$urbanizacion = $_POST["urbanizacion"];
$referencia = $_POST["referencia"];
$distrito = $_POST["distrito"];

#Proceso

$db = new PDO('mysql:host=localhost;dbname=proyecto_taller_software; charset=utf8mb4', 'root', '');
$stmt = $db->query("SELECT * FROM direcciones_usuario INNER JOIN direcciones ON direcciones_usuario.id_direccion = direcciones.id_direccion WHERE id_usuario = '$idusuario' AND direccion='$direccion' AND lote='$lote' AND distrito = '$distrito'");
$dir = $stmt->fetchAll();



if(count($dir) == 0){
    $stmt1 = $db->query("INSERT INTO direcciones VALUES (NULL, '$tipo_direccion', '$direccion', '$lote', '$departamento', '$urbanizacion', '$referencia', '$distrito')");

    $stmt2 = $db->query("SELECT * FROM direcciones WHERE direccion='$direccion' AND lote='$lote' AND distrito = '$distrito'");
    $iddir = $stmt2->fetch();

    $id_dir = $iddir["id_direccion"];


    $stmt1 = $db->query("INSERT INTO direcciones_usuario VALUES ('$id_dir', '$idusuario')");
    
}

#Salida

header("Location: direcciones.php");

?>
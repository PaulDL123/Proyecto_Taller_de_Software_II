<?php

session_start();
$user = $_SESSION['usuario'];

$db = new PDO('mysql:host=localhost;dbname=proyecto_taller_software; charset=utf8mb4', 'root', '');
$stmt = $db->query("SELECT * FROM usuarios WHERE usuario = '$user'");
$usuarios = $stmt->fetchObject();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    <?php include'links.html'; ?>
    <link rel="stylesheet" href="style/perfil.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>
    <?php include('login.php') ?>
    <?php if(!isset($_SESSION["usuario"])) { if(isset($_GET["error"])) { ?>
    <p style="color: red; background-color: black; margin:0; text-align: right; padding: 0 350px;">Error, datos no válidos</p>
    <?php } }?>

    <?php include('partes/navegador.php'); ?>

    <section id="contenedor_padre">
        <section id="izq">
            <h5>MI CUENTA</h5>
            <div>
                <span>Mi perfil</span>
                <ul>
                    <li><a href="perfil.php">Mis datos personales</a></li>
                    <li><a href="direcciones.php">Mis direcciones</a></li>
                </ul>
            </div>
        </section>
        <section id="der">
            <h1>MIS DIRECCIONES</h1>
            <div>
                
            </div>
        </section>
    </section>

    <?php include('partes/footer.php') ?>
</body>
</html>
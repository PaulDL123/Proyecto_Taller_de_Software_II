<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    <?php include'links.html' ?>
</head>
<body>
    <?php include('login.php') ?>
    <?php if(!isset($_SESSION["usuario"])) { if(isset($_GET["error"])) { ?>
    <p style="color: red; background-color: black; margin:0; text-align: right; padding: 0 350px;">Error, datos no válidos</p>
    <?php } }?>
    
    <?php include('partes/navegador.php') ?>
    <section id="contenedor_padre">

    </section>
    

    <?php include('partes/footer.php') ?>
</body>
</html>
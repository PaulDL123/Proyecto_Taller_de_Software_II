<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Diseñar</title>
    <?php include'links.html' ?>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>
    <?php include('login.php') ?>
    <?php include('partes/header.php') ?>
    <?php include('partes/navegador.php') ?>
    <section id="contenedor_padre">
        <h1>Formulario de registro de usuario</h1>
        <p>Usuario registrado con éxito</p>
    </section>
    <?php include('partes/footer.php') ?>
</body>
</html>
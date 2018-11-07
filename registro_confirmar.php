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
    <link rel="stylesheet" href="style/estilos.css">
    <link rel="stylesheet" href="style/formulario_estilo.css">
    <link rel="stylesheet" href="style/estilo_cabecera.css">
</head>
<body>
    <?php include('login.php') ?>
    <?php include('partes/header.php') ?>
    <?php include('partes/navegador.php') ?>

    <h1>Formulario de registro de usuario</h1>
    <p>Usuario registrado con éxito</p>

    <?php include('partes/footer.php') ?>
</body>
</html>
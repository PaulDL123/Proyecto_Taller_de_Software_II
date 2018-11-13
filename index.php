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
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>
    <?php include('login.php') ?>
    <?php if(!isset($_SESSION["usuario"])) { if(isset($_GET["error"])) { ?>
    <p style="color: red; background-color: black; margin:0; text-align: right; padding: 0 350px;">Error, datos no válidos</p>
    <?php } }?>
    <?php include('partes/header.php') ?>
    <?php include('partes/navegador.php') ?>

    <section style="width: 70%; margin: 20px 15%; text-align:justify;">
        <h1>Nosotros</h1>

        <p>Somos una empresa dedicada a la producción de muebles de madera, nos hemos convertido rápidamente en la principal proveedora de muebles para las más importantes cadenas de tiendas por departamentos del país.</p>
        <p>Hoy en día, nuestra empresa es líder en la producción de puertas, muebles de baño y closets para lo cual contamos con una fábrica moderna con maquinarias de vanguardia que permiten lograr como resultado, productos de altísima calidad, logrando satisfacer no solo importantes clientes inmobiliarios del país sino también del extranjero.</p>
        
        <h1>Nuestros servicios</h1>
        
        <div style="display:flex; height: 400px; margin: 0 auto; justify-content: space-around; text-align:center;">
            <div style="width: 400px;">
                <img src="accesorios/armado de muebles.png" style="width: 80%; heigth: 200px; margin: 5%;">
                <h4>Armado de muebles</h4>
            </div>
            <div style="width: 400px;">
                <img src="accesorios/diseño-muebles.jpg" style="width: 80%; height:214px; margin: 5%;">
                <h4>Diseño de muebles</h4>
            </div>
            
        </div>
    </section>

    <?php include('partes/footer.php') ?>
</body>
</html>
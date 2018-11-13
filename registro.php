<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
    <?php include'links.html' ?>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>
    
    <?php include('login.php') ?>
    <?php if(isset($_GET["error"])) { ?>
    <p style="color: red; background-color: black; margin:0; text-align: right; padding: 0 350px;">Error, datos no válidos</p>
    <?php } ?>

    
    <?php include('partes/header.php') ?>
    <?php include('partes/navegador.php') ?>
    <section id="contenedor_padre">
        <h1>Formulario de registro de usuario</h1>
        <form action="registro_procesar.php" method="post">
            <div>
                Nombres: <br>
                <input type="text" name="nombres" required>
            </div>
            <div>
                Apellidos: <br>
                <input type="text" name="apellidos" required>
            </div>
            <div>
                Usuario: <br>
                <input type="text" name="usuario" required>
            </div>
            <div>
                Correo: <br>
                <input type="email" name="email" required>
            </div>    
            <div>
                Contraseña: <br>
                <input type="password" name="password" required>
            </div>
            <div>
                <button type="submit">Enviar</button>
            </div>
        </form>
    </section>
    <?php include('partes/footer.php') ?>
</body>
</html>
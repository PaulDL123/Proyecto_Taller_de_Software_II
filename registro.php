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

    

    <?php include('partes/navegador.php') ?>
    <section id="contenedor_padre">
        <h1>Formulario de registro de usuario</h1>
        <form action="registro_procesar.php" method="post">
            <div class="form-group">
                Nombres: <br>
                <input class="form-control" type="text" name="nombres" placeholder="Ingrese sus nombres" required>
            </div>
            <div class="form-group">
                Apellidos: <br>
                <input class="form-control" type="text" name="apellidos" placeholder="Ingrese sus apellidos" required>
            </div>
            <div class="form-group">
                Usuario: <br>
                <input class="form-control" type="text" name="usuario" placeholder="Ingrese su usuario" required>
            </div>
            <div class="form-group">
                Correo: <br>
                <input class="form-control" type="email" name="email" placeholder="Ingrese correo" required>
            </div>    
            <div class="form-group">
                Contraseña: <br>
                <input class="form-control" type="password" name="password" placeholder="Ingrese su contraseña" required>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </section>
    <?php include('partes/footer.php') ?>
</body>
</html>
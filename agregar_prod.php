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
    <link rel="stylesheet" href="style/estilos.css">
    <link rel="stylesheet" href="style/formulario_estilo.css">
    <link rel="stylesheet" href="style/estilo_cabecera.css">
</head>
<body>
    <?php include('login.php') ?>
    <?php if(isset($_GET["error"])) { ?>
    <p style="color: red; background-color: black; margin:0; text-align: right; padding: 0 350px;">Error, datos no válidos</p>
    <?php } ?>
    <?php include('partes/header.php') ?>
    <?php include('partes/navegador.php') ?>

    <form action="agregar_procesar.php" method="post">
        <div>
            Nombre:
            <input type="text" name="nombre">
        </div>
        <div>
            Precio:
            <input type="float" name="precio">
        </div>
        <div>
            Descripción:
            <textarea name="descripcion" cols="30" rows="10"></textarea>
        </div>
        <div>
            Imagen:
            <input type="file" name="img">
        </div>
        <div>
            <button type="submit">Enviar</button>
        </div>
    </form>

    <?php include('partes/footer.php') ?>
</body>
</html>
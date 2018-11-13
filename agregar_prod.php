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
    <?php if(isset($_GET["error"])) { ?>
    <p style="color: red; background-color: black; margin:0; text-align: right; padding: 0 350px;">Error, datos no válidos</p>
    <?php } ?>
    <?php include('partes/navegador.php') ?>

    <section id="contenedor_padre">
        <form action="agregar_procesar.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                Nombre:
                <input class="form-control" type="text" name="nombre">
            </div>
            <div class="form-group">
                Precio:
                <input class="form-control" type="float" name="precio">
            </div>
            <div class="form-group">
                Descripción:
                <textarea class="form-control" name="descripcion" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                Imagen:
                <input class="form-control" type="file" name="img" accept="image/*">
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </section>
    <?php include('partes/footer.php') ?>
</body>
</html>
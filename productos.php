<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos</title>
    <link rel="stylesheet" href="style/estilos.css">
    <link rel="stylesheet" href="style/formulario_estilo.css">
</head>
<body>
    <?php include('login.php') ?>
    <?php if(isset($_GET["error"])) { ?>
    <p style="color: red; background-color: black; margin:0; text-align: right; padding: 0 350px;">Error, datos no válidos</p>
    <?php } ?>
    <?php include('partes/header.php') ?>
    <?php include('partes/navegador.php') ?>

    

    <?php include('partes/footer.php') ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
    <link rel="stylesheet" href="style/estilos.css">
</head>
<body>
    <?php include('partes/header.php') ?>
    <?php include('partes/navegador.php') ?>

    <h1>Formulario de registro de usuario</h1>
    <form action="registro_procesar.php" method="post">
        <div>
            Nombres: <br>
            <input type="text" name="nombres">
        </div>
        <div>
            Apellidos: <br>
            <input type="text" name="apellidos">
        </div>
        <div>
            Usuario: <br>
            <input type="text" name="usuario">
        </div>
        <div>
            Correo: <br>
            <input type="email" name="email">
        </div>    
        <div>
            Contraseña: <br>
            <input type="password" name="password">
        </div>
        <div>
            <button type="submit">Enviar</button>
        </div>
    </form>
    <?php include('partes/footer.php') ?>
</body>
</html>
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
    <?php include'links.html'; ?>
    <link rel="stylesheet" href="style/perfil.css">
</head>
<body>
    <?php include('login.php') ?>
    <?php if(!isset($_SESSION["usuario"])) { if(isset($_GET["error"])) { ?>
    <p style="color: red; background-color: black; margin:0; text-align: right; padding: 0 350px;">Error, datos no válidos</p>
    <?php } }?>

    <?php include('partes/navegador.php'); ?>

    <section>
        <section id="izq">
            <h5>MI CUENTA</h5>
            <div>
                <span>Mi perfil</span>
                <ul>
                    <li><a href="perfil.php">Mis datos personales</a></li>
                    <li><a href="perfil.php">Mis direcciones</a></li>
                </ul>
            </div>
        </section>
        <section id="der">
            <h1>MIS DATOS PERSONALES</h1>
            <div>
                <form action="">
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
            </div>
        </section>
    </section>

    <?php include('partes/footer.php') ?>
</body>
</html>
<?php
session_start();
$id = $_GET['id'];

$db = new PDO('mysql:host=localhost;dbname=proyecto_taller_software; charset=utf8mb4', 'root', '');

$stmt = $db->query("SELECT * FROM productos WHERE id_producto = '$id'");
$productos = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    <?php include'links.html' ?>
    <link rel="stylesheet" href="style/prod_unidad.css">
</head>
<body>

    <?php include('login.php') ?>
    <?php if(isset($_GET["error"])) { ?>
    <p style="color: red; background-color: black; margin:0; text-align: right; padding: 0 350px;">Error, datos no válidos</p>
    <?php } ?>


    <?php include('partes/navegador.php') ?>

    
    <?php foreach ($productos as $p) {?>
    <section id="prod">
        <div id="nombre">
            <h1><?php echo $p["nombre"]; ?></h1>
        </div>
        <section id="down">
            <div id="imagen">
                <img src="data:image/jpg;base64,<?php echo base64_encode($p["imagen"]);?>" >
            </div>
            <div id="info">
                <div id="desc">
                    <span><?php echo $p["descripcion"] ?></span>
                </div>
                <div id="precio">
                    <span id="precio1">desde</span>
                    <span id="precio2">S/ <?php echo $p["precio"] ?></span>
                    <form action="">
                        <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['usuario']; ?>">
                        <input type="hidden" name="id_producto" value="<?php echo $id ?>">
                        <button>AÑADIR AL CARRITO</button> 
                    </form>         
                </div>
            </div>
            <?php } ?>

        </section>
    </section>

    <?php include('partes/footer.php') ?>
</body>
</html>
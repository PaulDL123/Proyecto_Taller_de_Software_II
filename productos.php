<?php

session_start();
$db = new PDO('mysql:host=localhost;dbname=proyecto_taller_software; charset=utf8mb4', 'root', '');
$stmt = $db->query("SELECT * FROM productos ORDER BY id_producto DESC");
$productos = $stmt->fetchAll(); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos</title>
    <?php include'links.html' ?>
    <link rel="stylesheet" href="style/productos.css">
</head>
<body>
    
    <?php include('login.php') ?>
    <?php if(isset($_GET["error"])) { ?>
    <p style="color: red; background-color: black; margin:0; text-align: right; padding: 0 350px;">Error, datos no válidos</p>
    <?php } ?>
    
    <?php include('partes/header.php') ?>
    <?php include('partes/navegador.php') ?>


    <section>

        <?php if(isset($_SESSION["usuario"])) { if(($_SESSION["usuario"]=="Paul1")){ ?>
        <li><a href="agregar_prod.php">Agregar producto</a></li>
        <li><a href="operaciones_prod.php">Editar producto</a></li>
        <?php }}?>

        <h1>Disfruta de todos nuestros productos</h1>    
        
        <section id="contenedor_productos">
            <?php foreach ($productos as $p) {?>
            <div id="productos">
                <div>
                    <img src="data:image/jpg;base64,<?php echo base64_encode($p["imagen"]);?>" >
                </div>
                <div>
                    <span><?php echo $p["nombre"] ?></span>
                </div>
                <div>
                    <span>S/<?php echo $p["precio"] ?></span>
                </div>
            </div>
            <?php } ?>
        </section>


    </section>
    

    <?php include('partes/footer.php') ?>
</body>
</html>
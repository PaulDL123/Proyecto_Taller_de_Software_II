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
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>
    
    <?php include('login.php') ?>
    <?php if(!isset($_SESSION["usuario"])) { if(isset($_GET["error"])) { ?>
    <p style="color: red; background-color: black; margin:0; text-align: right; padding: 0 350px;">Error, datos no válidos</p>
    <?php }} ?>
    
    <?php include('partes/header.php') ?>
    <?php include('partes/navegador.php') ?>


    <section id="contenedor_padre">

        <section id="filtros">
            <p></p>
        </section>

        <section id="productos">
            
            <section>
                <h1>Disfruta de todos nuestros productos</h1>
            </section>

            <?php if(isset($_SESSION["usuario"])) { if(($_SESSION["usuario"]=="Paul1")){ ?>
                    <div>
                        <form action="agregar_prod.php">
                            <button type submit>Agregar nuevo producto</button>
                        </form>

                        <form action="operaciones_prod.php">
                            <button type submit>Editar productos</button>
                        </form>
                    </div>
            <?php }}?>
            <section id="contenedor_productos">
                <?php foreach ($productos as $p) {?>
                <a href="prod_unidad.php?id=<?php echo $p["id_producto"];?>" class="productos">
                    <div >
                        <div>
                            <img src="data:image/jpg;base64,<?php echo base64_encode($p["imagen"]);?>" >
                        </div>
                        <div id="nombre">
                            <span><?php echo $p["nombre"] ?></span>
                        </div>
                        <div id="precio">
                            <span id="precio1">desde</span>
                            <span id="precio2">S/ <?php echo $p["precio"] ?></span>
                        </div>
                    </div>
                </a>
                <?php } ?>
            </section>
            
        </section>


    </section>
    

    <?php include('partes/footer.php') ?>
</body>
</html>
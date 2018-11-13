<?php

session_start();
$user = $_SESSION['usuario'];

$db = new PDO('mysql:host=localhost;dbname=proyecto_taller_software; charset=utf8mb4', 'root', '');
$stmt = $db->query("SELECT * FROM usuarios WHERE usuario = '$user'");
$usuarios = $stmt->fetch();

$iduser=$usuarios["id"];

$stmt1 = $db->query("SELECT * FROM carrito INNER JOIN productos ON carrito.idproducto = productos.id_producto WHERE idusuario = '$iduser'");
$carrito = $stmt1->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    <?php include'links.html' ?>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>
    <?php include('login.php') ?>
    <?php if(!isset($_SESSION["usuario"])) { if(isset($_GET["error"])) { ?>
    <p style="color: red; background-color: black; margin:0; text-align: right; padding: 0 350px;">Error, datos no válidos</p>
    <?php } }?>
    
    <?php include('partes/navegador.php') ?>
    <section id="contenedor_padre">
        <section id="izq">
            <h3>Carrito de compras</h3>

            <?php foreach($carrito as $c){ ?>
            <div class="prod_carrito">
                <div class="desc_prod">
                    <div class="imag_prod">
                        <img src="">
                    </div>
                    <div class="datos_prod">
                        <div class="nombre_prod">
                            <?php echo $c["nombre"]; ?>
                        </div>
                        <div class="extra_prod">
                            <div class="precio_prod">

                            </div>
                            <div class="comentario">

                            </div>
                            <div class="cantidad">

                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="precio">

                </div>
            </div>
            <?php } ?>
        </section>
        <section id="der">

        </section>
    </section>
    

    <?php include('partes/footer.php') ?>
</body>
</html>
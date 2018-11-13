<?php

session_start();
$user = $_SESSION['usuario'];

$db = new PDO('mysql:host=localhost;dbname=proyecto_taller_software; charset=utf8mb4', 'root', '');
$stmt = $db->query("SELECT * FROM usuarios WHERE usuario = '$user'");
$usuarios = $stmt->fetchObject();

$prod_user = $usuarios->id;
$stmt1 = $db->query("SELECT * FROM carrito WHERE idusuario = '$prod_user'");
$prod_carrito = $stmt1->fetchAll();

$array = array();
foreach($prod_carrito as $pc){
    array_push($array, $pc["idproducto"]);
}

$stmt = $db->query("SELECT * FROM productos WHERE (id_producto='$array[0]') ORDER BY id_producto DESC");
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


            <div class="prod_carrito">
                <div class="desc_prod">
                    <div class="imag_prod">
                        <img src="">
                    </div>
                    <div class="datos_prod">
                        <div class="nombre_prod">

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

        </section>
        <section id="der">

        </section>
    </section>
    

    <?php include('partes/footer.php') ?>
</body>
</html>
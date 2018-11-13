<?php
session_start();

$id = $_GET['id'];

$db = new PDO('mysql:host=localhost;dbname=proyecto_taller_software; charset=utf8mb4', 'root', '');

$stmt = $db->query("SELECT * FROM productos WHERE id_producto = '$id'");
$productos = $stmt->fetchAll();

if(isset($_SESSION['usuario'])){
    $user = $_SESSION['usuario'];
    $stmt = $db->query("SELECT * FROM usuarios WHERE usuario = '$user'");
    $usuarios = $stmt->fetchObject();
    $usuario_mostrar = $usuarios->id;
}else{
    $usuario_mostrar = "desconocido";
}

#Establecer algun aviso

$cond = pathinfo($_SERVER['REQUEST_URI'])['basename'];
$partes = explode("?", $cond);
$c = count($partes);
$parFin = $partes[$c-1]

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
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>

    <?php include('login.php') ?>
    <?php if(!isset($_SESSION["usuario"])) { if($partes['1']=="error=1" || $partes['1']=="error=1") { ?>
    <p style="color: red; background-color: black; margin:0; text-align: right; padding: 0 350px;">Error, datos no válidos</p>
    <?php }} ?>

    <section id="contenedor_padre">
        <div class="modal fade" id="registrarse">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Header de la ventana -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                    </div>
                    <!-- Contenido de la ventana -->
                    <div class="modal-body">
                        <form action="index.php">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Recipient:</label>
                                <input type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Recipient:</label>
                                <input type="text" class="form-control" id="recipient-name">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="decision">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Header de la ventana -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                    </div>
                    <!-- Contenido de la ventana -->
                    <div class="modal-body">
                        registrarse
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>


        <?php include('partes/navegador.php') ?>

        <?php echo $parFin ?>
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
                        <form action="carrito_procesar.php" method="post">
                            <input type="hidden" name="id_usuario" value="<?php echo "$usuario_mostrar" ?>">
                            <input type="hidden" name="id_producto" value="<?php echo $id ?>">

                            <?php if(isset($_SESSION['usuario'])) {?>
                            <a href="#decision" class="btn btn-primary btn-lg" data-toggle="modal">AGREGAR A CARRITO</a> 
                            <?php }else{ ?>
                            <a href="#registrarse" class="btn btn-primary btn-lg" data-toggle="modal">AGREGAR A CARRITO</a> 
                            <?php } ?>

                        </form>         
                    </div>
                </div>
                <?php } ?>

            </section>
        </section>
    </section>
    <?php include('partes/footer.php') ?>

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>
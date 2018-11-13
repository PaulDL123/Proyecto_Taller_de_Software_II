<?php
session_start();

$id = $_GET['id'];

$db = new PDO('mysql:host=localhost;dbname=proyecto_taller_software; charset=utf8mb4', 'root', '');
$stmt = $db->query("SELECT * FROM productos WHERE id_producto = '$id'");
$productos = $stmt->fetchObject();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    <?php include'links.html' ?>
    <link rel="stylesheet" href="style/editar_producto.css">
    <link rel="stylesheet" href="style/prod_unidad.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>

    <?php include('login.php') ?>
    <?php if(!isset($_SESSION["usuario"])) { if($partes['1']=="error=1" || $partes['1']=="error=1") { ?>
    <p style="color: red; background-color: black; margin:0; text-align: right; padding: 0 350px;">Error, datos no válidos</p>
    <?php }} ?>
        
    <?php include('partes/navegador.php') ?>

    <section id="contenedor_padre" style="padding-top:40px;">

        <form action="actualizar_producto.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
            <div id="der">
                <div class="form-group" style="height:400px">
                    <img src="data:image/jpg;base64,<?php echo base64_encode($productos->imagen);?>" style="width:300px; height:300px">
                </div>
            </div>
            <div id="izq">
                <div class="form-group">
                    Nombre:
                    <input class="form-control" type="text" name="nombre" value="<?php echo "$productos->nombre" ?>">
                </div>
                <div class="form-group">
                    Precio:
                    <input class="form-control" type="float" name="precio" value="<?php echo "$productos->precio" ?>">
                </div>
                <div class="form-group">
                    Descripción:
                    <textarea class="form-control" name="descripcion" rows="10" ><?php echo nl2br($productos->descripcion) ?></textarea>
                    
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Guardar datos</button>
            </div>
        </form>
    </section>
    <?php include('partes/footer.php') ?>
</body>
</html>
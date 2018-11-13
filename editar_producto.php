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
    <link rel="stylesheet" href="style/prod_unidad.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>

    <?php include('login.php') ?>
    <?php if(!isset($_SESSION["usuario"])) { if($partes['1']=="error=1" || $partes['1']=="error=1") { ?>
    <p style="color: red; background-color: black; margin:0; text-align: right; padding: 0 350px;">Error, datos no válidos</p>
    <?php }} ?>
        
    <?php include('partes/navegador.php') ?>

    <section id="contenedor_padre">

        <section id="prod">

            <div id="nombre">
                <h1><?php echo $productos->nombre; ?></h1>
            </div>
                
            <section id="down">
            
                <div id="imagen">
                    <input name="file-input" id="file-input" type="file" />
                    <br />
                    <img id="imgSalida" src="data:image/jpg;base64,<?php echo base64_encode($productos->imagen);?>" />
                </div>
                <div id="info">
                    <div id="desc">
                        <span><?php echo "$productos->descripcion" ?></span>
                    </div>
                    <div id="precio">
                        <span id="precio1">desde</span>
                        <span id="precio2">S/ <?php echo "$productos->precio" ?></span>
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

            </section>
        </section>
    </section>
    <?php include('partes/footer.php') ?>
    <script>
        $(window).load(function(){
            $(function() {
                $('#file-input').change(function(e) {
                    addImage(e); 
                    });

                    function addImage(e){
                    var file = e.target.files[0],
                    imageType = /image.*/;
                
                    if (!file.type.match(imageType))
                    return;
                
                    var reader = new FileReader();
                    reader.onload = fileOnload;
                    reader.readAsDataURL(file);
                    }
                
                    function fileOnload(e) {
                    var result=e.target.result;
                    $('#imgSalida').attr("src",result);
                    }
            });
        });
    </script>
</body>
</html>
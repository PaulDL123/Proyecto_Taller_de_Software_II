<?php
session_start();

$id = $_GET['id'];

$db = new PDO('mysql:host=localhost;dbname=proyecto_taller_software; charset=utf8mb4', 'root', '');

$stmt = $db->query("SELECT * FROM productos WHERE id_producto = '$id'");
$productos = $stmt->fetchObject();

if(isset($_SESSION['usuario'])){
    $user = $_SESSION['usuario'];
    $stmt = $db->query("SELECT * FROM usuarios WHERE usuario = '$user'");
    $usuarios = $stmt->fetchObject();
    $usuario_mostrar = $usuarios->id;
    $usuario_tipo = $usuarios->tipo;
}else{
    $usuario_mostrar = "desconocido";
}

#Establecer algun aviso

$cond = pathinfo($_SERVER['REQUEST_URI'])['basename'];
$partes = explode("?", $cond);
$c = count($partes);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    <link rel="stylesheet" href="style/estilos.css">
    <link rel="stylesheet" href="style/estilo_cabecera.css">
    <link rel="stylesheet" href="style/prod_unidad.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>

    <?php include('login.php') ?>
    <?php if(!isset($_SESSION["usuario"])) { if($partes['1']=="error=1" || $partes[$c-1]=="error=1") { ?>
    <p style="color: red; background-color: black; margin:0; text-align: right; padding: 0 350px;">Error, datos no válidos</p>
    <?php }} ?>
        
    <?php include('partes/navegador.php') ?>

    <section id="contenedor_padre">
        
        <div class="modal fade" id="registrarse">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Header de la ventana -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">ES NECESARIO INICIAR SESIÓN</h4>
                    </div>
                    <!-- Contenido de la ventana -->
                    <div class="modal-body">
                        <form action="login_procesar.php" method="post">
                            <input type="hidden" name="retorno" value="<?php echo pathinfo($_SERVER['REQUEST_URI'])['basename']; ?>">    
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Usuario o correo:</label>
                                <input type="text" class="form-control" id="recipient-name" name="usuario">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Contraseña:</label>
                                <input type="password" class="form-control" id="recipient-name" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary">Aceptar</button>
                        </form>
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
                        <span></span>
                        <form action="carrito_procesar.php" method="post">
                            <input type="hidden" name="decision" value="carrito.php">
                            <input type="hidden" name="id_usuario" value="<?php echo "$usuario_mostrar" ?>">
                            <input type="hidden" name="id_producto" value="<?php echo $id ?>">
                            <button type="submit" class="btn btn-default" >Ver elemento en carrito</button>
                        </form>
                        <form action="carrito_procesar.php" method="post">
                            <input type="hidden" name="decision" value="productos.php">
                            <input type="hidden" name="id_usuario" value="<?php echo "$usuario_mostrar" ?>">
                            <input type="hidden" name="id_producto" value="<?php echo $id ?>">
                            <button type="submit" class="btn btn-primary">Seguir comprando</button>    
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>


        <section id="prod">

            <div id="nombre">
                <h1><?php echo $productos->nombre; ?></h1>
            </div>
                
            <section id="down">

                <div id="imagen">
                    <img src="data:image/jpg;base64,<?php echo base64_encode($productos->imagen);?>" >
                </div>
                <div id="info">
                    <div id="desc">
                        <span><?php echo nl2br($productos->descripcion) ?></span>
                    </div>
                    <div id="precio">
                        <span id="precio1">desde</span>
                        <span id="precio2">S/ <?php echo "$productos->precio" ?></span>
                        
                        <?php if(isset($_SESSION['usuario'])) { ?>
                            <?php if($usuario_tipo=="administrador"){ ?>
                            <a href="editar_producto.php?id=<?php echo $productos->id_producto;?>" class="btn btn-primary btn-lg" >EDITAR PRODUCTO</a> 
                            <?php }else{ ?>
                            <a href="#decision" class="btn btn-primary btn-lg" data-toggle="modal">AGREGAR A CARRITO</a> 
                            <?php } ?>
                        <?php }else{ ?>
                        <a href="#registrarse" class="btn btn-primary btn-lg" data-toggle="modal">AGREGAR A CARRITO</a> 
                        <?php } ?>

                                 
                    </div>
                </div>

            </section>
        </section>
    </section>
    <?php include('partes/footer.php') ?>
</body>
</html>
<?php
if(isset($_SESSION['usuario'])){
    $user = $_SESSION['usuario'];
    $db = new PDO('mysql:host=localhost;dbname=proyecto_taller_software; charset=utf8mb4', 'root', '');
    $stmt = $db->query("SELECT * FROM usuarios WHERE usuario = '$user'");
    $usuarios = $stmt->fetchObject();
    $user_tipo = $usuarios->tipo;
}
?>
<section id="contenedor_login">
    <?php if(isset($_SESSION["usuario"])) { ?>

    <ul id="cabecera">
        <li>Bienvenido <?php echo $_SESSION["usuario"] ?></li>
        <li><a href="perfil.php">Mi Perfil</a></li>
        <?php if($user_tipo =="usuario"){?>
        <li><a href="carrito.php">Mi carrito</a></li>
        <?php } ?>
    </ul>
    
    <?php } else { ?>
    <form class="form-inline" action="login_procesar.php" method="post">
        <input type="hidden" name="retorno" value="<?php echo pathinfo($_SERVER['REQUEST_URI'])['basename']; ?>">
        <div>
            <input class="form-control" type="text" name="usuario" placeholder="Usuario o correo" required>
        </div>
        <div>
            <input class="form-control" type="password" name="password" placeholder="Contraseña" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Enviar</button>
        
    </form>
    <?php } ?>
</section>
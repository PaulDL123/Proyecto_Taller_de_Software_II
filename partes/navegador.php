<nav>
    <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="productos.php">Productos</a></li>
        <?php if(isset($_SESSION["usuario"])) { if(($_SESSION["usuario"]=="Paul1")){ ?>
        <li><a href="pedidos.php">Lista de pedidos</a></li>
        <?php }}?>
        <?php if(isset($_SESSION["usuario"])) {?>
        <li><a href="logout.php">Cerrar Sesión</a></li>
        <?php } else { ?>
        <li><a href="registro.php">Registrarse</a></li>
        <?php } ?>
    </ul>
</nav>

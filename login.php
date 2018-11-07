<section id="contenedor_login">
    <?php if(isset($_SESSION["usuario"])) { ?>

    <ul id="cabecera">
        <li>Bienvenido <?php echo $_SESSION["usuario"] ?></li>
        <li><a href="perfil.php">Mi Perfil</a></li>
        <li><a href="pedidos.php">Mis Pedidos</a></li>
    </ul>
    
    <?php } else { ?>
    <form id="ingreso" action="login_procesar.php" method="post">
        <input type="hidden" name="retorno" value="<?php echo basename($_SERVER["SCRIPT_FILENAME"]) ?>">
        <div>
            <input type="text" name="usuario" placeholder="Ingrese su usuario o correo" required>
        </div>
        <div>
            <input type="password" name="password" placeholder="Ingrese su contraseña" required>
        </div>
        <div>
            <button type="submit">Enviar</button>
        </div>
    </form>
    <?php } ?>
</section>
<section id="contenedor_login">
    <form id="ingreso" action="login_procesar.php" method="post">
        <input type="hidden" name="retorno" value="<?php echo basename($_SERVER["SCRIPT_FILENAME"]) ?>">
        <div>
            <input type="text" name="usuario" placeholder="Ingrese su usuario o correo">
        </div>
        <div>
            <input type="password" name="password" placeholder="Ingrese su contraseña">
        </div>
        <div>
            <button type="submit">Enviar</button>
        </div>
    </form>
    
</section>
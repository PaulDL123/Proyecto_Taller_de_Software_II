<?php

session_start();
$user = $_SESSION['usuario'];

$db = new PDO('mysql:host=localhost;dbname=proyecto_taller_software; charset=utf8mb4', 'root', '');
$stmt = $db->query("SELECT * FROM usuarios WHERE usuario = '$user'");
$usuarios = $stmt->fetch();

$iduser=$usuarios["id"];

$stmt = $db->query("SELECT * FROM direcciones_usuario INNER JOIN direcciones ON direcciones_usuario.id_direccion = direcciones.id_direccion WHERE id_usuario = '$iduser'");
$dir_usuario = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    <link rel="stylesheet" href="style/perfil.css">
    <link rel="stylesheet" href="style/estilos.css">
    <link rel="stylesheet" href="style/estilo_cabecera.css">
    <link rel="stylesheet" href="style/prod_unidad.css">
    <link rel="stylesheet" href="style/direcciones.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
    <?php include('login.php') ?>
    <?php if(!isset($_SESSION["usuario"])) { if(isset($_GET["error"])) { ?>
    <p style="color: red; background-color: black; margin:0; text-align: right; padding: 0 350px;">Error, datos no válidos</p>
    <?php } }?>

    <?php include('partes/navegador.php'); ?>

    <section id="contenedor_padre">
        <div class="modal fade" id="decision">
            <div class="modal-dialog" style="width: 900px;">
                <div class="modal-content">
                    <!-- Header de la ventana -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">ES NECESARIO INICIAR SESIÓN</h4>
                    </div>
                    <!-- Contenido de la ventana -->
                    <div class="modal-body">
                        <form action="direccion_procesar.php" method="post">
                            <input type="hidden" name="id_usuario" value="<?php echo "$iduser" ?>">    
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Tipo de direccion</label>
                                <select name="tipo_direccion" class="form-control" required>
                                    <option value="" selected="selected">Seleccione un Tipo de Dirección</option>
                                    <option value="Casa">Casa</option>
                                    <option value="Departamento">Departamento</option>
                                    <option value="Condominio">Condominio</option>
                                    <option value="Residencial">Residencial</option>
                                    <option value="Oficina">Oficina</option>
                                    <option value="Local">Local</option>
                                    <option value="Centro">Centro</option>
                                    <option value="Mercado">Mercado</option>
                                    <option value="Galería">Galería</option>
                                    <option value="Otro">Otro</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Direccion</label>
                                <input type="text" class="form-control" id="recipient-name" name="direccion" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Lote:</label>
                                <input type="text" class="form-control" id="recipient-name" name="lote" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Departamento (opcional):</label>
                                <input type="text" class="form-control" id="recipient-name" name="departamento">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Urbanización (opcional):</label>
                                <input type="text" class="form-control" id="recipient-name" name="urbanizacion">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Referencia (opcional):</label>
                                <input type="text" class="form-control" id="recipient-name" name="referencia">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Distrito:</label>
                                <select  name="distrito" class="form-control">
                                    <option value="" selected="selected" class="">Seleccione una Distrito</option>
                                    <option value="CERCADO DE LIMA">CERCADO DE LIMA</option>
                                    <option value="ATE">ATE</option>
                                    <option value="BARRANCO">BARRANCO</option>
                                    <option value="CHORRILLOS">CHORRILLOS</option>
                                    <option value="CIENEGUILLA">CIENEGUILLA</option>
                                    <option value="COMAS">COMAS</option>
                                    <option value="EL AGUSTINO">EL AGUSTINO</option>
                                    <option value="INDEPENDENCIA">INDEPENDENCIA</option>
                                    <option value="JESUS MARIA">JESUS MARIA</option>
                                    <option value="LA MOLINA">LA MOLINA</option>
                                    <option value="LA VICTORIA">LA VICTORIA</option>
                                    <option value="LINCE">LINCE</option>
                                    <option value="LOS OLIVOS">LOS OLIVOS</option>
                                    <option value="LURIN">LURIN</option>
                                    <option value="MAGDALENA DEL MAR">MAGDALENA DEL MAR</option>
                                    <option value="PUEBLO LIBRE">PUEBLO LIBRE</option>
                                    <option value="MIRAFLORES">MIRAFLORES</option>
                                    <option value="RIMAC">RIMAC</option>
                                    <option value="SAN BORJA">SAN BORJA</option>
                                    <option value="SAN ISIDRO">SAN ISIDRO</option>
                                    <option value="SAN JUAN DE LURIGANCHO">SAN JUAN DE LURIGANCHO</option>
                                    <option value="SAN JUAN DE MIRAFLORES">SAN JUAN DE MIRAFLORES</option>
                                    <option value="SAN LUIS">SAN LUIS</option>
                                    <option value="SAN MARTIN DE PORRES">SAN MARTIN DE PORRES</option>
                                    <option value="SAN MIGUEL">SAN MIGUEL</option>
                                    <option value="SANTA ANITA">SANTA ANITA</option>
                                    <option value="SANTIAGO DE SURCO">SANTIAGO DE SURCO</option>
                                    <option value="SURQUILLO">SURQUILLO</option>
                                    <option value="VILLA EL SALVADOR">VILLA EL SALVADOR</option>
                                    <option value="VILLA MARIA DEL TRIUNFO">VILLA MARIA DEL TRIUNFO</option>
                                    <option value="ANCON">ANCON</option>
                                    <option value="CARABAYLLO">CARABAYLLO</option>
                                    <option value="CHACLACAYO">CHACLACAYO</option>
                                    <option value="PACHACAMAC">PACHACAMAC</option>
                                    <option value="PUCUSANA">PUCUSANA</option>
                                    <option value="PUENTE PIEDRA">PUENTE PIEDRA</option>
                                    <option value="PUNTA HERMOSA">PUNTA HERMOSA</option>
                                    <option value="PUNTA NEGRA">PUNTA NEGRA</option>
                                    <option value="SAN BARTOLO">SAN BARTOLO</option>
                                    <option value="SANTA MARIA DEL MAR">SANTA MARIA DEL MAR</option>
                                    <option value="SANTA ROSA">SANTA ROSA</option>
                                    <option value="CHOSICA (LURIGANCHO)">CHOSICA (LURIGANCHO)</option>
                                    <option value="BREÑA">BREÑA</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Aceptar</button>
                        </form>
                    </div>
                        
                </div>
            </div>
        </div>
        <section id="izq">
            <h5>MI CUENTA</h5>
            <div>
                <span>Mi perfil</span>
                <ul>
                    <li><a href="perfil.php">Mis datos personales</a></li>
                    <li><a href="direcciones.php">Mis direcciones</a></li>
                </ul>
            </div>
        </section>
        <section id="der">
            <h1>MIS DIRECCIONES</h1>
            <div>
                <a href="#decision" class="btn btn-primary btn-lg" data-toggle="modal">AGREGAR DIRECCION</a> 
            </div>
            <div id="contenedor_dir">
                <?php if(count($dir_usuario)>0){ foreach($dir_usuario as $du){?>
                <div class="direccion">
                    <div>
                        <?php 
                        
                        echo $du["tipo_direccion"]."<br/>";
                        echo $du["direccion"]."<br/>";
                        echo $du["lote"]."<br/>";
                        if(($du["departamento"] <> "")) {echo $du["departamento"]."<br/>";}
                        if(($du["urbanización"] <> "")) {echo $du["urbanización"]."<br/>";}
                        if(($du["referencia"] <> NULL)) {echo $du["referencia"]."<br/>";}
                        echo $du["distrito"]."<br/>";
                        ?>
                    </div>
                    <div>
                        <a href="">Editar</a>
                        <a href="">Eliminar</a>
                    </div>
                </div>
                <?php }} ?>
            </div>
        </section>
    </section>

    <?php include('partes/footer.php') ?>
</body>
</html>
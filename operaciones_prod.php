<?php

session_start();
$db = new PDO('mysql:host=localhost;dbname=proyecto_taller_software; charset=utf8mb4', 'root', '');
$stmt = $db->query("SELECT * FROM productos ORDER BY id_producto DESC");
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
    <?php include('login.php') ?>
    <?php if(isset($_GET["error"])) { ?>
    <p style="color: red; background-color: black; margin:0; text-align: right; padding: 0 350px;">Error, datos no válidos</p>
    <?php } ?>
    <?php include('partes/navegador.php') ?>

    <table class="table" style="width: 60%; border-collapse: collapse; margin:10px 20%; text-align:center;">
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Operaciones</th>
        </tr>

        <?php if(count($productos) == 0) { ?>
            <tr>
                <td colspan="5" style="text-align: center">No se encontraron registros</td>
            </tr>
        <?php } ?>
        <tr>
        <?php foreach ($productos as $u) { ?>
            <td><img src="data:image/jpg;base64,<?php echo base64_encode($u["imagen"])?>" style =" width:200px"></td>
            <td><?php echo $u["nombre"] ?></td>
            <td><?php echo $u["precio"] ?></td>
            <td style="text-align: center" style="display: flex;">
                <form action="eliminar_producto.php" method="post">
                    <input type="hidden" name="id_producto" value="<?php echo $u["id_producto"] ?>">
                    <input type="hidden" name="vuelta" value="1">
                    <button type="submit" class="btn btn-primary">Borrar</button>
                </form>

            </td>
        </tr>
        <?php } ?>
    </table>


    <?php include('partes/footer.php') ?>
</body>
</html>
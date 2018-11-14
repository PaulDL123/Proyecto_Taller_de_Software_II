<?php

session_start();
$user = $_SESSION['usuario'];

$db = new PDO('mysql:host=localhost;dbname=proyecto_taller_software; charset=utf8mb4', 'root', '');
$stmt = $db->query("SELECT * FROM usuarios WHERE usuario = '$user'");
$usuarios = $stmt->fetch();

$iduser=$usuarios["id"];

$stmt1 = $db->query("SELECT * FROM carrito INNER JOIN productos ON carrito.idproducto = productos.id_producto INNER JOIN usuarios ON carrito.idusuario = usuarios.id WHERE pedido='si'");
$carrito = $stmt1->fetchAll();

$suma=0;
foreach($carrito as $ca){
    $suma=$suma+($ca["precio"]*$ca["cantidad"]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pedidos</title>
    <?php include'links.html' ?>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>
    <?php include('login.php') ?>
    <?php if(!isset($_SESSION["usuario"])) { if(isset($_GET["error"])) { ?>
    <p style="color: red; background-color: black; margin:0; text-align: right; padding: 0 350px;">Error, datos no válidos</p>
    <?php } }?>
    <?php include('partes/navegador.php') ?>

    <section id="contenedor_padre">
        <table class="table" style="width: 60%; border-collapse: collapse; margin:10px 20%; text-align:center;">
            <tr>
                <th>Usuario</th>
                <th>Producto</th>
                <th>Costo</th>
            </tr>

            <?php if(count($carrito) == 0) { ?>
                <tr>
                    <td colspan="5" style="text-align: center">No se encontraron registros</td>
                </tr>
            <?php } ?>
            <tr>
            <?php foreach ($carrito as $u) { ?>
                <td><?php echo $u["nombres"] ?> <?php echo $u["apellidos"] ?></td>
                <td><?php echo $u["nombre"] ?></td>
                <td><?php echo $u["precio"] ?></td>
            </tr>
            <?php } ?>
        </table>
    </section>

    <?php include('partes/footer.php') ?>
</body>
</html>
<?php

session_start();
$user = $_SESSION['usuario'];

$db = new PDO('mysql:host=localhost;dbname=proyecto_taller_software; charset=utf8mb4', 'root', '');
$stmt = $db->query("SELECT * FROM usuarios WHERE usuario = '$user'");
$usuarios = $stmt->fetch();

$iduser=$usuarios["id"];

$stmt1 = $db->query("SELECT * FROM carrito INNER JOIN productos ON carrito.idproducto = productos.id_producto WHERE idusuario = '$iduser' AND pedido='no'");
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
    <title>Inicio</title>
    <?php include'links.html' ?>
    <link rel="stylesheet" href="style/carrito.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>
    <?php include('login.php') ?>
        
    <?php include('partes/navegador.php') ?>
    <section id="contenedor_padre">
        <section id="izq">
            <h3>Carrito de compras</h3>

            <table class="table" style="width: 80%; border-collapse: collapse; margin:10px 20%; text-align:center;">
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                </tr>

                <?php if(count($carrito) == 0) { ?>
                    <tr>
                        <td colspan="5" style="text-align: center">No se encontraron registros</td>
                    </tr>
                <?php } ?>
                <tr>
                <?php foreach ($carrito as $c) { ?>
                    <td><img src="data:image/jpg;base64,<?php echo base64_encode($c["imagen"])?>" style =" width:200px"></td>
                    <td><?php echo $c["nombre"] ?></td>
                    <td><?php echo $c["precio"] ?></td>
                    <td style="text-align: center" style="display: flex;">
                        <form action="eliminar_producto.php" method="post">
                            <input type="hidden" name="id_producto" value="<?php echo $c["id_carrito"] ?>">
                            <input type="hidden" name="vuelta" value="2">
                            <button type="submit" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </form>
                        <select name="cantidad" class="form-control" style="width:80%;" >
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </section>
        <section id="der">
            <h4>Resumen de pedido:</h4>
            <div>
                <span>Sub-total:</span>
                <span id="precio"><?php echo $suma ?></span>
            </div>
            <div>
                <?php if(count($carrito) <> 0) { ?>
                <form action="pedidos_procesar.php">
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </form>
                <?php } ?>
                
            </div>
        </section>
    </section>
    

    <?php include('partes/footer.php') ?>
</body>
</html>
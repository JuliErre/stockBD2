<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/estilo.css" />
    <title>GamerBag</title>
    <title>Home</title>
</head>
<div>
<a href="index.html" class="home">Home</a>
</div>
<body>
<?php
include("conexion.php");
$con = conectar();

if (isset($_POST['Enviar'])) {
    $marca = trim($_POST['marca']);
    $cat = trim($_POST['cat']);
    $id = trim($_POST['id']);
    $nombre = trim($_POST['nombre']);
    $dni = trim($_POST['dni']);
    $date = trim($_POST['date']);

    $lastConsulta = "SELECT lastVenta FROM contador ";
    $last = mysqli_query($con, $lastConsulta);
    $lastVent =  mysqli_fetch_array($last);
    $nroVenta = $lastVent['lastVenta'];
    $nroVenta = $nroVenta + 1;

    $updateCons = mysqli_query($con, "UPDATE `contador` SET `lastVenta`= '$nroVenta'");

    $precioCons = "SELECT precio FROM precioproducto WHERE codProducto = '$id'";
    $precio = mysqli_query($con, $precioCons);
    $pres =  mysqli_fetch_array($precio);
    $ingreso = $pres['precio'];


    $eliminarCons = "UPDATE precioproducto SET estado = 'B' WHERE codProducto = '$id' AND codMarca = '$marca'  AND codCategoria = '$cat' ";
    $ventaCons = "INSERT INTO ventas(dniCliente, nroVenta, Ingreso, fecha, codProducto) VALUES ('$dni','$nroVenta','$ingreso','$date', '$id')";


    $venta = mysqli_query($con, $ventaCons);
    $eliminar = mysqli_query($con, $eliminarCons);


    if ($venta) {
?>
        <h3 class="ok">Venta ingresada correctamente</h3>
    <?php
    } else {
    ?>
        <h3 class="error">ERROR al ingresar Venta</h3>
    <?php
    }



    if ($eliminar) {
    ?>
        <h3 class="ok">Producto eliminado correctamente</h3>
    <?php
    } else {
    ?>
        <h3 class="error">ERROR al eliminar producto</h3>
    <?php
    }

    if ($precio) {
    ?>
        <h3 class="ok">Precio del producto obtenido correctamente</h3>
    <?php
    } else {
    ?>
        <h3 class="error">ERROR al obtener precio del producto</h3>
    <?php
    }
}

if (isset($_POST['Mostrar'])) {
    $id = trim($_POST['id']);
    $max = mysqli_query($con,"SELECT MAX(nroVenta) AS maxi FROM ventas");
    $maxi = mysqli_fetch_array($max);
    $last = $maxi["maxi"];
    $last50 = (int)$last - 50;



    $res = mysqli_query($con, "SELECT v.nroVenta, v.ingreso, v.fecha,  p.modelo, m.desMarca, c.desCategoria FROM precioproducto AS p INNER JOIN ventas AS v ON (p.codProducto=v.codProducto) INNER JOIN categoria AS c ON (p.codCategoria=c.codCategoria) INNER JOIN marca AS m ON (p.codMarca=m.codMarca) WHERE v.nroVenta >= '$last50' ORDER BY v.nroVenta DESC ");
    

    ?>



    <h1>ventas</h1>
    <h3>Ultimas 50 ventas</h3>
    <form action="">
        <table border="1" cellpadding="10" id="table">
            <tr>
                <th>Numero Venta</th>
                <th>fecha Venta</th>
                <th>Categoria</th>
                <th>Marca </th>
                <th>Modelo</th>
                <th>Precio</th>

            </tr>
            <?php

            while ($fila = mysqli_fetch_assoc($res)) { ?>

                <tr align="left">


                    <th><?php echo $fila["nroVenta"] ?></th>
                    <th><?php echo $fila["fecha"] ?></th>
                    <th><?php echo $fila["desCategoria"] ?></th>
                    <th><?php echo $fila["desMarca"] ?></th>
                    <th><?php echo $fila["modelo"] ?></th>
                    <th><?php echo $fila["ingreso"] ?></th>
                </tr>
    </form>

    <style>

        body{
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
        }
            
        form{
            justify-self: center;
            align-self: center;
        }

        div{
            display: flex;
        }

    </style>
    
</body>

<?php
            }
        }
?>
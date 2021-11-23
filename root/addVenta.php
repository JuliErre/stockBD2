<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
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
    $id = trim($_POST['id']);
    $cliente = trim($_POST['dniCliente']);
    $date = trim($_POST['date']);
    $marca = trim($_POST['marca']);
    $cat = trim($_POST['cat']);

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


    $eliminarCons = "UPDATE precioproducto SET estado = 'B' WHERE codProducto = '$id' ";
    $ventaCons = "INSERT INTO ventas(dniCliente, nroVenta, Ingreso, fecha, codProducto) VALUES ('$cliente','$nroVenta','$ingreso','$date', '$id')";


    $venta = mysqli_query($con, $ventaCons);
    $eliminar = mysqli_query($con, $eliminarCons);

    $res = mysqli_query($con,"SELECT desCategoria, desMarca, p.codMarca, p.codCategoria FROM precioproducto AS p INNER JOIN categoria AS c ON (p.codCategoria=c.codCategoria) INNER JOIN marca AS m ON (p.codMarca = m.codMarca) WHERE p.codMarca = '$marca' AND p.codCategoria = '$cat'");
    $fila=mysqli_fetch_assoc($res);


    if ($venta) {
?>
    <h3 class="ok">Venta NRO: <?php echo $nroVenta?> con un valor de $<?php echo $ingreso?> ingresada correctamente</h3>
    <h3> </h3>
    <?php
    } else {
    ?>
    <h3 class="error">ERROR al ingresar Venta</h3>
    <?php
    }



    if ($eliminar) {
    ?>
    <h3 class="ok"><?php echo $fila["desMarca"] ?>  <?php echo $fila["desCategoria"] ?> Se ha vendido correctamente </h3>
    <?php
    } else {
    ?>
    <h3 class="error">ERROR al eliminar producto</h3>
    <?php
    }

}

?>
    

    <style>
    body {
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
    }

    form {
        justify-self: center;
        align-self: center;
    }

    div {
        display: flex;
    }
    </style>

</body>

<?php
            
        
?>
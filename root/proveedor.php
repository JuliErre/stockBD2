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

<a href="index.html" class="home">Home</a>
<?php
include("conexion.php");
$con = conectar();

if(isset($_POST['enviar'])) {
    $prov = trim($_POST['prov']);
    $egreso = trim($_POST['dinero']);
    $fecha = trim($_POST['year']);

    $maximo = "SELECT MAX(nroCompraProv) as maximo FROM comprasproveedor";
    $res = mysqli_query($con,$maximo);
    $maxi = mysqli_fetch_array($res);
    $max = $maxi['maximo'];
    $max = $max + 1;
    

    $consulta = "INSERT INTO comprasproveedor(codProveedor, fecha, egresos, nroCompraProv) VALUES ('$prov','$fecha','$egreso', '$max')";
    $resultado = mysqli_query($con,$consulta);


if($resultado){
    ?>
    <h3 class="ok">Datos ingresados correctamente</h3>
    <?php
    }

    else{
        ?>
        <h3 class="error">ERROR</h3>
        <?php
    }
}
?>
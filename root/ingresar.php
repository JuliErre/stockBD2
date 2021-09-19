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

<a href="index.html" class="home">Home</a>
<?php
include("conexion.php");
$con = conectar();

if (isset($_POST['Agregar'])) {
    $marca = trim($_POST['marca']);
    $cat = trim($_POST['cat']);
    $id = trim($_POST['id']);
    $size = trim($_POST['size']);
    $precio = trim($_POST['precio']);
    $modelo = trim($_POST['modelo']);

    $val = "SELECT codProducto FROM precioproducto WHERE codProducto = '$id'";
    $codigo = mysqli_query($con, $val);
    $codProducto = mysqli_fetch_array($codigo);

    if ($id == $codProducto['codProducto']) {
        ?>
        <script>
            window.alert("EL codigo ya existe Ingrese otro")
            window.location.replace("views/ingreso.php");
        </script>
        <?php

    } 
    else {

        $consulta = "INSERT INTO precioproducto(codProducto, codMarca, codCategoria, talle, precio, estado, modelo) VALUES ('$id','$marca','$cat','$size','$precio', 'A', '$modelo')";
        $resultado = mysqli_query($con, $consulta);




        if ($resultado) {
        ?>
            <h3 class="ok">Datos ingresados correctamente</h3>
        <?php
        } else {
        ?>
            <h3 class="error">ERROR </h3>
            <script>
                window.alert("ERROR, Ingrese valores validos")
                window.location.replace("views/ingreso.php");
            </script>
<?php
        }
    }
}
?>
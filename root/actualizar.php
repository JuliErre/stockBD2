
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

if(isset($_POST['editar'])) {
    $id = trim($_POST['id']);
    $op = trim($_POST['op']);
    $valor = trim($_POST['valor']);
    $marca =  trim($_POST['marca']);
    $cat =  trim($_POST['cat']);
    

    $consulta = "UPDATE precioproducto SET $op = '$valor' WHERE codProducto = '$id' and codMarca = '$marca' and codCategoria = '$cat'";
    $resultado = mysqli_query($con,$consulta);


if($resultado){
    ?>
    <h3 class="ok">Se ha modificado correctamente</h3>
    <?php
    }

    else{
        ?>
        <h3 class="error">ERROR</h3>
        <?php
    }
}


if(isset($_POST['eliminar'])) {
    $id = trim($_POST['id']);
    $marca = trim($_POST['marca']);
    $cat = trim($_POST['cat']);

    $consulta = "DELETE FROM precioproducto  WHERE codProducto = '$id' and codMarca = '$marca' and codCategoria = '$cat' ";
    $resultado = mysqli_query($con,$consulta);


if($resultado){
    ?>
    <h3 class="ok">Se ha eliminado correctamente la fila</h3>
    <?php
    }

    else{
        ?>
        <h3 class="error">ERROR</h3>
        <?php
    }
}
?>
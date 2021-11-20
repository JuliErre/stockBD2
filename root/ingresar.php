<!DOCTYPE html>
<?php
include("conexion.php");
$con = conectar();


    $marca = trim($_POST['marca']);
    $cat = trim($_POST['cat']);
    $size = trim($_POST['size']);
    $precio = trim($_POST['precio']);
    $modelo = trim($_POST['modelo']);

    $res = mysqli_query($con,"SELECT desCategoria, desMarca, p.codMarca, p.codCategoria FROM precioproducto AS p INNER JOIN categoria AS c ON (p.codCategoria=c.codCategoria) INNER JOIN marca AS m ON (p.codMarca = m.codMarca) WHERE p.codMarca = '$marca' AND p.codCategoria = '$cat'");
    $fila=mysqli_fetch_assoc($res);

    ?>


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
<body>
<a href="index.html" class="home">Home</a>
<a href="views/ingreso.php" class="home">Volver</a>
<h3 class="ok"> Producto--- MARCA: <?php echo $fila["desMarca"] ?> CATEGORIA: <?php echo $fila["desCategoria"] ?> Modelo: <?php echo $modelo?> Talle: <?php echo $size?>  Precio: <?php echo $precio?></h3>
<h3>Desea Confirmar?</h3>
<form action="confirmar.php" method="POST">
    <input type="hidden" name="cat" value="<?php echo $cat?>">
    <input type="hidden" name="marca" value="<?php echo $marca ?>">
    <input type="hidden" name="size" value="<?php  echo $size ?>">
    <input type="hidden" name="precio" value="<?php echo $precio ?>">
    <input type="hidden" name="modelo" value="<?php  echo $modelo?>">
    <input type="submit" value="confirmar">
</form>  

</body>
</html>





     



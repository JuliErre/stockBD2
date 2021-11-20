<!DOCTYPE html>
<?php
include("conexion.php");
$con = conectar();


    $marca = trim($_POST['marca']);
    $cat = trim($_POST['cat']);
    $size = trim($_POST['size']);
    $precio = trim($_POST['precio']);
    $modelo = trim($_POST['modelo']);

    $consulta = "INSERT INTO precioproducto(codMarca, codCategoria, talle, precio, estado, modelo) VALUES ('$marca','$cat','$size','$precio', 'A', '$modelo')";
    $resultado = mysqli_query($con, $consulta); 

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
    <title>Document</title>
</head>
<body>
<a href="index.html" class="home">Home</a>

<?php
    if ($resultado) {
        ?>
            <h3 class="ok"> Producto--- MARCA: <?php echo $fila["desMarca"] ?> CATEGORIA: <?php echo $fila["desCategoria"] ?> Modelo: <?php echo $modelo?> Talle: <?php echo $size?>  Precio: <?php echo $precio?>  ingresados correctamente</h3>
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
  
?>

</body>
</html>
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


$marca = trim($_POST['marca']);
$cat = trim($_POST['cat']);
$res = mysqli_query($con,"SELECT talle, codProducto, precio, desCategoria, desMarca, p.codMarca, p.codCategoria FROM precioproducto AS p INNER JOIN categoria AS c ON (p.codCategoria=c.codCategoria) INNER JOIN marca AS m ON (p.codMarca = m.codMarca) WHERE p.codMarca = '$marca' AND p.codCategoria = '$cat' AND p.estado <> 'B' ORDER BY p.talle ASC "); 

   

?>

<body>

    <h1>STOCK</h1>

    <table border="1" cellpadding="10" id="table">
        <tr>
            <th>Marca</th>
            <th>Categoria</th>
            <th>Talle</th>
            <th>Codigo de producto</th>
            <th>Precio</th>
            <th>Editar</th>
            <th>Dato</th>
        </tr>
        <?php $contador = 1;
                    
            while($fila=mysqli_fetch_assoc($res)){ ?>

        <tr align="left">



            <th><?php echo $fila['desMarca'] ?></th>
            <th><?php echo $fila['desCategoria'] ?></th>
            <th><?php echo $fila['talle'] ?></th>
            <th><?php echo $fila['codProducto'] ?></th>
            <th><?php echo $fila['precio'] ?></th>
            
            <td>
                <form action="actualizar.php" method="POST">
                    <input type="hidden" name="id" value=<?php echo $fila["codProducto"]?>>
                    <input type="hidden" name="marca" value=<?php echo $fila["codMarca"]?>>
                    <input type="hidden" name="cat" value=<?php echo $fila["codCategoria"]?>>
                    <select name="op" id="op">
                    <option value="precio">Precio</option>
                    <option value="talle">Talle</option>
                </select>

            <th><input type="text" name="valor" placeholder="Ingrese Valor" size="10"></th>
            <th><input type="submit" value="Editar" name="editar"></th>
            <th><input type="submit" value="Eliminar" name="eliminar"></th>
            </form>
            </td>
        </tr>

        <?php $contador = $contador + 1; 
        }
         ?>
    </table>

</body>
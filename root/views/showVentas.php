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
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Document</title>
</head>
<body>
<header>
        <h1>Stock de tienda </h1>


        <nav>
            <ul class="menuPrincipal">
                <li><a href="../index.html">Home</a></li>
                <li><a href="stock.php">Stock</a></li>
                <li><a href="venta.php">Venta</a></li>
                <li><a href="ingreso.php">Ingresar producto</a></li>
                <li><a href="showVentas.php">Mostrar Ventas</a></li>

            </ul>
        </nav>

    </header>
    
<h1>ventas</h1>

<?php

include("../conexion.php");
$con = conectar();

$cat = mysqli_query($con, "SELECT codCategoria, desCategoria  FROM categoria");
$marca = mysqli_query($con, "SELECT codMarca, desMarca  FROM marca");

?>
<form action="showVentas.php" method="POST">
    <p>Periodo de ventas desde</p>
    <input type="date" name="dateStart">
    <p>Periodo de ventas hasta</p>
    <input type="date" name="dateEnd">

    </select>

    <legend>Seleccione la marca del producto</legend>
    <select name="marca" id="marca">
        <?php
        while ($fila = mysqli_fetch_array($marca)) {

            $codMarca = $fila['codMarca'];
            $descMarca = $fila['desMarca'];

            echo "<option value=$codMarca>$descMarca</option>";
        }
        ?>
    </select>

    <legend>Seleccione la categoria del producto</legend>
    <select name="cat" id="cat">
        <?php
                    while ($fila = mysqli_fetch_array($cat)) {

                        $codCategoria = $fila['codCategoria'];
                        $desCategoria = $fila['desCategoria'];

                        echo "<option value=$codCategoria>$desCategoria</option>";
                    }
                    
                    ?>

    </select>
    <div>
    <input type="submit" value="filtrar" name="filtrar">
     </div>

</form>
<?php
if (isset($_POST['filtrar'])) {
    $marca = trim($_POST['marca']);
    $cat = trim($_POST['cat']);
    $dateS = trim($_POST['dateStart']);
    $dateE = trim($_POST['dateEnd']);
            
            

                $res = mysqli_query($con, "SELECT v.nroVenta, v.ingreso, v.fecha,  p.modelo, m.desMarca, c.desCategoria FROM precioproducto AS p INNER JOIN ventas AS v ON (p.codProducto=v.codProducto) INNER JOIN categoria AS c ON (p.codCategoria=c.codCategoria) INNER JOIN marca AS m ON (p.codMarca=m.codMarca) WHERE p.codMarca = '$marca' AND p.codCategoria = '$cat' AND v.fecha >= '".$dateS."' AND v.fecha <= '".$dateE."'  ORDER BY v.nroVenta DESC ");
                



    ?>
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
            margin-top: 15px;
        }
        </style>   
    </body>
    </html>
        
   

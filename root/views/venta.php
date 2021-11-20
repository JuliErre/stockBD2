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
    <link rel="stylesheet" href="../css/estilo.css" />
    <title>Venta</title>
</head>

<body>
    <?php
        include("../conexion.php");
        $con = conectar();  
        
        $cat = mysqli_query($con,"SELECT codCategoria, desCategoria  FROM categoria");
        $marca = mysqli_query($con,"SELECT codMarca, desMarca  FROM marca");
    ?>
    <header>
        <h1>Stock de tienda </h1>


        <nav>
            <ul class="menuPrincipal">
                <li><a href="../index.html">Home</a></li>
                <li><a href="stock.php">Stock</a></li>
                <li><a href="venta.php">Venta</a></li>
                <li><a href="ingreso.php">Ingresar producto</a></li>
                <li><a href="proveedores.php">Proveedores</a></li>
                <li><a href="showVentas.php">Mostrar Ventas</a></li>

            </ul>
        </nav>

    </header>

    <section>
        <article>
            <h1>Venta</h1>

            <form action="venta.php" method="POST">

            <div>
                    <label for="ingresarDate">Ingresa la fecha de hoy</label>
                    <input type="date" name="date">
                </div>


                <div id="inputs">
                    <input type="text" name="dniCliente" id="dniCliente" placeholder="Ingrese el DNI del cliente">
                </div>

                <fieldset>
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


                </fieldset><br>

                <fieldset>

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



                </fieldset><br>
               
                <div>
                    <input type="submit" value="Enviar" name="Enviar">
                    <input type="reset" value="Resetear">
                </div>
            </form>

          
        </article>
    </section>

    <div>
        <?php
        if (isset($_POST['Enviar'])) {
        
            $marca = trim($_POST['marca']);
            $cat = trim($_POST['cat']);
            $res = mysqli_query($con,"SELECT talle, codProducto, precio, desCategoria, desMarca, p.codMarca, p.codCategoria FROM precioproducto AS p INNER JOIN categoria AS c ON (p.codCategoria=c.codCategoria) INNER JOIN marca AS m ON (p.codMarca = m.codMarca) WHERE p.codMarca = '$marca' AND p.codCategoria = '$cat' AND p.estado <> 'B' ORDER BY p.talle ASC "); 
            $cliente = trim($_POST['dniCliente']);
            $date = trim($_POST['date']);
 
 
 ?>

    <table border="1" cellpadding="10" id="table">
        <tr>
            <th>Marca</th>
            <th>Categoria</th>
            <th>Talle</th>
            <th>Codigo de producto</th>
            <th>Precio</th>
            
        </tr>
        <?php
                    
            while($fila=mysqli_fetch_assoc($res)){ ?>

        <tr align="left">
      
            <th><?php echo $fila["desMarca"] ?></th>
            <th><?php echo $fila["desCategoria"] ?></th>   
            <th><?php echo $fila["talle"] ?></th>
            <th><?php echo $fila["codProducto"] ?></th>
            <th><?php echo $fila["precio"] ?></th>
           
        <td>
        <form action="../addVenta.php" method="POST">
            <input type="hidden" name="id" value=<?php echo $fila["codProducto"]?> >
            <input type="hidden" name="marca" value=<?php echo $fila["codMarca"]?> >            
            <input type="hidden" name="cat" value=<?php echo $fila["codCategoria"]?> >
            <input type="hidden" name="date" value=<?php echo $date ?> >
            <input type="hidden" name="dniCliente" value=<?php echo $cliente?> >
            <input type="submit" value="Vender" name="Enviar">
         </form>  
         </td>  
            
        </tr>
        <?php
        }
         ?>
        
    </div>
<?php
        }
?>
    <style>
    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    div {
        margin: 20px;
    }

    #inputs {
        display: flex;
        flex-direction: column;
    }

    #inputs input {
        margin: 10px;
    }
    </style>
</body>

</html>
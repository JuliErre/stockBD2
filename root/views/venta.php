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
               
            </ul>
        </nav>

    </header>

    <section>
        <article>
            <h1>Venta</h1>
            
            <form action="../addVenta.php" method="POST">
                <div>
                    <label for="ingresarDate">Ingresa la fecha de hoy</label>
                    <input type="date" name="date">
                </div>
                <fieldset>
                <legend>Seleccione la categoria del producto</legend>
                    <select name="cat" id="cat">
                    <?php
                        while($fila = mysqli_fetch_array($cat)){

                        $codCategoria = $fila['codCategoria'];
                        $desCategoria = $fila['desCategoria'];
                    
                        echo "<option value=$codCategoria>$desCategoria</option>";
                        
                        }
                    ?>

                    </select>

                </fieldset><br>    

                <fieldset >
                    <legend>Seleccione la marca del producto</legend>
                    <select name="marca" id="marca">
                    <?php
                        while($fila = mysqli_fetch_array($marca)){

                        $codMarca = $fila['codMarca'];
                        $descMarca = $fila['desMarca'];
                    
                        echo "<option value=$codMarca>$descMarca</option>";
                        
                        }
                    ?>
                    
                    </select>

                    <input type="text"name="id" id="id" placeholder="Ingrese el codigo del producto" style="width:200px" size="40">


                </fieldset><br>

                
                <input type="text" name="nombre" id="nombre" placeholder="Ingrese nombre y apellido"><br><br>
                <input type="text" name="dni" id="dni" placeholder="Ingrese DNI"><br><br>
                <input type="submit" value="Enviar" name="Enviar"> 
                <input type="reset" value="Resetear">
                <input type="submit" value="Mostrar Ventas" name="Mostrar">



            </form>
        </article>
    </section>


</body>

</html>
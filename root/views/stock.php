<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../css/estilo.css" />
    <title>Stock</title>
</head>

<body>
    <?php
    include("../conexion.php");
    $con = conectar();

    $cat = mysqli_query($con, "SELECT codCategoria, desCategoria  FROM categoria");
    $marca = mysqli_query($con, "SELECT codMarca, desMarca  FROM marca");
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

        </nav>
    </header>


    <section>
        <article>
            <form action="../consultar.php" method="POST">


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

                <input type="submit" value="Consultar">
            </form>



        </article>
    </section>


</body>

</html>
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
    <title>Proveedores</title>
</head>
<header>
    <h1>Proveedores </h1>

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

<body>
    <?php
    include("../conexion.php");
    $con = conectar();

    $prov = mysqli_query($con, "SELECT codProveedor, descProveedor FROM infoproveedor");

    ?>
    <div>
        <form action="../proveedor.php" method="POST">
            <fieldset>
                <legend>Seleccione Proveedor</legend>
                <select name="prov" id="prov">
                    <?php
                    while ($fila = mysqli_fetch_array($prov)) {

                        $codProveedor = $fila['codProveedor'];
                        $descProveedor = $fila['descProveedor'];

                        echo "<option value=$codProveedor>$descProveedor</option>";
                    }
                    ?>

                </select>

            </fieldset>

            <fieldset>
                <legend>Seleccione la fecha de compra</legend>

                <input type="date" name="year">

            </fieldset><br>

            <input type="text" name="dinero" placeholder="Ingrese la cantidad de gastada" size="25"><br><br>
            <input type="submit" name="enviar" value="Enviar">
            <input type="reset" name="reset" value="Resetear">
        </form>
    </div>
</body>

</body>

</html>
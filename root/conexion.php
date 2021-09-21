<?php
function conectar(){
    $con = mysqli_connect("sql202.epizy.com","epiz_29818184","n08gvmj4h6kZ0s2","epiz_29818184_BaseDeDatos") or die ("Error al conectar a la base de datos");
    return $con;
}
?>

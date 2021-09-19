<?php
function conectar(){
    $con = mysqli_connect("localhost","root","","sistema") or die ("Error al conectar a la base de datos");
    return $con;
}
?>

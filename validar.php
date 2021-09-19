<?php
include("conexion.php");
$con = conectar();


    $user = trim($_POST['user']);
    $password = trim($_POST['password']);
    
    
    $consulta="SELECT pass, user FROM users where user = '$user' AND pass = '$password'";
    $resultado=mysqli_query($con,$consulta);

    $filas=mysqli_num_rows($resultado);

    if($filas){  
        ?>
        <script >window.alert("inicio correcto")
        window.location.replace("root/index.html");</script>
        <?php
        
        
    }

    else{
        include("login.php");
        ?>
        <h3 style="display: flex; justify-content: center;  align-items: stretch;  background-color: red;">Datos incorectos</h3>
        <?php

    }

 
?>

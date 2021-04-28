<?php
    //Configuracion de la conexion a base de datos
    $bd_host = "localhost"; 
    $bd_usuario = "root"; 
    $bd_password = ""; 
    $bd_base = "empleadosajax"; 
    $con = new mysqli($bd_host, $bd_usuario, $bd_password, $bd_base);
    $con->set_charset("utf8");
    if($con->connect_error){
        echo "<p>Se ha producido el error número " . $con->connect_errno . "Con la siguiente descripción " . $con->connect_error . "</p>";
        exit(0);
    }
?>
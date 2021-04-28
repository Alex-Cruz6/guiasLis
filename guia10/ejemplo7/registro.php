<?php
    //Creando la instancia del manejador de base de datos
    include_once("class/database.class.php");
    //variables POST
    $nom = isset($_POST['nombre']) ? trim(($con->real_escape_string($_POST['nombre']))) : "";
    $ape = isset($_POST['apellido']) ? trim(($con->real_escape_string($_POST['apellido']))) : "";
    $cor = isset($_POST['correo']) ? trim($con->real_escape_string($_POST['correo'])) : "";
    //registra los datos del empleados
    $sql="INSERT INTO empleados (nombre, apellido, correo) VALUES ('$nom', '$ape', '$cor')";
    $res = $con->query($sql);
    if(!$res){
        echo "Error: El registro no se ha podido ingresar.";
        exit(0);
    }
    include('consulta.php');
?>
<?php 
    session_start();
    if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
        print "<script>alert(\"Acceso invalido!\");window.location='login.php';</script>";
    }else{
        $name = $_SESSION["name"];
        $apellido = $_SESSION["apellido"];
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>.: HOME :.</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    </head>
    <body>
        <?php include "php/navbar.php"; ?>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <?php
                        printf('<h1>Bienvenido ' . $name . ' ' . $apellido . '</h1>');
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
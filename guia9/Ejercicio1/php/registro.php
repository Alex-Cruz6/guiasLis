<?php
    if(!empty($_POST)){
        if(isset($_POST["username"]) && isset($_POST["name"]) && isset($_POST["apellido"]) && isset($_POST["password"]) && isset($_POST["confirm_password"])){
            if($_POST["username"] != "" && $_POST["name"] != "" && $_POST["apellido"] != "" && $_POST["password"] == $_POST["confirm_password"]){
                include "conexion.php";
                $found=false;
                $sql1= "SELECT * FROM usuario WHERE usuario=\"$_POST[username]\"";
                $query = $con->query($sql1);
                while($r=$query->fetch_array()) {
                    $found=true;
                    break;
                }
                if($found){
                    print "<script>alert(\"Nombre de usuario ya estan registrados.\");
                    window.location='../registro.php';</script>";
                }else{
                    $sql  =  "INSERT INTO usuario (usuario,contraseña,nombre,apellido) 
                    VALUES (\"$_POST[username]\",MD5(\"$_POST[password]\"),\"$_POST[name]\",\"$_POST[apellido]\")";
                    $query = $con->query($sql);
                    if($query!=null){
                        print "<script>alert(\"Registro exitoso. Proceda a logearse\");
                        window.location='../login.php';</script>";
                    }
                }
            }
        }
    }
?>
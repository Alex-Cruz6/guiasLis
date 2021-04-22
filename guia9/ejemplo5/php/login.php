<?php
    if(!empty($_POST)){
        if(isset($_POST["username"]) && isset($_POST["password"])){
            if($_POST["username"] != ""&&$_POST["password"]!=""){
                include "conexion.php";
                $user_id=null;
                $sql1=  "select  *  from  usuario  where  usuario=\"$_POST[username]\" and contraseña=MD5(\"$_POST[password]\") ";
                $query = $con->query($sql1);
                while ($r=$query->fetch_array()) {
                    $user_id=$r["usuario"];
                    $name = $r["nombre"];
                    $apellido = $r["apellido"];
                    break;
                }
                if($user_id==null){
                    print "<script>alert(\"Acceso invalido.\");window.location='../login.php';</script>";
                }else{
                    session_start();
                    $_SESSION["user_id"]=$user_id;
                    $_SESSION["name"]=$name;
                    $_SESSION["apellido"]=$apellido;
                    print "<script>window.location='../home.php';</script>";
                }
            }
        }
    }
?>
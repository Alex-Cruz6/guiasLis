<?php
    session_start();
    //Conectando a base de datos
    $con = new mysqli("localhost", "root", "", "users");
    //Verificar si la conexión fue exitosa
    if(!$con->connect_error){
        $con->set_charset('utf8');
    }else{
        echo "Se ha producido el siguiente error en la conexión: " . $con->connect_error;
    }
    //Escapar datos del formulario
    $usuario = trim($_POST['usuario']);
    $contrasena = trim($_POST['contrasena']);
    //Preparando la consulta que se va a ejecutar
    $qr  = "SELECT usuario, contraseña, nombre, apellido ";
    $qr .= "FROM usuario WHERE usuario = ? AND contraseña = ?";
    $sql = $con->prepare($qr);
    $sql->bind_param("ss", $usuario, MD5($contrasena));
    $sql->execute();
    //Asociando a variables los datos solicitados en la consulta SELECT
    $sql->bind_result($user, $password, $name, $lastname);
    //Preparando las variables de sesión con los datos
    //obtenidos desde la base de datos con bind_result
    while($sql->fetch()){
        $_SESSION["autenticado"] = "si";
        $_SESSION["usuario"] = $user;
        $_SESSION["nombreusr"] = $name . " " . $lastname;
    }
    //Redirigiendo al usuario a la página de inicio
    //si el registro de las variables de sesión fue exitoso
    //o de otro modo mandarlo de nuevo a la página de login
    if(count($_SESSION) > 0){
        header("Location: home.php");
    }else {
        header("Location: login.php?errorusuario=si");
    }
?>
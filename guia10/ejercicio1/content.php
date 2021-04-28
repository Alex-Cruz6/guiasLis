<?php
    $host = "localhost";
    $user = "root"; 
    //Cambiar por el usuario de la base de datos en su servidor
    $pass = ""; 
    //Cambiar por la contraseña de la base de datos en su servidor
    $db = "prensa";
    //Establecer conexión con el servidor MySQL
    $cn = new mysqli($host, $user, $pass, $db);
    $cn->set_charset("utf8");
    if($cn->connect_errno){
        printf("Falló la conexión: %s\n", $cn->connect_error);
        exit(0);
    }
    $tipo = isset($_GET['content']) ? $_GET['content'] : 0;
    if($tipo != 0){
        $qr  = "SELECT tituloLenguaje, textoLenguaje, imgLenguaje FROM lenguajes ";
        $qr .= "WHERE idLenguaje = $tipo";
        $rs = $cn->query($qr);
        while($row = $rs->fetch_object()){
            $info  = "<div id=\"titulo\">\n<h2>{$row->tituloLenguaje}</h2>\n</div>\n";
            $info .= "<div id=\"texto\">\n<p>\n{$row->textoLenguaje}\n";
            $info .= "<img class='img' src=\"{$row->imgLenguaje}\n\" />\n";
            $info .= "</p>\n</div>\n";
        }
        echo $info;
    }
?>
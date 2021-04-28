<?php
    //Conexión a la base de datos
    $host = "localhost";
    $user = "root";
    $pass = "";
    $base = "dbencuesta";
    $con = new mysqli($host, $user, $pass, $base);
    $con->set_charset("utf8");
    if($con->connect_error){
        die("<h3>No se puede establecer conexión con el servidor MySQL</h3>");
    }
    $id = isset($_POST["idenc"]) ? $_POST["idenc"] : 0;
    $vot = isset($_POST["alternativa"]) ? $_POST["alternativa"] : 0;
    $qr = "SELECT opciones, respuestas FROM encuesta WHERE idenc = " . $id;
    $consulta = $con->query($qr);
    $datos = $consulta->fetch_array();
    $opc = $datos["opciones"];
    $resp = $datos["respuestas"];
    $opciones = explode(",", $opc);
    $respuestas = explode(",", $resp);
    $i = 0;
    $respuesta_nueva = "";
    $alternativas = "";
    $coma = "";
    $tot_elems = count($respuestas);
    while($i <= $tot_elems-1){
        $j = $i+1;
        if($j==$vot){
            $valor_respuesta = $respuestas[$i] + 1;
        }else{
            $valor_respuesta = $respuestas[$i];
        }
        $respuesta_nueva = $respuesta_nueva . $coma . $valor_respuesta;
        $alternativas = $alternativas . $respuestas[$i];
        $coma = ",";
        $i++;
    }
    $updenc  = "UPDATE encuesta SET respuestas='$respuesta_nueva', votos=votos+1 ";
    $updenc .= "WHERE idenc=$id";
    $updencresult = $con->query($updenc);
    $con2 = $con->query("SELECT * FROM encuesta WHERE idenc=$id");
    $listado = $con2->fetch_array();
    $preg = $listado['pregunta'];
    $opc = $listado['opciones'];
    $resp = $listado['respuestas'];
    $num_votos = $listado['votos'];
    $opciones = explode(",", $opc);
    $respuestas = explode(",", $resp);
    $i = 0;
    $tot_elems = count($opciones);
    while($i <= $tot_elems-1){
        echo "<p>\n";
        echo $opciones[$i] . " ";
        $resultopc = $respuestas[$i];
        echo $resultopc;
        $resultporc = ($resultopc * 100) / $num_votos;
        echo "&nbsp;<strong>" . round($resultporc, 2) . "% | " . $respuestas[$i] . "</strong>\n";
        echo "</p>\n";
        $i++;
    }
    echo "<p style=\"text-align:center;\">Total de votos: " . $num_votos . "<br />\n";
    echo "<a href=\"encuesta.html\">Regresar a la encuesta</a></p>\n";
?>
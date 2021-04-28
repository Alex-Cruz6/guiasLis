<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "paises";
    $cn = new mysqli($host, $user, $pass, $db);
    $cn->set_charset("utf8");
    $qr  = "SELECT pais, capital, idioma, moneda, bandera, escudo FROM pais ";
    $qr .= "WHERE idpais='" . $_GET['id'] . "'";
    $rs = $cn->query($qr);
    $pais = $rs->fetch_object();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Información del país</title>
        <meta charset="utf-8" />
        <style type="text/css">
            .infoPais{
                width:64%;
                margin:0 auto;
                border:4px outset rgb(60,20,10);
                border-collapse:collapse;    
            }
            .infoPais th{
                background-color:rgb(180,200,90);
                color:rgb(60,20,20);
                font:11pt bold "Lucida Sans Unicode";
            }
        </style>
    </head>
    <body>
        <section>
            <article>
                <?php
                    $tabla = "<table class=\"infoPais\">\n";
                    $tabla .= "<tr>\n<th colspan=\"2\">\n" . html_entity_decode($pais->pais) . "</th>\n</tr>\n";
                    $tabla .= "<tr>\n<td>\nCapital</td>\n";
                    $tabla .= "<td>\n" . html_entity_decode($pais->capital) . "</td>\n</tr>\n";
                    $tabla .= "<tr>\n<td>\nIdioma</td>\n";
                    $tabla .= "<td>\n" . html_entity_decode($pais->idioma) . "</td>\n</tr>\n";
                    $tabla .= "<tr>\n<td>\nMoneda</td>\n";
                    $tabla .= "<td>\n" . html_entity_decode($pais->moneda) . "</td>\n</tr>\n";
                    $tabla .= "<tr>\n<td>\nBandera</td>\n";
                    $tabla .= "<td>\n<img src=\"" . $pais->bandera . "\" /></td>\n</tr>\n";
                    $tabla .= "<tr>\n<td>\nEscudo</td>\n";
                    $tabla .= "<td>\n<img src=\"" . $pais->escudo . "\" /></td>\n</tr>\n";
                    $tabla .= "<tr>\n<td colspan=\"2\">\n";
                    $tabla .= "<a href=\"prevlinks.html\">Regresar</a>\n";
                    $tabla .= "</td>\n</tr>\n";
                    $tabla .= "</table>\n";
                    echo $tabla;
                ?>
            </article>
        </section>
    </body>
</html>
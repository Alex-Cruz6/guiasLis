<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Convertidor de monedas</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/monedas.css" />
    </head>
    <body>
        <header>
            <h2>Tabla de conversión de colones a dólares</h2><hr />
        </header>
        <section>
            <article>
                <?php
                define("EQUIV","8.75");
                $colones = 0.25;
                $tabla  = "<table>\n<thead>\n";
                $tabla .= "<th>Colones</th>";
                $tabla .= "<th>Dólares</th>";
                $tabla .= "</thead>\n<tbody>\n";
                while($colones <= 8){
                    $tabla .= "<tr>\n<td>&cent; ";
                    $tabla .= number_format($colones, 2, '.', ',') . "</td><td>\$ ";
                    $tabla .= number_format($colones / EQUIV, 2, '.', ',');
                    $colones += 0.25;$tabla .= "</td>\n</tr>\n";
                } // fin del while
                $tabla .= "</tbody>\n</table>\n";
                echo $tabla;
                ?>
            </article>
        </section>
        <script src="js/modernizr.custom.lis.js"></script>
    </body>
</html>
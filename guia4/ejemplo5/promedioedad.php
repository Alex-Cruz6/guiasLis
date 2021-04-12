<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Promedio de edades</title>
        <link rel="stylesheet" href="css/fonts.css" />
        <link rel="stylesheet" href="css/sticky-table.css" />
    </head>
    <body>
        <section>
            <article class="component">
                <table>
                    <thead>
                        <th class="head">Edades ingresadas</th>
                    </thead>
                    <tbody>
                        <?php
                            if(isset($_POST['enviar'])){
                                if(isset($_POST['ingresados'])){
                                    calcularedadprom($_POST['ingresados']);
                                }else{
                                    $msgerr = "No hay edades que procesar.";
                                    $edades = array($msgerr);
                                    calcularedadprom($edades);
                                }
                            }
                            // Función para calcular el promedio de las edades
                            function calcularedadprom($edades){
                                $promedades = 0;
                                $contador = 0;
                                $celdas = "";
                                if(is_array($edades)){
                                    foreach($edades as $edad){
                                        $celdas .= "\n\t<tr>\n\t\t<td class=\"user-name\">\n\t\t\t$edad\n\t\t</td>\n\t</tr>\n</tbody>\n";
                                        $promedades += $edad;
                                        $contador++;
                                    }
                                    $promedades /= $contador;
                                    $promedades = number_format($promedades, 2, ".", ",");
                                    $celdas .= "<tfoot>\n";
                                    $celdas .= "<tr>\n\t\t<th>\n\t\t\tLa edad promedio es: $promedades\n\t\t</th>\n\t</tr>\n";
                                    $celdas .= "</tfoot>\n";
                                    echo $celdas;
                                }else{
                                    $celdas .= "\n\t<tr>\n\t\t<td class=\"user-name\">\n\t\t\t$edades\n\t\t</td>\n\t</tr>\n</tbody>\n";
                                    echo $celdas;
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </article>
            <!--Librerías de jQuery para hacer el efecto stycky-headers -->
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
            <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
            <script src="js/modernizr.custom.lis.js"></script>
            <script src="js/jquery.stickyheader.js"></script>
        </section>
    </body>
</html>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Número mayor y menor</title>
        <link rel="stylesheet" href="css/fonts.css" />
        <link rel="stylesheet" href="css/sticky-table.css" />
    </head>
    <body>
        <section>
            <article class="component">
                <table>
                    <thead>
                        <th class="head">Resultados</th>
                    </thead>
                    <tbody>
                        <?php
                            if(isset($_POST['enviar'])){
                                if(isset($_POST['ingresados'])){
                                    calcularedadprom($_POST['ingresados']);
                                }else{
                                    $msgerr = "No hay Números que procesar.";
                                    $numeros = array($msgerr);
                                    calcularedadprom($numeros);
                                }
                            }
                            // Función para calcular el mayor y menor de los numeros
                            function calcularedadprom($numeros){
                                if(is_array($numeros)){
                                    $celdas = "";
                                    foreach($numeros as $num){
                                        $celdas .= "\n\t<tr>\n\t\t<td class=\"user-name\">\n\t\t\t$num\n\t\t</td>\n\t</tr>\n</tbody>\n";
                                    }
                                    $mayor = max($numeros);
                                    $menor = min($numeros);
                                    $celdas .= "\n\t<tr>\n\t\t<td class=\"user-name\">\n\t\t\tEl número mayor es: $mayor\n\t\t</td>\n\t</tr>\n</tbody>\n";
                                    $celdas .= "\n\t<tr>\n\t\t<td class=\"user-name\">\n\t\t\tEl número menor es: $menor\n\t\t</td>\n\t</tr>\n</tbody>\n";
                                    $celdas .= "</tfoot>\n";
                                    echo $celdas;
                                }else{
                                    $celdas .= "\n\t<tr>\n\t\t<td class=\"user-name\">\n\t\t\t$numeros\n\t\t</td>\n\t</tr>\n</tbody>\n";
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
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Tablas de multiplicar</title>
        <link rel="stylesheet"href="css/tabla.css" />
        <link rel="stylesheet" href="css/links.css" />
    </head>
    <body>
        <section>
            <article>
                <?php 
                    function escribir_tabla(){
                        $num  =  (isset($_POST['txtnumero'])  &&  is_int(intval($_POST['txtnumero'])))  ? $_POST['txtnumero'] : 0;
                        if($num != 0){
                            echo "<div id=\"tablamulti\">\n";
                            echo "<table>\n";
                            echo "\t<caption>Tabla del $num</caption>\n";
                            echo "\t<thead>\n\t\t<tr>\n\t\t\t<th colspan=\"3\">\n";
                            echo "\t\t\t\tTabla del número $num\n";
                            echo "\t\t\t\n</th>\t\t\n</tr>\t</thead>\n";
                            echo "\t<tbody>\n";
                            for($i=1; $i<=20; $i++){
                                echo "\t\t<tr>\n";
                                echo "\t\t\t<td>\n\t\t\t\t", $num, "&nbsp;*&nbsp;", $i, "\t\t\t</td>\n";
                                echo "\t\t\t<td>\n\t\t\t\t = \t\t\t</td>\n";
                                echo "\t\t\t<td>\n\t\t\t\t", $num*$i, "\t\t\t</td>\n";
                                echo "\t\t</tr>\n";
                            }
                            echo "\t</tbody>\n";
                            echo "</table>\n";
                            echo "</div>\n";
                        }else{
                            die(
                                "<p  class=\"error\">
                                    El  valor  ingresado  debe  ser  un  número  entero  mayor  que cero.
                                </p>\n
                                <div id=\"enlace\">\t\n
                                    <a href=\"entrada.html\">Regresar</a>\n
                                </div>\n"
                            );
                        }
                    }
                    escribir_tabla();
                    $link  = "<a href=\"entrada.html\" class=\"a-btn\">";
                    $link .= "\t<span class=\"a-btn-symbol\">i</span>";
                    $link .= "\t<span class=\"a-btn-text\">Volver</span>";
                    $link .= "\t<span class=\"a-btn-slide-text\">al formulario</span>";
                    $link .= "\t<span class=\"a-btn-slide-icon\"></span>";
                    $link .= "</a>";
                    echo $link;
                ?>
            </article>
        </section>
    </body>
</html>
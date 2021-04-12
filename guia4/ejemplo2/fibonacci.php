<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Serie de Fibonacci</title>
        <link rel="stylesheet" href="css/fonts.css" />
        <link rel="stylesheet" href="css/form.css" />
        <link rel="stylesheet" href="css/niko.css" />
    </head>
    <body>
        <header id="vintage">
            <h1>Serie de Fibonacci con recursividad</h1>
        </header>
        <section>
            <article>
                <?php 
                    //Función de Fibonacci recursiva
                    function fibonacci($n){
                        if(($n == 0) || ($n == 1)) return $n;
                        return fibonacci($n -2) + fibonacci($n -1);
                    }
                    if(isset($_GET['enviar'])):
                        //Verificando el correcto ingreso de los datos
                        $numero1 = isset($_GET['txtnumero']) ? $_GET['txtnumero'] : -1;
                        if($numero1 == -1):$backlink  = "\t<p>El valor del campo no es válido</p>\n";
                        $backlink .= "\t<a class=\"a-btn\" href=\"{$_SERVER['PHP_SELF']}\" title=\"Regresar\">\n";
                        $backlink .= "\t\t<span class=\"a-btn-symbol\">J</span>\n";
                        $backlink .= "\t\t<span class=\"a-btn-text\">Ingresar dato</span>\n";
                        $backlink .= "\t\t<span class=\"a-btn-slide-text\">nuevamente</span>\n";
                        $backlink .= "\t</a>\n";
                        echo $backlink;
                        exit(0);
                    endif;
                    $tabla  = "<table>\n";
                    $tabla .= "<caption>Generando serie de Fibonacci</caption>\n";
                    $tabla .= "<thead>\n\t";
                    $tabla .= "<tr>\n\t\t<th scope=\"col\">\n\t\t\tSecuencia\n\t\t</th>\n\t\t";
                    $tabla .= "<th scope=\"col\">\n\t\t\tValor\n\t\t</th>\n";
                    $tabla .= "<thead>\n";
                    $tabla .= "<tbody>\n\t";
                    $i = 0;
                    //Con este contador se verifica que se generen el número 
                    //de términos en la serie que indicó el usuario en el formulario
                    while($i <= $numero1){
                        $class = $i%2 == 0? "odd" : "even";
                        $tabla .= "<tr class=\"$class\">\n\t\t<td>\n\t\t\tF<sub>$i</sub>\n\t\t</td>\n";
                        $tabla .= "\n\t\t<td>\n\t\t\t" . fibonacci($i) . "\n\t\t</td>\n</tr>\n";
                        $i++;
                    }
                    $tabla .= "<tbody>\n</table>\n";
                    echo $tabla;
                    echo  "<br  />\n<a  href=\"{$_SERVER['PHP_SELF']}\"  title=\"Regresar\"  class=\"a-btn\">";
                    echo "\t\t<span class=\"a-btn-symbol\">J</span>\n";
                    echo "\t\t<span class=\"a-btn-text\">Ingresar</span>\n"; 
                    echo "\t\t<span class=\"a-btn-slide-text\">nuevos datos</span></a>";
                    else:
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" class="elegant-aero">
                    <fieldset>
                        <h1>Serie de <span>Fibonacci</span></h1>
                        <ul>
                            <li class="campo">
                                <label for="numero1">Valores para serie: </label>
                                <input  type="text"  name="txtnumero"  id="txtnumero"  size="4"  maxlength="3" pattern="[0-9]{1,3}" required />
                                <span id="numbersOnly">Ingrese números</span>
                            </li>
                            <li class="campo">
                                <input type="submit" name="enviar" value="Generar" class="button" />&nbsp;
                                <input type="reset" name="limpiar" value="Cancelar" class="button" />
                            </li>
                        </ul>
                    </fieldset>
                </form>
                <script src="js/validar.js"></script>
                <?php 
                    endif; 
                ?>
            </article>
        </section>
    </body>
    <script src="js/modernizr.custom.lis.js"></script>
</html>
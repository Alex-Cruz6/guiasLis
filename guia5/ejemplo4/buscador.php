<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Resultados de la búsqueda</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <section>
            <?php
                //El script recibe los siguientes valores
                //$_POST['palabras']: cadena que contiene el conjunto de palabras 
                //que se desea buscar separadas por operadores lógicos
                //$_POST['mayusculasminusculas']: Indicador de si es necesario o no
                //diferenciar entre mayúsculas y minúsculas
                //$_POST['palabracompleta']: Indicador de si se buscan palabras completas
                //$_POST['expresionregular']: Indicador de si cada palabra se debe interpretar
                //como una expresión regular//Eliminar los caracteres de barra invertida "\" introducidos durante
                //la recuperación de los parámetros enviados
                $_POST['palabras'] = preg_replace("/(\\\\\\\\)/", "\\", $_POST['palabras']);
                //Escapar los caracteres "/" ya que actuarán como delimitadores de 
                //la expresión regular
                $_POST['palabras'] = preg_replace("/\//", "\/", $_POST['palabras']);
                //Obtener un array que contenga en cada posición uno de los elementos 
                //o cadenas de búsqueda
                $elementos = preg_split("/&&|\|\|/", $_POST['palabras']);
                //Si está activada la opción de no diferenciar entre mayúsculas y minúsculas
                //se tendrá que agregar el modificador i a la expresión regular
                if(isset($_POST['mayusculasminusculas'])):
                    $opcion = "i";
                else:
                    $opcion = "";
                endif;
                //Si se buscan palabras completas se exigen separadores 
                //de palabras antes y después de cada una de ellas
                if(isset($_POST['palabracompleta'])):
                    $separador_izquierda = "([ [{(¿¡&>\"')]|^)";
                    $separador_derecha = "([ \],;.:})?!&<\"']|$)";
                else:
                    $separador_izquierda = "";
                    $separador_derecha = "";
                endif;
                for($i=0; $i<count($elementos); $i++):
                    //Si los elementos no son expresiones regulares se tienen que escapar 
                    //todos los caracteres con significado especial dentro de las mismas
                    if(!isset($_POST['expresionregular'])):
                        $elementos[$i] = preg_quote($elementos[$i]);
                    endif;
                    //Se compone una expresión regular para cada uno de los elementos 
                    //o palabras de búsqueda
                    $elementos[$i] = "/($separador_izquierda$elementos[$i]$separador_derecha)/" . $opcion;
                endfor;
                $coincidencias = 0;
                //Abrir el directorio actual para realizar en cada uno de sus archivos
                //la búsqueda deseada
                $dir = "./paginas/";
                if(is_dir($dir)):
                    $directorio = opendir($dir);
                endif;
                //Procesamos cada uno de losarchivos del directorio actual
                while($fichero = readdir($directorio)):
                    //Si el archivo tiene extensión html o htm
                    if(preg_match("/.+\.(html$|htm$)/i", $fichero)):
                        //Inicializar un array de booleanos a false. Cada elemento de
                        //dicho array pasará a tomar valor true cuando se encuentre en 
                        //el archivo una ocurrencia de la correspondiente palabra o 
                        //item buscados.
                        for($i=0; $i<count($elementos); $i++):
                            $condiciones[$i] = 0;
                        endfor;
                        //Se abre el archivo para procesarlo
                        $fich = fopen($dir . $fichero, 'r');
                        $acabar = false;
                        //Procesar cada línea del archivo leyendo su contenido
                        //saltando las etiquetas HTML
                        while(($entrada = fgetss($fich, 4096)) && !$acabar):
                            //Eliminar los saltos de línea en cada línea
                            $entrada = chop($entrada);
                            $acabar = true;
                            //Comprobar si la línea actual del archivo contiene una o unas
                            //de las palabras o item de búsqueda
                            for($i=0; $i<count($condiciones); $i++):
                                if(!$condiciones[$i]):
                                    $condiciones[$i] = @preg_match($elementos[$i], $entrada);
                                endif;
                                $acabar = $acabar && $condiciones[$i];
                            endfor;
                        endwhile;
                        fclose($fich);
                        //Componer una cadena con los valores booleanos correspondientes
                        //a cada condición de búsqueda, unidos por los operadores booleanos
                        //introducidos por el usuario
                        $valores_o = preg_split("/\|\|/", $_POST['palabras']);
                        $k = 0;
                        for($i=0; $i<count($valores_o); $i++):
                            $valores_y = preg_split("/&&/", $valores_o[$i]);
                            for($j=0; $j<count($valores_y); $j++):
                                $valores_y[$j] = $condiciones[$k];$k++;
                            endfor;
                            $valores_o[$i] = join("&&", $valores_y);
                        endfor;
                        $_POST['palabras'] = join("||", $valores_o);
                        //Se evalúa la cadena generada: el resultado será booleano
                        eval("\$concuerda = $_POST[palabras];");
                        //Si el archivo cumple todas las condiciones de búsqueda
                        //se muestra como un enlace
                        if($concuerda):
                            if($coincidencias == 0):
                                $h1 = "<h1>\nLista de archivos con el contenido buscado\n</h1>\n";
                                echo $h1;
                                $coincidencias++;
                            endif;
                            $h3  = "\t<h3>\n$coincidencias.-&nbsp;\n";
                            $h3 .= "<a href=\"$dir" . "$fichero\">\n$fichero\n</a>\n</h3>\n";
                            echo $h3;
                        endif;
                    endif;
                endwhile;
                if($coincidencias == 0):
                    $h1  = "<h1>\nNo hay ningún archivo que cumpla los ";
                    $h1 .= "criterios de búsqueda en el directorio $dir</h1>";
                endif;
                closedir($directorio);
            ?>
        </section>
    </body>
</html>
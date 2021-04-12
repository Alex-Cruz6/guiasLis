<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Listado de enlaces</title>
        <link rel="stylesheet" href="css/niko.css" />
    </head>
    <body>
        <header id="vintage">
            <h1>Enlaces registrados</h1>
        </header>
        <section>
            <article>
                <table>
                    <caption>Información de los enlaces</caption>
                    <thead>
                        <tr>
                            <th>Texto del enlace</th>
                            <th>Enlace</th>
                            <th>Nivel</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include_once("ponercampo.php");
                            if(!file_exists("files")):
                                if(!mkdir("files", 0700)):
                                    die("ERROR: No se puede crear el directorio.");
                                endif;
                            endif;
                            define("ENLACES", "files/enlacescsv.txt");
                            $archivo = fopen(ENLACES, 'a') or die("Error al intentar abrir archivo" . ENLACES);
                            //Se genera un array con una posición por cada campo
                            $valores = array($_POST["dominio"], $_POST["enlace"], $_POST["nivel"]);
                            $escritos = fputcsv($archivo, $valores , ",");
                            //Se cierra el archivo para que los datos queden guardados
                            fclose($archivo);
                            //Se abre el archivo para leer los datos de los productos
                            $archivo = fopen(ENLACES, 'r');
                            //Inicializar variable para llevar el control del número de fila
                            $fila = 0;
                            //Se recorre el archivo para mostrar el nuevo contenido
                            while(!feof($archivo)){
                                $buffer = fgetcsv($archivo, 4096, ",");
                                if($buffer[0] != null){
                                    if($fila%2 != 0):
                                        echo "<tr>\n";
                                    else: 
                                        echo "<tr class=\"odd\">\n";
                                    endif;
                                    ponercampo($buffer[0]);
                                    ponercampo($buffer[1]);
                                    ponercampo($buffer[2]);
                                    echo "</tr>\n";
                                    $fila++;
                                }
                            }
                        ?>
                    </tbody>
                </table>
                <a class="a-btn" title="Regresar" href="nuevocsv.html">
                    <span class="a-btn-symbol">#</span>
                    <span class="a-btn-text">Ingresar</span>
                    <span class="a-btn-slide-text">nuevo enlace</span>
                </a>
            </article>
        </section>
    </body>
    <script src="js/modernizr.custom.lis.js"></script>
</html>
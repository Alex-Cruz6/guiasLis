<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0" />
    <title>Información recibida</title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Nobile" />
    <link rel="stylesheet" href="css/tables.css" />
    <script src="js/modernizr.custom.lis.js"></script>
</head>

<body>
    <section>
        <article>
            <div id="info">
                <table id="hor-zebra" summary="Datos recibidos del formulario">
                    <caption>Información de formulario</caption>
                    <thead>
                        <tr class="thead">
                            <th scope="col">Valor en dólares</th>
                            <th scope="col">Valor en euros</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    if(isset($_POST['submit']) && $_POST['submit'] == "Enviar"){
                        echo "\t<tr class=\"odd\">\n";
                        //Accediendo a los datos del formulario usando la función extract()
                        $dolares = $_POST['dolar'];
                        if (empty($dolares)){
                            echo "\t\t<td>\n <a  href=\"index.html\">No  ingresó  el valor en dolares.</a> \n</td>\n";
                        }else{
                          echo "\t\t<td>\n $" . $dolares . "\n</td>\n";
                          echo "\t\t<td>\n" . $dolares*0.86 . "\n</td>\n";
                          echo "\t</tr>\n";
                        }
                    }
                    ?>
                    </tbody>
                </table>
                <div id="link">
                    <a href="index.html" class="button-link">Ingresar nuevos datos</a>
                </div>
            </div>
        </article>
    </section>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Uso de la función range</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/series.css" />
        <link rel="stylesheet" href="css/formoid-solid-purple.css" />
        <script src="js/modernizr.custom.lis.js"></script>
    </head>
    <body>
        <header>
            <h1>Generación de series con función de matrices</h1>
        </header>
        <section>
            <article>
                <form action="<?=$_SERVER['PHP_SELF']; ?>" method="POST" class="formoid-solid-purple">
                    <h2>Tipos de serie</h2>
                    <div class="element-select">
                        <label class="title"></label>
                        <div class="item-cont">
                            <div class="large">
                                <span>
                                    <select name="seltipo">
                                        <option value="AlfabetoMin" selected="selected">Alfabeto en minúsculas</option>
                                        <option value="AlfabetoMay">Alfabeto en mayúsculas</option>
                                        <option value="NumerosPares">Números pares</option>
                                        <option value="NumerosImpares">Números impares</option>
                                    </select>
                                    <i></i>
                                    <span class="icon-place">

                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="submit">
                        <input type="submit" name="enviar" value="Enviar" />
                    </div>
                </form>
                <?php
                    if(isset($_POST['enviar'])){
                        $tiposecuencia = isset($_POST['seltipo']) ? $_POST['seltipo'] : "";
                        switch($tiposecuencia){
                            case "AlfabetoMin":
                                $inicio = 'a';
                                $final = 'z';
                                $salto = '1';
                            break;
                            case "AlfabetoMay":
                                $inicio = 'A';
                                $final = 'Z';
                                $salto = '1';
                            break;
                            case "NumerosPares":
                                $inicio = '0';
                                $final = '50';
                                $salto = '2';
                            break;
                            case "NumerosImpares":
                                $inicio = '1';
                                $final = '50';
                                $salto = '2';
                            break;
                        }
                        $secuencia = range($inicio,$final,$salto);
                        echo "<div id=\"box\">";
                        foreach($secuencia as $letra)
                            echo "<span class=\"caracter\">" . $letra . "</span>&nbsp;&nbsp;\n";
                            echo "</div>";
                    }
                ?>
            </article>
        </section>
    </body>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>
        window.jQuery document.write('<script src="js/jquery.min.js"><\/script>')
    </script>
    <script src="js/formoid-solid-purple.js"></script>
</html>
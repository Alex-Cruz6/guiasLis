<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Convertir entre monedas</title>
        <link rel="stylesheet" href="css/fonts.css" />
        <link rel="stylesheet" href="css/monedas.css" />
    </head>
    <body>
        <header id="boardgame">
            <h1>Equivalencias entre monedas</h1>
            <hr>
        </header>
        <?php
            $conversion = array("aDolares","aQuetzal","aLempira","aCordova","aColon");
            $precios = array(500,750,1000,1500,3000,7500,12000);
            //Funciones para usar como funciones variables
            //y hacer la tabla de llamadas que permitirá
            //invocar a las funciones del array con retrollamadas
            function aDolares($dato){
                return sprintf("%02.2f", $dato*0.11425);
            }
            function aQuetzal($dato){
                return sprintf("%02.2f", $dato*0.87214);
            }
            function aLempira($dato){
                return sprintf("%02.2f", $dato*2.14132);
            }
            function aCordova($dato){
                return sprintf("%02.2f", $dato*2.60470);
            }function aColon($dato){
                return sprintf("%02.2f", $dato*58.1205);
            }
        ?>
        <section>
            <article>
                <table class="column-options">
                    <thead>
                        <tr>
                            <th>Colones (sv)</th>
                            <th>Dólares (sv)</th>
                            <th>Quetzales (gt)</th>
                            <th>Lempiras(ho)</th>
                            <th>Córdovas (ni)</th>
                            <th>Colones (cr)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            for($i=0;$i<sizeof($precios);$i++){
                                if($i%2 == 0){
                                    echo "\t<tr>\n";
                                }else{
                                    echo "\t<tr class=\"odd\">\n";
                                }
                                echo "\t\t<td>\t\t&cent; " . $precios[$i] . "\t\t</td>\n\t\t";
                                for($j=0; $j<sizeof($conversion); $j++):$resultado = $conversion[$j];
                                switch($resultado):
                                    case "aDolares":
                                        $signo = "$";
                                    break;
                                    case "aQuetzal":
                                        $signo = "Q";
                                    break;
                                    case "aLempira":
                                        $signo = "L$";
                                    break;
                                    case "aCordova":
                                        $signo = "C$";
                                    break;
                                    case "aColon":
                                        $signo = "&cent;";
                                    break;
                                endswitch;
                                echo "<td>\t\t$signo " . number_format($resultado($precios[$i]),3,".",",") . "\t\t</td>\n\t";
                            endfor;
                            echo "\t</tr>\n";
                            }
                        ?>
                    </tbody>
                </table>
            </article>
        </section>
    </body>
</html>
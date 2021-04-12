<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Conversión a binario</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/decimalbinario.css" />
        <script src="js/modernizr.custom.lis.js"></script>
    </head>
    <body>
        <header>
            <?php
            if(isset($_POST['convertir']) && strlen($_POST['numero']) > 0){
                $decimal = $_POST['numero'];?>
                <h1><?=$decimal; ?><sub>10</sub> convertido a binario</h1>
                <?php
            }else{
                //No hacer nada
            }?>
        </header>
        <div id="content">
            <section>
                <article>
                    <div id="wrapper">
                        <p>
                            <?php
                            if(isset($_POST['convertir'])){
                                $decimal = $_POST['numero'];
                                if(strlen($decimal) > 0){
                                    $msg  = "El número decimal es: ";
                                    $msg .= "<b>$decimal</b><br>\n";
                                    echo $msg;$binario = '';
                                    do{
                                        $binario = $decimal % 2 . $binario;$msg  = "$decimal % 2 = ";
                                        $msg .= "<b>$binario</b><br>\n";
                                        echo $msg;
                                        $decimal = (int)($decimal/2);
                                    }while ($decimal > 0);
                                    $msg  = "<span class=\"marked\">Número binario resultante: ";
                                    $msg .= "$binario</span>\n";
                                    echo $msg;
                                }else{
                                    $prevpage = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "";
                                    if(strlen($prevpage) == 0){
                                        $prevpage = "decimalbinario.html";
                                    }
                                    $msg =  "No ha ingresado dato en el campo de texto.<br />";
                                    $msg .= "<a href=\"" . $prevpage . "\">Volver a intentar</a>";
                                    echo $msg;
                                }
                            }
                            ?>
                        </p>
                    </div>
                </article>
            </section>
        </div>
    </body>
</html>
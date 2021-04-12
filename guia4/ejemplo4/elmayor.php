<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0" />
        <title>Trabajando con funciones de lista variable de argumentos</title>
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald" />
        <link rel="stylesheet" href="css/elmayor.css" />
        <script src="js/modernizr.custom.lis.js"></script>
        <script src="js/prefixfree.min.js"></script>
    </head>
    <body>
        <header>
            <h1>Mayor de una lista de números</h1>
        </header>
        <section id="container">
            <article id="leftcol">
                <?php
                    function elMayor(){
                        $num_args = func_num_args();
                        $args = func_get_args();
                        //$elmayor = ($dato1 > $dato2) ? $dato1 : $dato2;
                        $elmayor = $args[0];
                        for($i=1; $i<$num_args; $i++){
                            $elmayor = ($elmayor > $args[$i]) ? $elmayor : func_get_arg($i);
                        }return $elmayor;
                    }
                    echo "El mayor de58, 167, 242, 85, 31, 109, -26, 81, 16, 126 es: " . "<h2>" 
                    . elMayor(58, 167, 242, 85, 31, 109, -26, 81, 16, 126) . "</h2>";
                ?>
            </article>
            <article id="rightcol">
                <?php
                    echo "El mayor de 61, 37, 75, 184, 42, -303, 43, 56, -121, 226, 172, 78, 6, 86 es: " . "<h2>" 
                    . elMayor(61, 37, 75, 184, 42, -303, 43, 56, -121, 226, 172, 78, 6, 86) . "</h2>";
                ?>
            </article>
        </section>
    </body>
</html>
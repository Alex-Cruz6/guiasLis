<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta  name="viewport" content="width=device-width,  initial-scale=1,  maximum-scale=1">
        <title>Venta de autos</title>
        <link rel="stylesheet" href="css/autospoo.css" />
        <!--[if lt IE 9]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
        <header>
            <h1>Autos disponibles</h1>
        </header>
        <section>
            <article>
                <?php
                    //Incluyendo el archivo de clase
                    function __autoload($classname) {
                        include_once("class/" . $classname . ".class.php");
                    }
                    //Creando los objetos para cada tipo de auto. Notar que se están 
                    //asignando a elementos de una matriz que tendrá por nombre $movil
                    $movil[0] = new auto("Peugeot", "307", "Gris", "img/peugeot.jpg");
                    $movil[1] = new auto("Renault", "Clio", "Marron", "img/renaultclio.jpg");
                    $movil[2] = new auto("BMW", "Serie6", "Azul", "img/bmwserie6.jpg");
                    //Esta llamada mostrará los valores por defecto en los argumentos 
                    //del método constructor.
                    $movil[3] = new auto();
                    //Mostrando la tabla conlos autos disponibles
                    for($i=0; $i<count($movil); $i++){
                        $movil[$i]->mostrar();
                    }
                ?>
            </article>
        </section>
    </body>
</html>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Creación de imágenes de muestra</title>
        <link rel="stylesheet" href="css/miniaturas.css" />
    </head>
    <body>
        <header>
            <h1 class="engraved">Imágenes miniatura con PHP</h1>
        </header>
        <section>
            <article>
                <?php
                    function __autoload($classname){
                        require_once "class/" . $classname . ".class.php";
                    }
                    $objpng = new archivoPNG("escudo-el-salvador.png");
                    //Probando la creación de la imagen en miniatura
                    $archivoimagen = "escudo-el-salvador.png";
                    $archivoimagenmuestra = "thumbs-escudo-es.png";
                    $objpng = new archivoPNG($archivoimagen);
                    $objpng->creamuestra($archivoimagenmuestra,64,64);
                    $objpngmuestra = new archivoPNG($archivoimagenmuestra);
                    $objpng->mostrarimagenesPNG($archivoimagen, $archivoimagenmuestra, $objpng, $objpngmuestra);
                ?>
            </article>
        </section>
    </body>
</html>
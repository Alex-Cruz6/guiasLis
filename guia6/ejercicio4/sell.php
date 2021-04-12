<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta  name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Crear y usar interfaces</title>
        <link rel="stylesheet" href="css/common.css" />
    </head>
    <body>
        <header>
            <h1>Almacén El Machetazo</h1>
        </header>
        <section>
            <article>
                <?php
                    function __autoload($clase){
                        require_once("class/" . $clase . ".class.php");
                    }
                    $tv = new television;
                    $tv->setScreenSize(42);
                    $ball = new tennisBall;
                    $ball->setColor("amarilla");
                    $movie = new movie;
                    $movie->setTitle("Interestelar");
                    $movie->setGener("Ficcion");
                    $manager = new storeManager();
                    $manager->addProduct($tv);
                    $manager->addProduct($ball);
                    $manager->addProduct($movie);
                    $manager->stockUp();
                    echo "<p>Existen ". $tv->getStockLevel() . " televisores de " . $tv->getScreenSize();
                    echo "-pulgadas, " . $ball->getStockLevel() . " pelotas de tenis " . $ball->getColor();
                    echo " en existencia.</p>";
                    echo "<p> y la pelicula " . strval($movie->getTitle()) . " en el genero " . strval($movie->getGener());
                    echo " con " . $movie->getStockLevel() . " existencias en stock</p>";
                    echo "<p>Vendiendo un televisor...</p>";
                    $tv->sellItem();
                    echo "<p>Vendiendo dos pelotas de tenis...</p>";
                    $ball->sellItem();
                    $ball->sellItem();
                    echo "<p>Vendiendo 3 peliculas de " . strval($movie->getTitle()) . "...</p>";
                    $movie->sellItem();$movie->sellItem();$movie->sellItem();
                    echo "<p>Ahora existen ". $tv->getStockLevel() . " televisores de " . $tv->getScreenSize();
                    echo "-pulgadas, " . $ball->getStockLevel() . " pelotas de tenis " . $ball->getColor();
                    echo " en existencia.</p>";
                    echo "<p> y " . $movie->getStockLevel() . " existencias de la pelicula " . strval($movie->getTitle()) . "</p>";
                ?>
            </article>
        </section>
    </body>
</html>
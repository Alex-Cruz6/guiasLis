<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Cartelera de cine</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/cartelera.css" />
        <script src="js/modernizr.custom.lis.js"></script>
    </head>
    <body>
        <header>
            <h1>Cartelera de cine</h1>
        </header>
        <section>
            <?php
                //Creamos una variable con el directorio o carpeta que contiene las imágenes
                $dir = "img";
                //Creamos una matriz con los nombres de las imágenes que se almacenan en el directorio
                $peliculas = array(
                    "al-diablo-con-el-diablo.jpg", 
                    "click.jpg",
                    "cruzada.jpg", 
                    "efecto-mariposa.jpg",
                    "busca-de-la-felicidad.jpg", 
                    "amenaza-fantasma.jpg",
                    "la-milla-verde.jpg", 
                    "la-propuesta.jpg",
                    "comunidad-del-anillo.jpg", 
                    "sexto-sentido.jpg"
                );
                //Obtener cuatro claves de la matriz $peliculas
                $claves = array_rand($peliculas, 4);
                //Creando una estructura de 3 columnas con elementos DIV
            ?>
            <article>
                <img src="<?php echo $dir . "/" . $peliculas[$claves[0]]; ?>" width="200" /><br />
                <img src="<?php echo $dir . "/" . $peliculas[$claves[1]]; ?>" width="200" />
            </article>
            <article>
                <hgroup>
                    <h2>CINE REFORMA</h2>
                    <h3>Los mejores estrenos los encuentras aquí</h3>
                    <h4>Estas son las películas en cartelera</h4>
                </hgroup>
                <div id="">
                    <form action="pagoentrada.php" method="POST">
                        <fieldset>
                            <legend>
                                <span>Entrada al cine</span>
                            </legend>
                            <label for="pelicula">Película</label>
                            <select name="pelicula" id="pelicula">
                                <option value="mov0001" selected="selected">Al diablo con el diablo</option>
                                <option value="mov0002">Click</option>
                                <option value="mov0003">Cruzada</option>
                                <option value="mov0004">El efecto mariposa</option>
                                <option value="mov0005">En busca de la felicidad</option>
                                <option value="mov0006">La amenaza fastasma</option>
                                <option value="mov0007">Milagros inesperados</option>
                                <option value="mov0008">La propuesta</option>
                                <option value="mov0009">La comunidad del anillo</option>
                                <option value="mov0010">El sexto sentido</option>
                            </select><br />
                            <label for="cantidad">Cantidad</label>
                            <input type="text" name="cantidad" id="cantidad" maxlength="1" placeholder="Cantidad" pattern="\d{1}" required /><br />
                            <input type="submit" name="comprar" value="Comprar" />
                        </fieldset>
                    </form>
                </div>
            </article>
            <article>
                <img src="<?php echo $dir . "/" . $peliculas[$claves[2]]; ?>" width="200" /><br />
                <img src="<?php echo $dir . "/" . $peliculas[$claves[3]]; ?>" width="200" />
            </article>
        </section>
    </body>
</html>
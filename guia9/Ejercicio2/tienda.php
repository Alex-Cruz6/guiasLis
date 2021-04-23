<?php
    require_once("funciones.php");
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>PHP [hidden:urls]: tienda.php</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" />
    </head>
    <body>
        <header>
            <h1 align="center">Carrito de compra</h1>
        </header>
        <section>
            <article>
                <?php
                    //Recuperando objetos pertenecientes al carrito
                    $carrito = generarCarrito();
                    if(isset($_GET['articulo']))
                    //Incrementar el número de unidades del artículo elegido
                    if(empty($carrito[$_GET['articulo']])):
                        $carrito[$_GET['articulo']] = 1;
                    else:
                        $carrito[$_GET['articulo']]++;
                    endif;
                    //Mostrar los artículos disponibles
                    estantes($carrito);
                    echo "<hr/>";
                    //Mostrar el contenido del carrito
                    mostrarCarrito($carrito);   
                ?>
                <form action="./caja.php">
                    <div align="center">
                        <?php
                            $hidden= "";
                            //Generar los controles ocultos con las variables
                            //comunes de la aplicación
                            foreach($carrito as $ref => $unidades){
                                $hidden .= "<input type=\"hidden\" name=\"$ref\" value=\"$unidades\" />\n";
                            }
                            echo $hidden;
                        ?>
                        <button class="btn btn-primary" type="submit">Caja</button>
                    </div>
                </form>
            </article>
        </section>
    </body>
</html>
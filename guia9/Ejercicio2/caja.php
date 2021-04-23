<?php
    //Incluir librería con las funciones auxiliares
    require_once("funciones.php");
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>PHP [hidden y urls]: caja.php</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" />
    </head>
    <body>
        <section>
            <article>
                <?php
                    echo "<h1 align=\"center\">Contenido del carrito</h1>\n";
                    //Recuperar los objetos pertenecientes al carrito
                    $carrito = generarCarrito();
                    //Mostrar el contenido
                    mostrarCarrito($carrito);
                ?>
                <p align="center">
                    Pulsa <a class="btn btn-primary" href="./tienda.php">aquí</a> para continuar.
                </p>
            </article>
        </section>
    </body>
</html>
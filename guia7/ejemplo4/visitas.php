<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Contador de visitas con fichero txt</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" media="all" href="css/contador.css" />
    </head>
    <body>
        <header>
            <h1>Contador de visitas</h1>
        </header>
        <section>
            <article>
                <div id="contenedor">
                    <h2>Usted es el visitante Número:</h2>
                    <div id="visitas">
                        <?php
                            include_once("contador.php");
                            AumentarContador();
                            LeerContador();
                        ?>
                    </div>
                    <!--Fin de div visitas-->
                </div>
                <!--Fin de div contenedor-->
            </article>
        </section>
    </body>
</html>
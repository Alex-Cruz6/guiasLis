<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Productos de la tienda</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/productos.css" />
        <script src="js/modernizr.custom.lis.js"></script> 
    </head>
    <body>
        <section>
            <article>
                <table>
                    <thead>
                        <th class="head">Productos</th>
                    </thead>
                    <tbody>
                        <?php
                            if(isset($_POST['enviar'])){
                                if(isset($_POST['ingresados'])){
                                    foreach($_POST["ingresados"] as $productos){
                                        echo "<tr>\n<td>$productos</td>\n</tr>";
                                    }
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </article>
        </section>
    </body>
</html>
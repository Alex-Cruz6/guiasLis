<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Eliminar un libro</title>
        <link rel="stylesheet" href="css/vertical-nav.css" />
        <link rel="stylesheet" href="css/formoid-solid-purple.css" />
        <link rel="stylesheet" href="css/links.css"/>
        <!--<link rel="stylesheet" href="css/formdesign.css" /> -->
        <script src="js/modernizr.custom.lis.js"></script>
    </head>
    <body>
        <header>
            <h1 class="3d-text">Eliminar libro</h1>
        </header>
        <section>
            <article>
                <?php
                    //Incluir librería de conexión a la base de datos
                    include_once("db-mysqli.php");
                    //Haciendo una consulta de todos los libros presentes
                    //en la tabla libros
                    $consulta = "SELECT * FROM libros WHERE isbn='" . $_GET['id'] . "'";
                    //echo $consulta . "<br>\n";
                    //Ejecutando la consulta a través del objeto $db
                    $resultc = $db->query($consulta);
                    //Obteniendo el número de registros devueltos
                    $num_results = $resultc->num_rows;
                    $row = $resultc->fetch_assoc();
                ?>
                <form action="mostrarlibros.php?id=<?php echo $_GET['id'] ?>&opc=eliminar" method="POST" class="formoid-solid-purple">
                    <div class="title">
                        <h2>¿Deseas Eliminar el libro?</h2>
                    </div>
                    <div class="element-number">
                        <label class="title"></label>
                        <div class="item-cont">
                            <input type="text" name="isbn" value="<?php echo $row['isbn'] ?>" maxlength="18" placeholder="ISBN" class="large" readOnly/>
                            <span class="icon-place"></span>
                        </div>
                    </div>
                    <div class="element-name">
                        <label class="title"></label>
                        <div class="nameFirst">
                            <input type="text" name="autor" value="<?php echo $row['autor'] ?>" maxlength="50" placeholder="Autor" class="large" readOnly/>
                            <span class="icon-place"></span>
                        </div>
                    </div>
                    <div class="element-input">
                        <label class="title"></label>
                        <div class="item-cont">
                            <input type="text" name="titulo" value="<?php echo $row['titulo'] ?>" maxlength="70" placeholder="Título" class="large" readOnly/>
                            <span class="icon-place"></span>
                        </div>
                    </div>
                    <div class="element-number">
                        <label class="title"></label>
                        <div class="item-cont">
                            <input type="text" name="precio" value="<?php echo $row['precio'] ?>" maxlength="8" placeholder="Precio" class="large" readOnly/>
                            <span class="icon-place"></span>
                        </div>
                    </div>
                    <div class="submit">
                        <input type="submit" name="cancelar" id="cancelar" value="Cancelar" />
                        <input type="submit" name="eliminarlibro" id="eliminarlibro" value="Eliminar" />
                    </div>
                </form>
                <!--<form action="mostrarlibros.php?id=<?php echo $_GET['id'] ?>" method="POST">
                    <fieldset>
                        <legend><span>Modificar la información de un libro</span></legend>
                        <ul>
                            <li>
                                <label for="isbn" class="item">ISBN: </label>
                                <div class="campo">
                                    <input type="text" name="isbn" value="<?php echo $row['isbn'] ?>" size="18" maxlength="18" placeholder="ISBN" />
                                </div>
                            </li>
                            <li>
                                <label for="autor" class="item">Autor: </label>
                                <div class="campo">
                                    <input type="text" name="autor" value="<?php echo $row['autor'] ?>" size="36" maxlength="50" placeholder="Autor" />
                                </div>
                            </li>
                            <li>
                                <label for="titulo" class="item">Título: </label>
                                <div class="campo">
                                    <input type="text" name="titulo" value="<?php echo $row['titulo'] ?>" size="36" maxlength="60" placeholder="T&iacute;tulo" />
                                </div>
                            </li>
                            <li>
                                <label for="precio" class="item">Precio: </label>
                                <div class="campo">
                                    <input type="text" name="precio" value="<?php echo $row['precio'] ?>" size="6" maxlength="6" placeholder="Precio" />
                                </div>
                            </li>
                            <li>
                                <div class="boton">
                                    <input type="submit" name="guardar" value="Guardar" />
                                </div>
                            </li>
                        </ul>
                    </fieldset>
                </form>-->
                <a href="mostrarlibros.php?opc=eliminar" class="a-btn">
                    <span class="a-btn-symbol">i</span>
                    <span class="a-btn-text">Volver</span> 
                    <span class="a-btn-slide-text">a la tabla de eliminación</span>
                    <span class="a-btn-slide-icon"></span>
                </a>
            </article>
        </section>
    </body>
</html>
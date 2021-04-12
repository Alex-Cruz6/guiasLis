<!DOCTYPE html>
<html lang="es">

<head>
    <title>Ejercicio de Expresiones Regulares</title>
    <link rel="stylesheet" href="css/styles.css" />
    <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--[if IE 6]><script src="js/belatedPNG.js"></script><script>DD_belatedPNG.fix('*');</script><![endif]-->
</head>

<body>
    <div id="bodywrap">
        <section id="pagetop"></section>
        <header id="pageheader">
            <h1>Uso de<span> Expresiones Regulares</span></h1>
        </header>
        <div id="contents">
            <section id="main">
                <div id="leftcontainer">
                    <h2>Buscador de Palabras</h2>
                    <section id="sidebar">
                        <?php
                            if(isset($_POST['Enviar'])){
                                $text = $_POST['comment'];
                                $palabra = $_POST['palabra'];
                                $contador = 0;
                                $text = preg_replace("/\b(".$palabra.")\b/i", '<span style="background:#5fc9f6">\1</span>', $text, -1, $contador);
                                ?>
                                <div id="sidebarwrap">
                                    <h2>Resultado: se encontraron <?=$contador ?> coincidencias </h2>
                                    <p><?=$text?>
                                    </p>
                                </div>
                            <?php
                            }
                        ?>
                    </section>
                    <div class="clear"></div>
                    <article class="post">
                        <form
                            action="<?php echo $_SERVER['PHP_SELF'] ?>"
                            method="post" class="form">
                            <p class="textfield"><label for="palabra"><small>Palabra a buscar</small></label><input
                                    name="palabra" id="palabra" value="" size="22" tabindex="1" type="text" /></p>
                            <p><small>Ingrese el texto de prueba para procesarlo con las <strong>expresiones
                                        regulares</strong></small></p>
                            <p class="text-area"><textarea name="comment" id="comment" cols="50" rows="10"
                                    tabindex="4">Sample sentence from KomunitasWeb, regex has become popular in web programming. Now we learn regex. According to wikipedia, Regular expressions (abbreviated as regex or regexp, with plural forms regexes, regexps, or regexen) are written in a formal language that can be interpreted by a regular expression processor</textarea>
                            </p>
                            <p><input name="Enviar" id="Enviar" value="1" type="hidden" />
                                <input name="submit" id="submit" tabindex="5" type="image"
                                    src="images/submit.png" /></p>
                            <div class="clear"></div>
                        </form>
                        <div class="clear"></div>
                    </article>
                </div>
            </section>
            <div class="clear"></div>
        </div>
    </div>
    <footer id="pagefooter">
        <div id="footerwrap"></div>
    </footer>
</body>

</html>
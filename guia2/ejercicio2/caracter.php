<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caracter</title>
    <meta http-equiv="Content-Script-Type" content="text/javascript" />
    <link rel="stylesheet" href="css/fonts.css" />
    <link rel="stylesheet" href="css/formstyle.css" />
    <link rel="stylesheet" media="screen" href="css/bisiesto.css" />
    <script src="js/validatedata.js"></script><script src="js/prefixfree.min.js"></script>
</head>
<body>
    <div class="wrapper">
        <?php
            if(!isset($_POST['enviar'])):?>
                <form action="<?= $_SERVER['PHP_SELF'];?>" method="POST" name="frmdatos">
                    <h2 class="contact">Verificar caracter</h2>
                    <span class="contact">
                        <label for="txtdato">Ingrese un caracter:</label>&nbsp;&nbsp;
                    </span>
                    <input type="text" name="caracter" id="caracter" value="" maxlength="1" placeholder="(Ingrese el dato)" /><br />
                    <input type="submit" name="enviar" id="enviar" value="Probar" />
                </form>
            <?php
            else://verificamos el caracter
                $caracter = isset($_POST['caracter']) ? $_POST['caracter'] : 0;
                switch($caracter){
                    case 'A': case 'E': case 'I': case 'O': case 'U':
                        echo "<p class=\"caracter\">";
                        echo "<span style=\"color:Green;font:bold 10pt 'Lucida Sans';\">
                                El caracter $caracter es una vocal mayúscula</span><br />\n";
                        echo "<span style=\"color:Green;font:bold 10pt 'Lucida Sans';\">
                                <a href=\"{$_SERVER['PHP_SELF']}\">Probar otro caracter</a>";
                        echo "</p>";
                    break;
                    case 'a': case 'e': case 'i': case 'o': case 'u':
                        echo "<p class=\"caracter\">";
                        echo "<span style=\"color:Green;font:bold 10pt 'Lucida Sans';\">
                                El caracter $caracter es una vocal minúscula</span><br />\n";
                        echo "<span style=\"color:Green;font:bold 10pt 'Lucida Sans';\">
                                <a href=\"{$_SERVER['PHP_SELF']}\">Probar otro caracter</a>";
                        echo "</p>";
                    break;
                    case 'á': case 'é': case 'í': case 'ó': case 'ú':
                        echo "<p class=\"caracter\">";
                        echo "<span style=\"color:Green;font:bold 10pt 'Lucida Sans';\">
                                El caracter $caracter es una vocal minúscula acentuada</span><br />\n";
                        echo "<span style=\"color:Green;font:bold 10pt 'Lucida Sans';\">
                                <a href=\"{$_SERVER['PHP_SELF']}\">Probar otro caracter</a>";
                        echo "</p>";
                        break;
                    case 'Á': case 'É': case 'Í': case 'Ó': case 'Ú':
                        echo "<p class=\"caracter\">";
                        echo "<span style=\"color:Green;font:bold 10pt 'Lucida Sans';\">
                                El caracter $caracter es una vocal  acentuada</span><br />\n";
                        echo "<span style=\"color:Green;font:bold 10pt 'Lucida Sans';\">
                                <a href=\"{$_SERVER['PHP_SELF']}\">Probar otro caracter</a>";
                        echo "</p>";
                    break;
                    case 'B': case 'C': case 'D': case 'F': case 'G': case 'H': case 'J': case 'K': case 'L':
                    case 'M': case 'N': case 'P': case 'Q': case 'R': case 'S': case 'T': case 'V': case 'X':
                    case 'Y': case 'Z':
                        echo "<p class=\"caracter\">";
                        echo "<span style=\"color:Green;font:bold 10pt 'Lucida Sans';\">
                                El caracter $caracter es una consonante mayúscula</span><br />\n";
                        echo "<span style=\"color:Green;font:bold 10pt 'Lucida Sans';\">
                                <a href=\"{$_SERVER['PHP_SELF']}\">Probar otro caracter</a>";
                        echo "</p>";
                    break;
                    case 'b': case 'c': case 'd': case 'f': case 'g': case 'h': case 'j': case 'k': case 'l':
                    case 'm': case 'n': case 'p': case 'q': case 'r': case 's': case 't': case 'v': case 'x':
                    case 'y': case 'z':
                        echo "<p class=\"caracter\">";
                        echo "<span style=\"color:Green;font:bold 10pt 'Lucida Sans';\">
                                El caracter $caracter es una consonante minúscula</span><br />\n";
                        echo "<span style=\"color:Green;font:bold 10pt 'Lucida Sans';\">
                                <a href=\"{$_SERVER['PHP_SELF']}\">Probar otro caracter</a>";
                        echo "</p>";
                    break;
                    case '0': case '1': case '2': case '3': case '4': case '5': case '6': case '7': case '8': case '9':
                        echo "<p class=\"caracter\">";
                        echo "<span style=\"color:Green;font:bold 10pt 'Lucida Sans';\">
                                El caracter $caracter es un número entre 0 al 9</span><br />\n";
                        echo "<span style=\"color:Green;font:bold 10pt 'Lucida Sans';\">
                                <a href=\"{$_SERVER['PHP_SELF']}\">Probar otro caracter</a>";
                        echo "</p>";
                    break;
                    case '.': case ',': case ';': case ':': case '(': case ')': case '"': case '!': case '¡':
                    case '¿': case '?': case '#': case '$': case '%': case '&': case '=': case '/': case '*':
                    case '+': case '-':
                        echo "<p class=\"caracter\">";
                        echo "<span style=\"color:Green;font:bold 10pt 'Lucida Sans';\">
                                El caracter $caracter es un simbolo</span><br />\n";
                        echo "<span style=\"color:Green;font:bold 10pt 'Lucida Sans';\">
                                <a href=\"{$_SERVER['PHP_SELF']}\">Probar otro caracter</a>";
                        echo "</p>";
                    break;
                    default: 
                    echo "<p class=\"caracter\">";
                        echo "<span style=\"color:Green;font:bold 10pt 'Lucida Sans';\">
                                El caracter ingresado no se puede procesar</span><br />\n";
                        echo "<span style=\"color:Green;font:bold 10pt 'Lucida Sans';\">
                                <a href=\"{$_SERVER['PHP_SELF']}\">Probar otro caracter</a>";
                        echo "</p>";
                }
            endif;
        ?>
    </div>
</body>
</html>
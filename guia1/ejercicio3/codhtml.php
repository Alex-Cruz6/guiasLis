<?php
    $doctype = "<!DOCTYPE html>";
    echo $doctype;

    $html = "<html lang=\"es\">";
    $html .= "<head>";
    $html .= "<title>Tipos de datos en PHP</title>";
    $html .= "<meta charset=\"utf-8\" />";
    $html .= "<meta name=\"viewport\" content=\"width=device-width,user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0\" />";
    $html .= "<link rel=\"stylesheet\" href=\"css/cadenas.css\" />";
       // <!--[if lt IE 9]><script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    $html .= "</head>";

    $html .= "<body>";
    $title = "Tipos de datos en PHP";
    $html .= "<header>\n";
    $html .= "\t<h1>$title</h1>\n";
    $html .= "</header>\n";
    //Ejemplos con números enteros
    $a = 536; # número decimal
    $a = -258; # un número decimal negativo
    $a = 0123; # número octal (equivalente al 83 decimal)
    $a = 0x12; # número hexadecimal (equivalente al 18 decimal)
    $html .= "<section>\n";
    $html .= "<article>\n";
    $html .= "\t<p>\n\t\t$a (Hexadecimal)<br />\n";
    //Ejemplos con números con parte decimal
    $a = 1.579;
    $a = 1.2e3;
    $html .= "\t\t" . $a . " (Notación científica)\t</p>\n";
    $html .= "</article>\n";
    echo $html;
    //Ejemplos con cadenas de texto
    $proverbio = <<<PRO
    <article>
        <p>
            <em>"Aquel que pregunta es un tonto por un momento, pero el que no pregunta, permanecerá tonto para siempre."</em>
        </p>
    </article>
    PRO;
    $str = <<<EOD
    <p>Este es un ejemplo de cadena expandiendo múltiples líneasusando sintaxis de documento incrustado, conocida también comosintaxis HERE DOC usada en el lenguaje Perl.<br /> $proverbio</p>
    EOD;
    $str4  = "<span>\n";
    $str4 .= "\tEste es el curso de ";
    $str4 .= "Desarrollo de Aplicaciones Web con Software Interpretado en el Servidor.</span>\n";
    printf("<article>\n");
    printf("\t<h2>Bienvenida: %s</h2>\n", $str4);
    echo $str;
    echo "</article>\n";
    echo "</section>\n";
    $html2 = "</body>";
    $html2 .= "</html>";
    echo $html2;
?>
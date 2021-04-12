<!DOCTYPE html>
<html lang="es">
<head>
 <title>Variables predefinidas</title>
 <meta charset="utf-8" />
 <meta name="viewport" content="width=device-width,user-scalable=no,initialscale=1.0,maximum-scale=1.0,minimum-scale=1.0" />
 <link rel="stylesheet" href="css/predefinidas.css" />
 <script src="js/modernizr.custom.lis.js"></script>
</head>
<body>
<?php
printf("<div id=\"contenedor\">\n");
 printf("<header>\n");
 printf("\t<h1>Variables predefinidas - Matrices superglobales</h1>\n");
 printf("\t<img src=\"img/bg-header.png\" alt=\"Variables predefinidas\"
title=\"Variables predefinidas\"\n");
 printf("</header>\n");
 printf("<section>\n");
 printf("<article>\n");
 printf("\t<p>En esta página se ilustrará cómo se utilizan algunas variables
predefinidas\n");
 printf("\ten el lenguaje PHP. Estas variables están disponibles para cualquier
script\n");
 printf("\tque se ejecute y las utilice.</p>\n");
 printf("\t<p>El valor de estas variables dependerá del servidor sobre el que se ejecuten,
\n");
 printf("\tde la versión de este y de la configuración que tenga.</p>\n");
 printf("<h3>Ejemplos de utilización:</h3>\n");
 printf("<ul>\n<li>La dirección completa del script es:
<b><i> %s</i></b></li>\n", $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF']);
 printf("</article>\n");
 printf("</section>\n");
 printf("</div>\n");
?>
</body>
</html>
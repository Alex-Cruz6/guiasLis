<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="utf-8" />
 <title>Monto a cancelar</title>
 <link rel="stylesheet" href="css/fonts.css" />
 <link rel="stylesheet" href="css/links.css" />
 <link rel="stylesheet" href="css/tabla.css" />
 <script src="js/modernizr.custom.js"></script>
 <script src="js/tabla.js"></script>
</head>
<body>
<?php
 define("DESCUENTO", 0.20);
 if(isset($_POST['enviar'])){
 $edad = isset($_POST['edad']) ? $_POST['edad'] : "";
 $pelicula = isset($_POST['pelicula']) ? $_POST['pelicula'] : "";
 $estudiante = isset($_POST['estudiante']) ? $_POST['estudiante'] : "";
 $precio = 4.50;
 if($estudiante == "Si"){
 $precio *= (1 - DESCUENTO);
 $precio = number_format($precio, 2, '.', ',');
 }
 else{
 $precio = $precio;
 }
 $tabla = <<<TABLA
 <table id="datos">\n
 <caption>Datos del formulario</caption>\n
 <thead>
 </thead>
 <tbody>
 <tr>\n
 <th>
 Película
 </th>\n
<td class="dato">
 $pelicula
 </td>\n
 </tr>\n
 <tr>\n
 <th>
 Edad
 </th>\n
<td class="dato">
 $edad
 </td>\n
 </tr>
 <tr>
 <th>
 Estudiante
 </th>\n
<td class="dato">
 $estudiante
 </td>\n
 </tr>
 <tr>
 <th>
 Precio
 </th>\n
<td class="dato">
 \$ $precio
 </td>\n
 </tr>\n
 </tbody>
 </table>\n
TABLA;
 echo $tabla;
 }
 else{
 echo "ERROR: Datos no han sido enviados.";
 }
?>
<div id="cl-effect-20 a" class="cl-effect-20 a">
 <a href="estudiante.html">
 <span data-hover="Otra entrada">Otra entrada</span>
 </a>
</div>
</body>
</html>
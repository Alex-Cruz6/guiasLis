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
 if(isset($_POST['enviar'])){
 $edad = isset($_POST['edad']) ? $_POST['edad'] : "";
 $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
 $nacimiento = isset($_POST['nacimiento']) ? $_POST['nacimiento'] : "";
 $carnet = isset($_POST['carnet']) ? $_POST['carnet'] : "";
 $extranjero = isset($_POST['extranjero']) ? $_POST['extranjero'] : "";
 if($extranjero == "Si"){
 $extranjero = "Si es Extranjero";
 }
 else{
 $extranjero = "No es extranjero";
 }
 $tabla = <<<TABLA
 <table id="datos">\n
 <caption>Datos del formulario</caption>\n
 <thead>
 </thead>
 <tbody>
 <tr>\n
 <th>
 Nombre
 </th>\n
<td class="dato">
 $nombre
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
 Lugar de nacimiento
 </th>\n
<td class="dato">
 $nacimiento
 </td>\n
 </tr>
 <tr>
 <th>
 Carnet
 </th>\n
<td class="dato">
 $carnet
 </td>\n
 </tr>
 <tr>
 <th>
 Extranjero
 </th>\n
<td class="dato">
 $extranjero
 </td>\n
 </tr>
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
 <a href="datos.html">
 <span data-hover="Otra entrada">Otra entrada</span>
 </a>
</div>
</body>
</html>
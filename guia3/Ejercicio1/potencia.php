<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="utf-8" />
 <title>Potencia</title>
 <link rel="stylesheet" href="css/fonts.css" />
 <link rel="stylesheet" href="css/links.css" />
 <link rel="stylesheet" href="css/tabla.css" />
 <script src="js/modernizr.custom.js"></script>
 <script src="js/tabla.js"></script>
</head>
<body>
<?php
 if(isset($_POST['enviar'])){
 $base = isset($_POST['base']) ? $_POST['base'] : 0;
 $potencia = isset($_POST['potencia']) ? $_POST['potencia'] : 0;
 $resultado = 1;
 for ($i=0; $i < $potencia ; $i++) {
     $resultado *= $base;
 }
 $tabla = <<<TABLA
 <table id="datos">\n
 <caption>Datos del formulario</caption>\n
 <thead>
 </thead>
 <tbody>

 <tr>\n
 <th>
 Base:
 </th>\n
<td class="dato">
 $base
 </td>\n
 </tr>
 <tr>\n
 <th>
 Potencia:
 </th>\n
<td class="dato">
  $potencia
 </td>\n
 </tr>
 <tr>
 <th>
 Resultado:
 </th>\n
<td class="dato">
 $resultado
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
 <a href="potencia.html">
 <span data-hover="Otra Venta">Otra entrada</span>
 </a>
</div>
</body>
</html>
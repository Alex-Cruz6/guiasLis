<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="utf-8" />
 <title>Tabla de Multiplicar</title>
 <link rel="stylesheet" href="css/fonts.css" />
 <link rel="stylesheet" href="css/links.css" />
 <link rel="stylesheet" href="css/tabla.css" />
 <script src="js/modernizr.custom.js"></script>
 <script src="js/tabla.js"></script>
</head>
<body>
<?php
 if(isset($_POST['enviar'])){
  $num = isset($_POST['potencia']) ? $_POST['potencia'] : 0;
  $resultado = 1;
  echo "<table id='datos'>\n";
  echo "<caption>Tabla de multiplicar</caption>\n";
  echo "<thead>";
  echo "</thead>";
  echo "<tbody>";
  for ($i=1; $i <=12 ; $i++) { 
    $resultado = $num * $i;
    echo "<tr>\n";
    echo "<th>";
    echo "$num";
    echo "</th>\n";
    echo "<th>";
    echo "*";
    echo "</th>\n";
    echo "<th>";
    echo "$i";
    echo "</th>\n";
    echo "<td class='dato'>$resultado</td>\n";
    echo "</tr>";
  }
  echo "</tbody>";
  echo "</table>\n";
 }
 else{
 echo "ERROR: Datos no han sido enviados.";
 }
?>
<div id="cl-effect-20 a" class="cl-effect-20 a">
 <a href="tabla.html">
 <span data-hover="Otra Venta">Otra entrada</span>
 </a>
</div>
</body>
</html>
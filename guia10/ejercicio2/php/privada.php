<?php
  session_start();
  if(!isset($_SESSION['usuario'])){
    header('Location: ../');
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Página Privada</title>
  </head>
  <body>
    <h1>Bienvenido <?php echo $_SESSION['usuario']['nombre'] . " " . $_SESSION['usuario']['apellido'] ?></h1>
    <br>
    <h4>Esta es una página privada usando AJAX y PHP</h4><br>
    <a href="salir.php">Cerrar Sesión</a>
  </body>
</html>
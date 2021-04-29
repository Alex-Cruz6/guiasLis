<?php
  session_start();
  if(isset($_SESSION['usuario'])){
    header('Location: privada.php');
  }
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Login con Ajax</title>
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <div class="error">
      <span>Usuario o contraseña invalidos</span>
    </div>
    <div class="main">
      <h1>Formulario de ingreso</h1>
     <form action="" id="formLg">
        <input type="text" name="usuariolg"  placeholder="Usuario" required>
        <input type="password" name="passlg"  placeholder="Contraseña" required>
        <input type="submit" class="botonlg"  value="Iniciar Sesion" >
     </form>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>

<?php
  require('conexion.php');
  sleep(1.5);
  session_start();
  $usu=$_POST['usuariolg'];
  $pass=$_POST['passlg'];
  $usuarios = $mysqli->query("SELECT usuario, nombre, apellido From usuario Where usuario='".$usu."' AND contraseña='".MD5($pass)."'");
  if ($usuarios->num_rows==1):
    $datos= $usuarios->fetch_assoc();
    $_SESSION['usuario'] = $datos;
    echo json_encode(array('error'=>false,'status' => 'OK'));
  else:
      echo json_encode(array('error'=>true));
  endif;
  $mysqli->close();
?>

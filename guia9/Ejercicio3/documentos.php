<?php
  //Se manejarán sesiones por lo tanto incluir librería de seguridad
  require_once('seguridad.php');
  spl_autoload_register(function($class_name) {
        require('class/' . $class_name. '.class.php');
    });

  //Incluyendo la matriz con las opciones de menú 
  //donde está definida la matriz $menu que se envía
  //como tercer argumento del constructor de la clase Page
  require_once('menu.php');

  //Creando una página, instanciando la clase page
    $homepage = new page(
      "Documentos - Nuevo Ingreso UDB", 
      "Documentos de Nuevo Ingreso, Documentos para alumnos de Nuevo Ingreso UDB, Documentos de Ingreso", $menu
    );

  $homepage->content = <<<PAGE
            <table border="1">
               <caption>
                  <span style="color:black;">Bienvenido {$_SESSION['nombreusr']} </span>
               </caption>
               <thead>
                  <tr>
                     <th style="background-color:#05A9FF;color:White;">Documentos a presentar:</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>Partida de nacimiento original reciente máximo de 3 meses.</td>
                  <tr>
                  <tr>
                     <td>Título de bachiller.</td>
                  <tr>
                  <tr>
                     <td>Notas de los dos últimos años de bachillerato (extendidas por el MINED).</td>
                  <tr>
                  <tr>
                     <td>Resultado de la prueba AVANZO o PAES.</td>
                  <tr>
                  <tr>
                     <td>Una fotografía tamaño carné en color o blanco y negro.</td>
                  <tr>
                  <tr>
                     <td>Copia de DUI y NIT</td>
                  <tr>
                  <tr>
                     <td>Si es estudiante extranjero, debe presentar copia del carné de residente y los documentos anteriores debidamente autenticados.</td>
                  <tr>
				  </tr>
               </tbody>
            </table>
      <p>&nbsp;</p>
      <p>&nbsp;</p> 
      <p>&nbsp;</p>
PAGE;
  echo $homepage->display();
?> 
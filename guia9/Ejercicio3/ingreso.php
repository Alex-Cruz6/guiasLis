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
      "Proceso Ingreso - Nuevo Ingreso UDB", 
      "Proceso de Nuevo Ingreso, Proceso para alumnos de Nuevo Ingreso UDB, Proceso de Ingreso", $menu
    );

  $homepage->content = <<<PAGE
            <table border="1">  
               <caption>
                  <span style="color:black;">Bienvenido {$_SESSION['nombreusr']} </span>
               </caption>
               <thead>
                  <tr>
                     <th colspan="2" style="background-color:#05A9FF;color:White;">Pasos del proceso de ingreso para todas las carreras (excepto TMA):</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                    <th style="background-color:#05A9FF;color:White;width:100px;">Paso 1:</th>
                    <td>Llenar el formulario "Registro del estudiante" para el trámite de ingreso. 
                        Al concluirlo podrá dar clic en el ícono "Descargar boleta" y realizar el pago, 
                        como máximo en la fecha que indica la misma, a través de los canales autorizados o por 
                        medio del POS virtual. (Valor a cancelar USD $ 13.00).<br><br> Importante: Para evitar 
                        inconvenientes en la continuidad del proceso, debe verificar que el correo 
                        electrónico esté escrito de manera correcta.
                    </td>
                  <tr>
                    <tr>
                        <th style="background-color:#05A9FF;color:White;">Paso 2:</th>
                        <td>Al realizar el pago correspondiente (USD$13.00, trámite de ingreso), recibirá un correo con el enlace respectivo para llenar el Cuestionario de estudio socioeconómico; así como la Encuesta de Expectativas Estudiantiles utilizando el ID de ingreso.</td>
                    <tr>
                    <tr>
                        <th style="background-color:#05A9FF;color:White;">Paso 3:</th>
                        <td>Recibirá vía correo electrónico la cuota asignada y el enlace para la descarga de la 
                            boleta de pago del Curso de Inducción a la vida Universitaria ($40.00).<br>
                            Si el ingreso es por equivalencias externas, el pago de los aranceles de ingreso serán de $ 10.00.<br>
                            (*) Los aranceles de ingreso dan derecho al Curso de Inducción a la Vida Universitaria, 
                            pruebas diagnósticas y matrícula. No se devuelven si el alumno no se inscribe en la Universidad.<br>
                            (**) Importante: Los pagos realizados no se devuelvan si el alumno no se inscribe en la Universidad.
                        </td>
                    <tr>
                    <tr>
                        <th style="background-color:#05A9FF;color:White;">Paso 4:</th>
                        <td>Al realizar el pago de los $40.00, recibirá un correo con su número de carné y las credenciales de acceso al Portal Web para ingresar y adjuntar los documentos de bachillerato dentro del repositorio (ver guía).</td>
                    <tr>
                    <tr>
                        <th style="background-color:#05A9FF;color:White;">Paso 5:</th>
                        <td>Una vez sean aprobados sus documentos de bachillerato enviados al repositorio, debe de esperar la fecha de inscripción de materias y después cancelar la boleta de pago que el sistema le arrojará en la fecha que está indica. </td>
                    <tr>
				  </tr>
                  <tr>
                     <th colspan="2" style="background-color:#05A9FF;color:White;">Pasos del proceso de ingreso para TMA:</th>
                  </tr>
                  <tr>
                    <th style="background-color:#05A9FF;color:White;width:100px;">Paso 1:</th>
                    <td>Llenar el formulario “Registro del estudiante” [acá] y cancelar el arancel del Curso de Admisión TMA ($75.00). Posteriormente recibirá un correo de confirmación de parte de yessenia.mendez@udb.edu.sv 
                    </td>
                  <tr>
                    <tr>
                        <th style="background-color:#05A9FF;color:White;">Paso 2:</th>
                        <td>Una vez aprobado el Curso de Admisión TMA, la Fac. de Aeronáutica le enviará un 
                            código de aspirante a su correo, junto a la ficha de “Trámite de ingreso” para 
                            poder generar la boleta de $13.00 y cancelar el arancel correspondiente, a 
                            través de los canales de pago autorizados.
                        </td>
                    <tr>
                    <tr>
                        <th style="background-color:#05A9FF;color:White;">Paso 3:</th>
                        <td>Llenar el Cuestionario Socioeconómico y la encuesta de expectativas estudiantiles utilizando el ID de ingreso que recibirá a su correo luego de cancelar los $13.00 
                        </td>
                    <tr>
                    <tr>
                        <th style="background-color:#05A9FF;color:White;">Paso 4:</th>
                        <td>Recibirá vía correo electrónico la cuota asignada, junto con su número de carné y las credenciales de acceso al Portal Web para ingresar y adjuntar los documentos de bachillerato dentro del repositorio.</td>
                    <tr>
                    <tr>
                        <th style="background-color:#05A9FF;color:White;">Paso 5:</th>
                        <td>Una vez sean aprobados sus documentos de bachillerato enviados al repositorio, debe de esperar la fecha de inscripción de materias y después cancelar la boleta de pago que el sistema le arrojará en la fecha que está indica.</td>
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
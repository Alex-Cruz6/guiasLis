<?php
 function __autoload($class_name){
 require("class/" . $class_name . ".class.php");
 }

 //Creando el objeto página
 $homepage = new page();
 $homepage->content = <<<PAGE
 <!-- page content -->
 <div id="topcontent">
    <div id="textbox">
        <div id="title">
            <h2>Institucional</h2>
        </div>
        <div id="paragraph">
            <p>
                La Universidad Don Bosco es una institución apolítica, de inspiración cristiana, 
                sin fines de lucro, creada con carácter permanente y perteneciente a la Institución Salesiana, 
                por fundación y carisma. Fundada en 1984 es continuadora del esfuerzo iniciado por Don Bosco y 
                se orienta hacia la centralidad de la persona y la educación integral de los jóvenes. 
                <br>
            </p>
        </div>
    </div>
    <div id="picture">
        <img src="img/instittucion.png" alt="Imagen de portada"
            width="800" height="370" longdesc="Imagen de portada" />
    </div>
 </div>
 PAGE;
 echo $homepage->display();
?>

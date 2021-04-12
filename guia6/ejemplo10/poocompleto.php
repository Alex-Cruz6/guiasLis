<?php
    function __autoload($classname){
        if($classname  ==  "empleado"  ||  $classname  ==  "estudiante"  ||  $classname  == "bebe"){
            require_once "class/poocompleto.class.php";
        }else{
            require_once "class/" . $classname . ".class.php";
        }
    }
    //Creando al primer empleado
    echo "&ndash; Primera persona y empleado: <br />\n";
    $employee1 = new empleado('Carlos L&oacute;pez');
    echo $employee1 . "<br /><br />\n";
    //Creando al empleado 2 utilizando clonación
    echo "&ndash; Segundo empleado creado con clonaci&oacute;n: <br />\n";
    $employee2 = clone $employee1;
    $employee2->asignaNombre('Mar&iacute;a Calder&oacute;n');
    echo $employee2 . "<br /><br />\n";
    //Se crea el empleado 3 y luego se anula
    echo "&ndash; Se crea al empleado 3 y despu&eacute;s se anula su referencia: <br />\n";
    $employee3 = new empleado('Sonia Cu&eacute;llar');
    echo $employee3 . "<br /><br />\n";
    $employee3 = NULL;
    //Se crea un par de personas más
    echo "&ndash; Creaci&oacute;n de 2 personas m&aacute;s que no son empleados: <br />\n";
    $persona1  =  new  estudiante('Medardo  Enrique  Somoza',  'Ingenier&iacute;a  en Computaci&oacute;n');
    $persona1->tieneLibro('La Biblia de PHP 5');
    echo $persona1 . "<br /><br />\n";
    $persona2 = new bebe('Beb&eacute; 1');
    echo $persona2 . "<br />\n";
    echo "Principal ocupaci&oacute;n: ";
    echo $persona2->ocupacionPrincipal() . "<br /><br />\n";
    echo "Poblaci&oacute;n actual: " . persona::poblacion() . "<br /><br />\n";
    //Se crea un nuevo empleado reutilizando el identificador $id
    echo "&ndash; Creando al empleado 4 y mostrando informaci&oacute;n: <br />\n";
    $employee4 = new empleado('Pedro Cruz');
    echo $employee4 . "<br /><br />\n";
    echo "Poblaci&oacute;n actual: " . persona::poblacion() . "<br /><br />\n";
?>
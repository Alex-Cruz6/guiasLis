<?php
    $materias = array(
        "Lenguajes Interpretados en el Servidor" => array(
            'Claudia Maritza Salazar' => 8.6, 
            'Sonia Lorena López' => 4.9, 
            'Carlos Alberto Ávalos' => 7.9, 
            'Jennifer Gabriela Vásquez' => 6.2,
            'Luisa Roxana Calderón' => 7.5,
            'Pedro Javier Hidalgo' => 9.8,
            'Morena Lissette Segovia' => 8.0,
            'Ligia Beatriz Hernández' => 7.6,
            'Luis Alberto Figueroa' => 9.5,
            'Julia María García' => 8.7,
            'Ileana Carolina Dominguez' =>9.4,
            'Oscar Rodrigo Reyes' => 8.5
        ),
        "Programación Orientada a Objetos I" => array(
            'Ramiro Leonel Zepeda' => 5.5,
            'Claudia Maritza Salazar' => 6.4, 
            'Sonia Lorena López' => 8.3, 
            'Carlos Alberto Ávalos' => 7.5, 
            'José Luis Peñate' => 9.6,
            'Luisa Roxana Calderón' => 7.5,
            'Pedro Javier Hidalgo' => 5.8,
            'Morena Lissette Segovia' => 9.2,
            'Ligia Beatriz Hernández' => 5.0,
            'Marcelo José Menjivar' => 6.0,
            'Ileana Carolina Dominguez' => 8.2,
            'Oscar Rodrigo Reyes' => 8.5,
            'Claudia María Ponce' => 6.2
        ),
        "Lenguaje de Programación II" => array(
            'Javier Ernesto Fuentes' => 6.0,
            'Brenda Jocelyn Ponce' => 6.8,
            'Cristina Guadalupe Morales' => 5.3,
            'Ernesto Javier Hurtado' => 7.0,
            'Sonia Lorena López' => 4.3, 
            'Carlos Alberto Ávalos' => 7.5, 
            'José Luis Peñate' => 9.6,
            'Luisa Roxana Calderón' => 7.5,
            'Pedro Javier Hidalgo' => 5.8,
            'Lidia Esmeralda Cienfuegos' => 6.8,
            'Marcelo José Menjivar' => 6.0,
            'Ileana Carolina Dominguez' => 8.2,
            'Oscar Rodrigo Reyes' => 2.8,
            'Claudia María Ponce' => 6.2
        )
    );
    //Creando la página web con cadenas usando 
    //la sintaxis HERE DOC
    echo "<!DOCTYPE html>";
    echo "<html>\n";
    echo "<head>\n";
    echo "\t<title>Uso del foreach para recorrer una matriz</title>\n";
    echo "\t<meta charset=\"utf-8\" />\n";
    echo "\t<link rel=\"stylesheet\" href=\"css/fonts.css\" />\n";
    echo "\t<link rel=\"stylesheet\" href=\"css/notasalumnos.css\" />\n";
    echo "</head>\n";
    echo "<body>\n";
    echo "<header>\n";
    echo "\t<h1>Notas de los estudiantes</h1><hr>\n";
    echo "</header>\n";
    echo "<section>\n";echo "<article>\n";
    foreach($materias as $materia => $notas){
        echo "\t<table>\n";
        echo "\t\t<thead>\n";
        echo "\t\t\t<tr>\n";
        echo "\t\t\t\t<th colspan=\"2\">\n";
        echo "\t\t\t\t\t$materia\n";
        echo "\t\t\t\t</th>\n";
        echo "\t\t\t</tr>\n";
        echo "\t\t\t<tr>\n";
        echo "\t\t\t\t<th>\n";
        echo "\t\t\t\t\tNombre\n";
        echo "\t\t\t\t</th>\n";
        echo "\t\t\t\t<th>\n";
        echo "\t\t\t\t\tNota\n";
        echo "\t\t\t\t</th>\n";
        echo "\t\t\t</tr>\n";
        echo "\t\t</thead>\n";
        echo "\t\t<tbody>\n";
        //Variable contador para determinar 
        //cuántos alumnos en total hay en cada materia
        $totalalumnos = 0;
        $sumanotas = 0;
        foreach($notas as $nombre => $nota){
            echo "\t\t\t<tr>\n";
            echo "\t\t\t\t<td>\n";
            echo "\t\t\t\t\t$nombre\n";
            echo "\t\t\t\t</td>\n";
            echo "\t\t\t\t<td class=\"nota\">\n"; 
            echo "\t\t\t\t\t" . number_format($nota, 1, '.', ',') . "\n";
            //Sumar la nota al acumulador de las notas
            $sumanotas += $nota;
            echo "\t\t\t\t</td>\n";
            echo "\t\t\t</tr>\n";
            //Aumentar el contador de alumnos
            $totalalumnos++;
        }
        //Obtener el Promediodividiendo la suma total
        //de las notas entre el total de notas 
        //en la materia procesada actualmente
        $sumanotas /= $totalalumnos;
        echo "\t\t\t<tr>\n";
        echo "\t\t\t\t<th colspan=\"2\">\n";
        echo "\t\t\t\t\tPromedio: " . number_format($sumanotas,"2",".",",") . "\n";
        echo "\t\t\t\t</th>\n";
        echo "\t\t\t</tr>\n";
        echo "\t\t</tbody>\n";
        echo "\t</table>\n";
    }
    echo "</article>\n";
    echo "</section>\n";
    echo "</body>\n";
    echo "</html>\n";
?>
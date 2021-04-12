<?php
    $alumnos = array(
        "José Alexander Cruz Alvarado" => array(
            'Tarea' => 8.6, 
            'Investigacion' => 4.9, 
            'Examen parcial' => 7.9
        ),
        "René Francisco Guevara Alfaro" => array(
            'Tarea' => 5.5,
            'Investigacion' => 6.4, 
            'Examen parcial' => 8.3
        ),
        "Mario Reynaldo Cerón Rodríguez" => array(
            'Tarea' => 6.0,
            'Investigacion' => 6.8,
            'Examen parcial' => 5.3
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
    foreach($alumnos as $alumnos => $notas){
        echo "\t<table>\n";
        echo "\t\t<thead>\n";
        echo "\t\t\t<tr>\n";
        echo "\t\t\t\t<th colspan=\"3\">\n";
        echo "\t\t\t\t\t$alumnos\n";
        echo "\t\t\t\t</th>\n";
        echo "\t\t\t</tr>\n";
        echo "\t\t\t<tr>\n";
        echo "\t\t\t\t<th>\n";
        echo "\t\t\t\t\tNombre\n";
        echo "\t\t\t\t</th>\n";
        echo "\t\t\t\t<th>\n";
        echo "\t\t\t\t\tNota\n";
        echo "\t\t\t\t</th>\n";
        echo "\t\t\t\t<th>\n";
        echo "\t\t\t\t\tNota con Porcentaje\n";
        echo "\t\t\t\t</th>\n";
        echo "\t\t\t</tr>\n";
        echo "\t\t</thead>\n";
        echo "\t\t<tbody>\n";
        //Variable contador para determinar 
        //cuántos alumnos en total hay en cada materia
        $totalalumnos = 0;
        $sumanotas = 0;
        $contador = 0;
        $notaAux = 1;
        $notaFinal = 0;
        foreach($notas as $nombre => $nota){
            $notaAux = $nota;
            if ($contador == 0) {
                $notaAux *= 0.5;
            }elseif ($contador == 1) {
                $notaAux *= 0.3;
            }elseif ($contador == 2) {
                $notaAux *= 0.2;
            }
            echo "\t\t\t<tr>\n";
            echo "\t\t\t\t<td>\n";
            echo "\t\t\t\t\t$nombre\n";
            echo "\t\t\t\t</td>\n";
            echo "\t\t\t\t<td class=\"nota\">\n"; 
            echo "\t\t\t\t\t" . number_format($nota, 1, '.', ',') . "\n";
            echo "\t\t\t\t</td>\n";
            echo "\t\t\t\t<td class=\"nota\">\n"; 
            echo "\t\t\t\t\t" . number_format($notaAux, 2, '.', ',') . "\n";
            //Sumar la nota al acumulador de las notas
            $sumanotas += $nota;
            $notaFinal += $notaAux;
            echo "\t\t\t\t</td>\n";
            echo "\t\t\t</tr>\n";
            //Aumentar el contador de alumnos
            $totalalumnos++;
            $contador++;
        }
        //Obtener el Promediodividiendo la suma total
        //de las notas entre el total de notas 
        //en la materia procesada actualmente
        $sumanotas /= $totalalumnos;
        echo "\t\t\t<tr>\n";
        echo "\t\t\t\t<th colspan=\"2\">\n";
        echo "\t\t\t\t\tPromedio: " . number_format($sumanotas,"2",".",",") . "\n";
        echo "\t\t\t\t</th>\n";
        echo "\t\t\t\t<th colspan=\"2\">\n";
        echo "\t\t\t\t\tNota Final: " . number_format($notaFinal,"2",".",",") . "\n";
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
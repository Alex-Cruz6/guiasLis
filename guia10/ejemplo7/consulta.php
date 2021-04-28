<?php
    //Creando la instancia del manejador de base de datos
    include_once("class/database.class.php");
    //consulta todos los empleados
    $sql = "SELECT nombre, apellido, correo FROM empleados";
    $res = $con->query($sql);
?>
<table id="datos">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $i = 0;
            //Con método fetch_array()
            /* while($row = $res->fetch_array()){
                echo "<tr>";
                echo "<td>" . ($i+1) . "</td>";
                echo "<td>" . $row['nombre'] . "</td>";
                echo "<td>" . $row['apellido'] . "</td>";
                echo "<td>" . $row['correo'] . "</td>";
                echo "</tr>";
                $i++;
                } */
                //Con método fetch_object()
            while($row = $res->fetch_object()){
                echo "\t<tr>\n";
                echo "\t\t<td>" . ($i+1) . "</td>\n";
                echo "\t\t<td>" . $row->nombre . "</td>\n";
                echo "\t\t<td>" . $row->apellido . "</td>\n";
                echo "\t\t<td>" . $row->correo . "</td>\n";
                echo "\t</tr>\n";
                $i++;
            }
        ?>
    </tbody>
</table>
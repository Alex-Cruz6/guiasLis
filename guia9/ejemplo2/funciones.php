<?php
    function generarCarrito(){
        //Se utilizará una matriz para manejar el carrito
        $carrito = array();   
        //Los artículos y sus cantidades se enviarán con el 
        //método GET, ya sea en la cadena de consulta o a 
        //través de campos ocultos de formulario
        foreach($_GET as $ref => $unidades){
            if(preg_match("/^ref/", $ref))  
            //Expresión regular
            $carrito[$ref]= $unidades;
        }
        return $carrito;
    }
    function mostrarCarrito($carrito){
        //Generación de la cabecera de la tabla
        echo "<table border=\"1\" align=\"center\">\n";
        echo "<tr>\n<th>\nReferencia</th>\n";
        echo "<th>\nUnidades</th>\n</tr>\n";
        //Mostramos el carrito
        $totalUnidades = 0;
        if(empty($carrito)){
            echo "<tr>\n<td align=\"center\" colspan=\"2\">\n";
            echo "El carrito está vacío\n</td>\n</tr>\n";
        }else{
            foreach($carrito as $ref => $unidades){
                echo "<tr>\n<td>\n$ref</td>\n";
                echo "<td align=\"center\">$unidades</td>\n</tr>\n";
                $totalUnidades += $unidades;
            }
        }
        //Cerrar la tabla
        echo "<tr><td align=\"center\" colspan=\"2\">\n";
        echo "Número de unidades: ";
        echo $totalUnidades . "</td>\n</tr>\n";
        echo "</table>\n";
        return true;
    }
    //Método que muestra los artículos disponibles en la tienda
    function estantes($carrito){
        //Generación del query string que contiene las referencias 
        //de los productos y las cantidades a llevar de cada uno
        $querystring = "";
        foreach($carrito as $ref => $unidades){
            $querystring .= "$ref=$unidades&";
        }
        echo 
        <<<TABLA
        <table border="1" align="center">
            <colgroup>
                <col align="center" /><col />
                <col align="center" /><col />
            </colgroup>
            <tr>
                <th>Referencia</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>&nbsp;</th>
            </tr>
            <tr>
                <td>ref1</td>
                <td>Artículo 1</td>
                <td>5 &euro;</td>
                <td><a href="./compra.php?{$querystring}articulo=ref1" title="Añadir al carrito">Comprar</a></td>
            </tr>
            <tr>
                <td>ref2</td>
                <td>Artículo 2</td>
                <td>3 &euro;</td>
                <td><a href="./compra.php?{$querystring}articulo=ref2" title="Añadir al carrito">Comprar</a></td>
            </tr>
            <tr>
                <td>ref3</td>
                <td>Artículo 3</td>
                <td>2 &euro;</td>
                <td><a href="./compra.php?{$querystring}articulo=ref3" title="Añadir al carrito">Comprar</a></td>
            </tr>
        </table> 
        TABLA;
        return true;
    }
?>
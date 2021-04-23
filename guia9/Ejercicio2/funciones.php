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
        $auxTotal = array();
        $precio1 = 0; $precio2 = 0; $precio3 = 0;
        //Generación de la cabecera de la tabla
        echo "<center><div class='container my-5'>";
        echo "<div class='col-md-3'>";
        echo "<table class='table table-success table-striped' border=\"1\" align=\"center\">\n";
        echo "<tr class='table-primary'>\n<th>\nReferencia</th>\n";
        echo "<th>Unidades</th>";
        echo "<th>\nPrecio</th>\n</tr>\n";
        //Mostramos el carrito
        $totalUnidades = 0;
        $preciFinal=0;
        if(empty($carrito)){
            echo "<tr class='table-primary'>\n<td align=\"center\" colspan=\"3\">\n";
            echo "El carrito está vacío\n</td>\n</tr>\n";
        }else{
            foreach($carrito as $ref => $unidades){
                echo "<tr class='table-primary'>\n<td>\n$ref</td>\n";
                echo "<td align=\"center\">$unidades</td>\n";
                if($ref =='ref1'){
                   $auxTotal = $unidades * 5;
                   $precio1 = $auxTotal;
                } elseif ($ref == 'ref2'){
                   $auxTotal = $unidades * 3;
                   $precio2 = $auxTotal;
                }elseif($ref == 'ref3'){
                    $auxTotal = $unidades *2;
                    $precio3 = $auxTotal;
                }
                $preciFinal = $precio1 + $precio2 + $precio3;
                echo "<td align=\"center\">$auxTotal €</td>\n</tr>\n"; 
                $totalUnidades += $unidades;
            }       
        }
        echo "<tr class='table-primary'><td align=\"center\" colspan=\"1\">\n";
        echo "Total: </td>\n";
        echo "<td align=\"center\" colspan=\"1\">\n";
        echo $totalUnidades . "</td>\n";
        echo "<td align=\"center\" colspan=\"1\">\n";
        echo $preciFinal . " €</td>\n";
        echo "</table>\n";
        echo "</div>\n</div>\n</center>";
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
        <center><div class='container my-5'><div class='col-md-3'>
        <table class='table table-success table-striped' border="1" align="center">
            <colgroup>
                <col align="center" /><col />
                <col align="center" /><col />
            </colgroup>
            <tr class='table-primary'>
                <th>Referencia</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
            <tr>
                <td>ref1</td>
                <td>Artículo 1</td>
                <td>5 &euro;</td>
                <td><a class='btn btn-primary' href="./compra.php?{$querystring}articulo=ref1" title="Añadir al carrito">Comprar</a></td>
            </tr>
            <tr>
                <td>ref2</td>
                <td>Artículo 2</td>
                <td>3 &euro;</td>
                <td><a class='btn btn-primary' href="./compra.php?{$querystring}articulo=ref2" title="Añadir al carrito">Comprar</a></td>
            </tr>
            <tr>
                <td>ref3</td>
                <td>Artículo 3</td>
                <td>2 &euro;</td>
                <td><a class='btn btn-primary' href="./compra.php?{$querystring}articulo=ref3" title="Añadir al carrito">Comprar</a></td>
            </tr>
        </table></div></div>
        TABLA;
        return true;
    }
?>
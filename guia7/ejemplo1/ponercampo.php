<?php
    function ponercampo($valor){
        //Si el campo está vacío, se escribe un carácter HTML en blanco
        if($valor == ""){
            $valor = "&nbsp";
        }
        echo "<td>\n" . $valor . "\n</td>\n";
    }
?>
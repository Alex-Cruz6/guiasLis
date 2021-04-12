<?php
    //El texto recibido en $texto es el texto que 
    //se ingresó en la caja de texto del formulario
    function wordcount($texto){
        //Eliminando espacios en blanco entre palabras
        $signos = array(",",".","!","¡","?","¿");
        $palabra = str_replace($signos, ' ',$texto);
        $textoarea = preg_replace("/\s+/u"," ", trim($palabra));
        //Contando las palabras separándolas por el espacio en blanco
        //y almacenándolas en la matriz $palabras haciendo uso de la
        //función preg_split()
        $palabras = preg_split("/\s/u", $textoarea);
        return $palabras;
    }
?>
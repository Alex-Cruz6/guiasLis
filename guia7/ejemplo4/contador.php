<?php
    function AumentarContador(){
        //Comprobar si existe el archivo, si no crearlo
        //y escribir el valor 000000 en este, de lo contrario
        //abrir el archivo para lectura y escritura
        $file = "contador.txt";
        if(!file_exists($file)){
            $entrada = fopen($file, "w+");
            fputs($entrada, "000001");
        }else{
            $entrada = fopen($file, "r+");
        }
        //Nos situamos en la primera línea donde está
        //guardado el numero de visitas y leemos la linea
        /* feof: Comprueba si el puntero a un archivo está al final del archivo. */
        feof($entrada);
        $contador = fgets($entrada, 10);
        //Tomamos todo excepto el salto de línea y retorno 
        //de carro strlen —Obtiene la longitud de una cadena
        if(substr($contador, strlen($contador)-1, 1) == "\n"){
            $aumentar = substr($contador, 0, strlen($contador)-1);
        }else{ 
            //sino tiene salto de linea solo tomamos la misma linea
            $aumentar = substr($contador, 0, strlen($contador));
        }
        //Aumentamos el contador de visitas
        $aumentar++;
        //Esto es para que el número mostrado sea de 6 cifras
        //ya que $aumentar es una variable numerica por lo tanto
        //no guarda los ceros a la izquierda, por eso con el siguiente
        //for le ponemos los ceros que le hagan falta a la cifra
        for($i=strlen($aumentar); $i<6; $i++){
            $aumentar = "0".$aumentar;
        }
        //Movemos el puntero del fichero al inicio del archivo
        rewind($entrada);
        //Guardamos en la primera línea el valor del contador 
        //que se aumentó con la visita
        fputs($entrada, $aumentar . "");
        //Cerramos el archivo porqueno se usará más
        fclose($entrada);
    }
    function LeerContador(){
        //Abrimos el fichero
        $entrada = fopen("contador.txt", "r+");
        //Nos situamos en la primera línea donde está
        //guardado el numero de visitas y leemos la linea
        feof($entrada);
        $contador = fgets($entrada,10);
        //tomamos todo excepto el salto de carro
        if(substr($contador,strlen($contador)-1,1)=="\n") {
            $aumentar = substr($contador, 0, strlen($contador)-1);
        }else{
            //sino tiene salto de linea solo tomamos la misma linea
            $aumentar = substr($contador, 0, strlen($contador));
        }
        //Ahora imprimimos las imagenes de cada digito 
        //que tiene la variable $aumentar, que es
        //la que tiene el contador actual
        for($i=0; $i<strlen($aumentar); $i++){
            //echo substr($aumentar,$i,1);
            echo "<img src='imagenes/" . substr($aumentar,$i,1) . ".png' title='" . substr($aumentar,$i,1) . "'>";
        }
        //Cerramos el archivo porque no lo usaremos más
        fclose($entrada);
    }
?>
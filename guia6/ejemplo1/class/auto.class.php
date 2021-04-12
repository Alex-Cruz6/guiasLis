<?php
    /********************************************************* 
     * Descripción: Ejemplo de definición de una clase auto ** 
     * Autor: Ricardo Ernesto Elías Guandique               ** 
     * Archivo: autopoo.php                                 **
     * *******************************************************/
    //Definición de la clase
    class auto   {
        //Propiedades de la clase auto
        private $marca;
        private $modelo;
        private $color;
        private $image;
        //Método constructor
        function __construct($marca='Honda', $modelo='Civic', $color='Rojo', $image='img/hondacivic.jpg'){
            $this->marca = $marca;
            $this->modelo = $modelo;
            $this->color = $color;
            $this->image = $image;
        }
        //Métodos de la clase
        function mostrar(){
            $tabla  = "<table style=\"width:200;border:ridge 5px rgb(200,50,150)\">\n";
            $tabla .= "<caption>Compra un " . $this->marca . "</caption>";
            $tabla .= "<tr>\n<td style=\"width:35%;\">MARCA</td>\n";
            $tabla .= "<td style=\"width:35%\">" . $this->marca . "</td>\n";
            $tabla  .= "<td  rowspan=\"3\"  style=\"width:35%\"><img  src=\""  .  $this->image . "\"></td></tr>";
            $tabla .= "<tr>\n<td>MODELO</td>\n";
            $tabla .= "<td>" . $this->modelo . "</td>\n</tr>\n";
            $tabla .= "<tr>\n<td>COLOR</td>\n";
            $tabla .= "<td>\n" . $this->color . "</td>\n</tr>\n";
            $tabla .= "</table>\n"; 
            echo $tabla;
        }
    }


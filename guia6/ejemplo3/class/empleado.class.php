<?php
    //Definición de la clase empleado
    class empleado
    {
        //Estableciendo las propiedades de la clase
        private static $idEmpleado = 0;
        private $nombre;
        private $apellido;
        private $isss;
        private $renta;
        private $afp;
        private $sueldoNominal;
        private $sueldoLiquido;
        private $pagoxhoraextra;
        //Declaración de constantes para los descuentos del empleado
        //Se inicializan porque pertenecen a la clase
        const descISSS = 0.03;
        const descRENTA = 0.075;
        const descAFP = 0.0625;
        //Constructor de la clase
        public function __construct()
        {
            self::$idEmpleado++;
            $this->nombre = "";
            $this->apellido = "";
            $this->sueldoLiquido = 0.0;
            $this->pagoxhoraextra = 0.0;
        }
        //Destructor de la clase
        public function __destruct()
        {
            echo "\n<p class=\"msg\">El salario y descuentos del empleado han sido calculados.</p>\n";
            $backlink  = "<a class=\"a-btn\" href=\"sueldoneto.php\">\n";
            $backlink .= "\t<span class=\"a-btn-symbol\">i</span>\n";
            $backlink .="\t<span class=\"a-btn-text\">Calcular salario</span>\n";
            $backlink .= "\t<span class=\"a-btn-slide-text\">a otro empleado</span>\n";
            $backlink .= "\t<span class=\"a-btn-slide-icon\"></span>\n";
            $backlink .= "</a>\n";
            echo $backlink;
        }
        //Métodos de la clase empleado
        public function obtenerSalarioNeto($nombre, $apellido, $salario, $horasextras, $pagoxhoraextra=0.0)
        {
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->pagoxhoraextra = $horasextras * $pagoxhoraextra;
            $this->sueldoNominal = $salario;
            if ($this->pagoxhoraextra > 0) {
                $this->isss = ($salario + $this->pagoxhoraextra) * self::descISSS;
                $this->afp = ($salario + $this->pagoxhoraextra) * self::descAFP;
            } else {
                $this->isss = $salario * self::descISSS;
                $this->afp = $salario * self::descAFP;
            }
            $salariocondescuento = $this->sueldoNominal -($this->isss + $this->afp);
            //echo$salariocondescuento;
            if ($salariocondescuento>2038.10) {
                $this->renta = $salariocondescuento * 0.3;
            } elseif ($salariocondescuento>895.24 && $salariocondescuento<=2038.10) {
                $this->renta = $salariocondescuento * 0.2;
            } elseif ($salariocondescuento>472.00 && $salariocondescuento<=895.24) {
                $this->renta = $salariocondescuento * 0.1;
            } elseif ($salariocondescuento>0 && $salariocondescuento<=472.00) {
                $this->renta = 0.0;
            }/* else {//Significa que el salario obtenido es negativo} */
            $this->sueldoNominal = $salario;
            $this->sueldoLiquido = $this->sueldoNominal + $this->pagoxhoraextra -($this->isss + $this->afp + $this->renta);
            $this->imprimirBoletaPago();
        }
        public function imprimirBoletaPago()
        {
            $tabla  = "<table>\n<tr>\n";
            $tabla .= "<td>Id empleado: </td>\n";
            $tabla .= "<td>" . self::$idEmpleado . "</td>\n</tr>\n";
            $tabla .= "<tr>\n<td>Nombre empleado: </td>\n";
            $tabla .= "<td>" . $this->nombre . " " . $this->apellido . "</td>\n</tr>\n";
            $tabla .= "<tr>\n<td>Salario nominal: </td>\n";
            $tabla  .=  "<td>$  "  .  number_format($this->sueldoNominal, 2, '.', ','). "</td>\n</tr>\n";
            $tabla .= "<tr>\n<td>Salario por horas extras: </td>\n";
            $tabla  .=  "<td>$  "  .  number_format($this->pagoxhoraextra, 2, '.', ',')  . "</td>\n</tr>\n";
            $tabla .= "<tr>\n<td colspan=\"2\">Descuentos</td>\n</tr>\n";
            $tabla .= "<tr>\n<td>Descuento seguro social: </td>\n";
            $tabla   .=   "<td>$   "   .   number_format($this->isss, 2, '.', ',')   . "</td>\n</tr>\n";
            $tabla .= "<tr>\n<td>Descuento AFP: </td>\n";
            $tabla .= "<td>$ " . number_format($this->afp, 2, '.', ',') . "</td>\n</tr>\n";
            $tabla .= "<tr>\n<td>Descuento renta: </td>\n";
            $tabla .= "<td>$ " . number_format($this->renta, 2, '.', ',') . "</td>\n</tr>";
            $tabla .= "<tr>\n<td>Total descuentos: </td>\n";
            $tabla .="<td>$ " . number_format($this->isss + $this->afp + $this->renta, 2, '.', ',') . "</td>\n</tr>\n";
            $tabla .= "<tr>\n<td>Sueldo líquido a pagar: </td>\n";
            $tabla  .=  "<td>  $"  .  number_format($this->sueldoLiquido, 2, '.', ',')  . "</td>\n</tr>\n";
            $tabla .= "</table>\n";
            echo $tabla;
        }
    }

<?php
    class bankAccount {
        //Propiedades de la clase
        private static $numberAccount = 0;
        protected $idcuenta;
        private $owner;
        private $balance = 0.0;
        //Métodos de la clase
        function openAccount($owner, $amount){
            self::$numberAccount++;
            $this->idcuenta = self::$numberAccount;
            $this->owner = $owner;
            $this->balance = $amount;
            $comprobante  = "\n<table>\n";
            $comprobante .= "<tr>\n<td>Número de cuenta: </td>\n";
            $comprobante .= "<td>" . self::$numberAccount . "</td>\n</tr>\n";
            $comprobante .= "<tr>\n<td>Propietario: </td>\n";
            $comprobante .= "<td>" . $this->owner . "</td>\n</tr>\n";
            $comprobante .= "<tr>\n<td>Saldo inicial: </td>\n";
            $comprobante .= "<td>$ " . number_format($this->balance,2,'.',',') . "</td>\n</tr>\n";
            $comprobante .= "</table>";
            echo $comprobante;
        }
        function makeDeposit($amount){
            //Se añade al saldo actual la cantidad ($amount) 
            //recibida como argumento del método
            $this->balance += $amount;
            $comprobante  = "\n<table>\n";
            $comprobante .= "<tr>\n<td>Cantidad depositada: </td>\n";
            $comprobante .= "<td>$ " . number_format($amount,2,'.',',') . "</td>\n</tr>\n";
            $comprobante .= "<tr>\n<td>Nuevo saldo: </td>\n";
            $comprobante .= "<td>$ " . number_format($this->balance,2,'.',',') . "</td>\n</tr>\n";
            $comprobante .= "</table>\n";
            echo $comprobante;
        }
        function makeWithdrawal($amount, $saldo=250){
            //Se resta del saldo actual de la cuenta 
            //la cantidad ($amount) recibida como argumento
            $saldoinicial = $saldo;
            $this->balance = $saldo;
            $this->balance -= $amount;
            if($this->balance > 0) {
                $comprobante  = "\n<table>\n";
                $comprobante .= "\t<tr>\n\t\t<td>Saldo inicial: </td>\n";
                $comprobante .= "\t\t<td>" . number_format($saldoinicial,2,".",",") . "</td>\n\t</tr>\n";
                $comprobante .= "\t\t<td>Cantidad retirada: </td>\n";
                $comprobante .= "\t\t<td>$" . number_format($amount,2,'.',',') . "</td>\t\n</tr>\n";
                $comprobante .= "\t<tr>\n<td>Nuevo saldo: </td>\n";
                $comprobante.= "<td>$ " . number_format($this->balance,2,'.',',') . "</td>\n</tr>\n";
                $comprobante .= "</table>\n";
            }else {
                $comprobante  = "\n<table>\n";
                $comprobante .= "\t<tr>\n\t\t<td>Aviso: </td>\n";
                $comprobante .= "\t\t<td>Su cuenta presenta insuficiendia de fondos.</td>\n\t</tr>\n";
                $comprobante .= "</table>\n";
            }
            echo $comprobante;
        }
        function getBalance(){
            return $this->balance;
        }
    }
?>
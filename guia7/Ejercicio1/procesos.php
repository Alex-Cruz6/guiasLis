<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" />

    <title>Control</title>
</head>
<body>
    <?php
        if(isset($_POST["enviar"])) {
            $nombre = $_POST["nombre"];
            $cantidad = $_POST["cantidad"];
            $operacion = $_POST["opciones"];
            $auxLinea = -1;
            $auxNombre = "";
            $auxCuenta = -1; $auxCantidad = 0;
            if(!$_POST["numCuenta"]){
                $numlinea = 0;
                $archivo = fopen('control.txt','r');
                //recorremos linea por linea
                while ($linea = fgets($archivo)) {
                    $aux[] = $linea;    
                    $numlinea++;
                }
                fclose($archivo);
                //mostramos el array
                for($i = 0; $i <= $numlinea; $i++) {
                    if($i == $numlinea - 1){
                        $a = explode(", ", $aux[$i]);
                        $numCuenta = intval($a[0]) + 1;
                    }
                }
            }else{
                $numCuenta = $_POST["numCuenta"];
            }
            //opcion apertura
            if($operacion == 0){
                $f =   file("control.txt");
                $fi = fopen("control.txt", "w+");
                $info = $numCuenta . ", " . $nombre . " , " . $cantidad. PHP_EOL;
                for ($i = 0; $i < count($f); $i++) {
                    $a = explode(", ", $f[$i]);
                    fwrite($fi, $f[$i]);
                }
                fwrite($fi, $info);
                fclose($fi);
            }
            if($operacion == 1){
                //opcion deposito
                $numlinea = 0;
                $archivo = fopen('control.txt','r');
                //recorremos linea por linea
                while ($linea = fgets($archivo)) {
                    $aux[] = $linea;
                    $numlinea++;
                    $a = explode(", ", $linea);
                    $auxCuenta = intval($a[0]);
                    $auxNombre = $a[1];
                    $auxCantidad = $a[2];
                    if(($auxNombre == $nombre) && ($auxCuenta == $numCuenta)){
                        $auxCantidad = $auxCantidad + intval($cantidad);
                        $info = $auxCuenta . ", " . $auxNombre . " , " . $auxCantidad. PHP_EOL;
                        $aux[$numlinea] = str_replace($linea, $info);
                        $auxLinea = $numlinea;
                    }else{
                        $auxNombre = "";
                        $auxCuenta = -1; $auxCantidad = 0;$auxLinea = -1;
                    }
                }
                fclose($archivo);
            }
            if($operacion == 2){
                //opcion retiro
                $numlinea = 0;
                $archivo = fopen('control.txt','r');
                //recorremos linea por linea
                while ($linea = fgets($archivo)) {
                    $aux[] = $linea;
                    $numlinea++;
                    $a = explode(", ", $linea);
                    $auxCuenta = intval($a[0]);
                    $auxNombre = $a[1];
                    $auxCantidad = $a[2];
                    if(($auxNombre == $nombre) && ($auxCuenta == $numCuenta)){
                        if($cantidad<$auxCantidad){
                            $auxCantidad = $auxCantidad - intval($cantidad);
                            $info = $auxCuenta . ", " . $auxNombre . " , " . $auxCantidad. PHP_EOL;
                            $aux[$numlinea] = str_replace($linea, $info);
                            $auxLinea = $numlinea;
                        }else{
                            echo "No puede retirar más del saldo actual";
                        }
                    }else{
                        $auxNombre = "";
                        $auxCuenta = -1; $auxCantidad = 0;$auxLinea = -1;
                    }
                }
                fclose($archivo);
            }
        }
        
    ?>
    <div class="container my-5">
        <div class="col-md-9">
            <center><h2>Información de la cuenta</h2></center>
            <table class="table table-success table-striped">
                <thead>
                    <tr>
                        <th>Número de cuenta</th>
                        <th>Nombre</th>
                        <th>Saldo Actual</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $operacion = $_POST["opciones"];
                        //opcion apertura
                        if($operacion == 0){
                            $file = fopen('control.txt', 'r');
                            fseek($file, -1, SEEK_END);
                            $pos = ftell($file);
                            while (fgetc($file) === "\n") {
                                fseek($file, $pos--, SEEK_END);
                            }
                            $line = fgetc($file);
                            while ((($c = fgetc($file)) !== "\n") && $pos) {
                                $line = $c . $line;
                                fseek($file, $pos--);
                            }
                            fclose($file);
                            $a = explode(", ", $line);
                            echo "<tr class='table-primary'>";
                            echo "<th>" . $a[0] . "</th>";
                            echo "<th>" . $a[1] . "</th>";
                            echo "<th>" . $a[2] . "</th>";
                            echo "</tr>";
                        }
                        if($operacion == 1){
                            //opcion deposito
                            $numlinea = 0;
                            $si = false;
                            $archivo = fopen('control.txt','r');
                            //recorremos linea por linea
                            while ($linea = fgets($archivo)) {
                                $aux[] = $linea;
                                $numlinea++;
                                $a = explode(", ", $linea);
                                $auxCuenta = intval($a[0]);
                                $auxNombre = $a[1];
                                $auxCantidad = $a[2];  
                                if(($auxNombre == $nombre) && ($auxCuenta == $numCuenta)){
                                    $si = true;
                                    echo "<tr class='table-primary'>";
                                    echo "<th>" . $a[0] . "</th>";
                                    echo "<th>" . $a[1] . "</th>";
                                    echo "<th>" . $a[2] . "</th>";
                                    echo "</tr>";
                                }  
                            }
                            fclose($archivo);
                            //mostramos el array
                            if($si == false){
                                echo "<tr class='table-primary'>No se encontro su cuenta";
                                echo "</tr>";
                            }                  
                        }
                        if($operacion == 2){
                            //opcion retiro
                            $numlinea = 0;
                            $si = false;
                            $archivo = fopen('control.txt','r');
                            //recorremos linea por linea
                            while ($linea = fgets($archivo)) {
                                $aux[] = $linea;
                                $numlinea++;
                                $a = explode(", ", $linea);
                                $auxCuenta = intval($a[0]);
                                $auxNombre = $a[1];
                                $auxCantidad = $a[2];  
                                if(($auxNombre == $nombre) && ($auxCuenta == $numCuenta)){
                                    $si = true;
                                    echo "<tr class='table-primary'>";
                                    echo "<th>" . $a[0] . "</th>";
                                    echo "<th>" . $a[1] . "</th>";
                                    echo "<th>" . $a[2] . "</th>";
                                    echo "</tr>";
                                }  
                            }
                            fclose($archivo);
                            //mostramos el array
                            if($si == false){
                                echo "<tr class='table-primary'>No se encontro su cuenta";
                                echo "</tr>";
                            }        
                        }else{
                            //error
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
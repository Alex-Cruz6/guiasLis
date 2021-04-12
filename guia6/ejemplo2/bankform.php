<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,  initial-scale=1,  maximum-scale=1">
    <title>Cuentas de ahorro</title>
    <link rel="stylesheet" media="screen" href="css/bank.css" />
    <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
    <section>
        <article>
            <form name="operaciones" id="operaciones" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                <fieldset>
                    <legend><span>Operaciones bancarias</span></legend>
                    <ul>
                        <li>
                            <label for="nombre">Nombre:</label>
                            <div class="campo">
                                <input type="text" name="nombre" size="25" maxlength="25" />
                            </div>
                        </li>
                        <li>
                            <label for="cantidad">Cantidad:</label>
                            <div class="campo">
                                <input type="text" name="cantidad" size="8" maxlength="10" />
                            </div>
                        </li>
                        <li>
                            <label for="operacion">Operación</label>
                            <div class="opciones">
                            <input type="radio" name="operacion" value="apertura" checked="checked" />
                                <span>Apertura</span><br />
                                <input type="radio" name="operacion" value="deposito" />
                                <span>Depósito</span><br />
                                <input type="radio" name="operacion" value="retiro" />
                                <span>Retiro</span>
                            </div>
                        </li>
                        <li>
                            <div class="boton">
                                <input type="reset" name="restablecer" value="Cancelar" />
                                <input type="submit" name="enviar" value="Enviar" />
                            </div>
                        </li>
                    </ul>
                </fieldset>
            </form>
            <?php
                spl_autoload_register(function($classname) {
                    include 'class/' . $classname . '.class.php';
                });
                if(isset($_POST['enviar'])){
                    $msg = "";
                    $titular = isset($_POST['nombre']) ? $_POST['nombre'] : "";
                    if($titular == ""){
                        $msg  = "<h3>El nombre de la cuenta no puede estar vacío</h3><br />";
                    }
                    $cantidad  =  isset($_POST['cantidad'])  &&  is_numeric($_POST['cantidad'])  ? $_POST['cantidad'] : 0;
                    if($cantidad == 0 || $cantidad < 0){
                        $msg .= "<h3>La cantidad no puede ser negativa, ni cero.</h3><br />";
                    }
                    if($msg != ""){
                        echo $msg;
                        echo "<a href=\"{$_SERVER['PHP_SELF']}\">Volver al formulario</a><br />";
                        exit(0);
                    }
                    $operacion = isset($_POST['operacion']) ? $_POST['operacion'] : "apertura";
                    $nuevacuenta = new bankAccount();
                    switch($operacion){
                        case "apertura":
                            $nuevacuenta->openAccount($titular, $cantidad);
                        break;
                        case "deposito":
                            $nuevacuenta->makeDeposit($cantidad);
                        break;
                        case "retiro":
                            $nuevacuenta->makeWithdrawal($cantidad);
                        break;
                    }
                }
            ?>
        </article>
    </section>
</body>

</html>
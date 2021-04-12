<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,  initial-scale=1,  maximum-scale=1">
    <title>Datos del empleado</title>
    <link rel="stylesheet" href="css/empleado.css" />
    <link rel="stylesheet" href="css/links.css" />
    <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
    <?php
        function __autoload($class_name) {
            include_once("class/" .$class_name . ".class.php");
        }
        if(isset($_POST['enviar'])){
            if(isset($_POST['enviar'])){
                echo "<h3>Boleta de pago del empleado</h3>";
                $name = (isset($_POST['nombre'])) ? $_POST['nombre'] : "";
                $apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] : "";
                $sueldo = (isset($_POST['sueldo'])) ? doubleval($_POST['sueldo']) : 0.0;
                $numHorasExtras = (isset($_POST['horasextras'])) ? intval($_POST['horasextras']) : 0;
                $pagohoraextra = (isset($_POST['pagohoraextra'])) ? floatval($_POST['pagohoraextra']) : 0.0;
                //Creando instancias de la clase empleado
                $empleado1 = new empleado();
                $empleado1->obtenerSalarioNeto($name, $apellido, $sueldo, $numHorasExtras, $pagohoraextra);
            }
        }else{ 
            ?>
    <header>
        <h2>Ingresar información del empleado</h2>
    </header>
    <section>
        <article>
            <form
                action="<?php echo $_SERVER['PHP_SELF'] ?>"
                method="POST">
                <fieldset>
                    <legend>
                        <span>Formulario empleado</span>
                    </legend>
                    <label for="nombre">Nombre empleado:</label>
                        <input type="text" name="nombre" id="nombre" size="25" maxlength="30" class="inputField" /><br />
                    <label for="apellido">Apellido empleado:</label>
                        <input type="text" name="apellido" id="apellido" size="25" 
                            maxlength="30" class="inputField" /><br />
                        <label for="sueldo">Sueldo empleado ($):</label>
                        <input type="text" name="sueldo" id="sueldo" size="8" maxlength="8"
                            class="inputField" /><br />
                        <label for="horasextras">Número horas extras:</label>
                        <input type="text" name="horasextras" id="horasextras" size="4" maxlength="2"
                            class="inputField" /><br />
                        <label for="pogohoraextra">Pago porhora extra:</label>
                        <input type="text" name="pagohoraextra" id="pagohoraextra" size="4" maxlength="6"
                            class="inputField" /><br />
                        <input type="submit" name="enviar" value="Enviar"
                            class="inputButton" />&nbsp;
                    <input type="reset" name="limpiar" value="Restablecer" class="inputButton" />
                </fieldset>
            </form>
    <?php } ?>
        </article>
    </section>
</body>

</html>
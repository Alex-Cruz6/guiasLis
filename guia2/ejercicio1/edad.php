<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edad exacta</title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Muli" />
    <link rel="stylesheet" href="css/font.css" />
    <link rel="stylesheet" href="css/formstyle.css" />
    <script src="js/prefixfree.min.js"></script>
    <!-- Para las versiones anteriores del IE9 -->
    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    <header>
        <h1>Has vivido un total de: </h1>
    </header>
    <section>
        <article>
            <p class="msg">
                <?php
                // Definimos la zona Horaria
                    date_default_timezone_set("America/El_Salvador");
                    if(isset($_POST['submit']) && $_POST['submit'] == "Enviar"):
                        extract($_POST);
                        $FechaActual =date("d-m-Y");
                        $d=mktime(0, 0, 0, $mes, $dia, $year);
                        $FechaNacimiento = date("d-m-Y ", $d);
                        $mostrar = calcularEdad($FechaNacimiento,$FechaActual);
                    endif;
                    // Mostramos el total de días
                    echo $mostrar[0]." Años ". $mostrar[1]." Meses ". $mostrar[2]." Días";
                    echo " y un total de: ". $mostrar[11]." días";
                    // Calcula el tiempo entre fechas
                    function calcularEdad($fechaIinicio, $fechaFin){
                        $tiempo1 = date_create($fechaIinicio);
                        $tiempo2 = date_create($fechaFin);
                        $intervalo = date_diff($tiempo1, $tiempo2);
                        $tiempo= array();
                        foreach($intervalo as $valor){
                            $tiempo[]=$valor;
                        }
                        return $tiempo;
                    }
                ?>
            </p>
        <article>
    </section>
</body>
</html>
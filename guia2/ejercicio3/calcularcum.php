<!DOCTYPE html>
<html lang="es">

<head>
    <title>Contador de palabras</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Muli" />
    <link rel="stylesheet" href="css/font.css" />
    <link rel="stylesheet" href="css/formstyle.css" />
    <script src="js/prefixfree.min.js"></script>
    <!--Para las versiones anteriores del IE9 -->
    <!--[if lt IE 9]><script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>

<body>
    <?php 
        $nota1  =  isset($_POST['nota1'])  ? $_POST['nota1'] : 0;
        $nota2  =  isset($_POST['nota2'])  ? $_POST['nota2'] : 0;
        $nota3  =  isset($_POST['nota3'])  ? $_POST['nota3'] : 0;
        $nota4  =  isset($_POST['nota4'])  ? $_POST['nota4'] : 0;
        $nota5  =  isset($_POST['nota5'])  ? $_POST['nota5'] : 0; 

        $cum = ($nota1+$nota2+$nota3+$nota4+$nota5)/5;  
    ?>
    <header>
        <h1>
            El CUM del estudiante es de <?php echo $cum ?>             
        </h1>
    </header>
    <section>
        <article>
            <p class="msg">
                <?php 
                if($cum >= 7.5){
                    echo "Usted puede cursar un máximmo de 32 unidades valorativas";
                }elseif($cum >= 7 && $cum < 7.5){
                    echo "Usted puede cursar un máximmo de 24 unidades valorativas";
                }elseif($cum >= 6 && $cum < 7){
                    echo "Usted puede cursar un máximmo de 20 unidades valorativas";
                }elseif($cum < 6){
                    echo "Usted puede cursar un máximmo de 16 unidades valorativas";
                }
                ?>                
            </p>
            <p class="msg" style="text-align: center;"><a href="Notas.html" id="count">Regresar</a></p>     
        <article>
    </section>
</body>

</html>
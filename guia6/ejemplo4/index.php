<?php 
    $nombre = isset($_GET['usuario']) ? $_GET['usuario'] : null; if (!isset($nombre)) {
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Index de login</title>
    <link rel="stylesheet" href="css/style.css">
    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>

<body>
    <header>
        <h1>Página Principal</h1>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
        </ul>
    </nav>
    <section id="intro">
        <header>
            <h2>Bienvenido <?php echo $nombre; ?> al panel de control</h2>
        </header>
        <section>
            <header>
                <h3>Tareas</h3>
            </header>
        </section>
    </section>
    <aside></aside>
    <footer>
        <p>Sistema de login</p>
    </footer>
</body>

</html>
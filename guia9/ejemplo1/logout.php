<?php
    session_start();
    unset($_SESSION['user']);
    unset($_SESSION['pass']);
    session_destroy();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Fin de la sesión</title>
    </head>
    <body>
        <header>
            <h1>Has salido del sistema</h1>
        </header>
        <section>
            <article>
                <p>Para reingresar haz clic en <a href="autenticacionbasica.php">este enlace</a>.</p>
            </article>
        </section>
    </body>
</html>
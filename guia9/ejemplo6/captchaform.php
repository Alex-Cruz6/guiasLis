<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Probar que eres humano</title>
    </head>
    <body>
        <section>
            <article>
                <?php
                    if(!empty($_POST['enviar'])){
                        session_start();
                        if($_SESSION['captcha'] == $_POST['text']):
                            echo "El texto ingresado es correcto";
                            exit();
                        else:
                            echo "El texto ingresado es incorrecto";
                        endif;
                    }
                ?>
                <form action=<?php echo $_SERVER['PHP_SELF'] ?> method="POST">
                    <img src="captcha.php" alt="Palabra secreta" title="Palabra secreta" /><br />
                    <input type="text" name="text" maxlength="20" required="required" /><br />
                    <input type="submit" name="enviar" value="Ingresar palabra secreta" />
                </form>
            </article>
        </section>
    </body>
</html>
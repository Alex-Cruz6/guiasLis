<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Registro de empleados</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400" />
        <link rel="stylesheet" href="css/styles.css" />
        <link rel="stylesheet" href="css/material-style.css">
    </head>
    <body>
        <header>
            <h1>Nuevo empleado</h1>
        </header>
        <section>
            <article>
                <div class="form-box">
                    <div class="head">Ingreso de datos</div>
                    <form name="nuevo_empleado" action="" id="login-form">
                        <div class="form-group">
                            <label for="nombre" class="label-control">
                                <span class="label-text">Nombre:</span>
                            </label>
                            <input type="text" name="nombre" id="nombre" maxlength="25" accesskey="n" tabindex="1" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="apellido" class="label-control">
                                <span class="label-text">Apellido</span>
                            </label>
                            <input type="text" name="apellido" id="apellido" maxlength="25" accesskey="a" tabindex="2" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="correo" class="label-control">
                                <span class="label-text">Correo</span>
                            </label>
                            <input type="text" name="correo" id="correo" maxlength="25" accesskey="c" tabindex="3" class="form-control" />
                        </div>
                        <input type="submit" name="guardar" id="guardar" value="Guardar" accesskey="g" tabindex="4" class="btn" />
                    </form>
                </div>
            </article>
        </section>
        <div id="resultado">
            <?php 
                include('consulta.php');
            ?>
        </div> 
    </body>
    <script type="text/javascript" src="js/ajax.js"></script>
    <script type="text/javascript" src="js/validateform.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script>
        $(window).load(function(){
            $('.form-group input').on('focus blur', function (e) {
                $(this).parents('.form-group').toggleClass('active', (e.type === 'focus' || this.value.length > 0));
            }).trigger('blur');
        });
    </script>
</html>
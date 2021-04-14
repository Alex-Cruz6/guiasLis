<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Eliminar usuario con PDO</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-offset-2 col-md-8">
                            <center><h1>¿Deseas Eiminar este usuario?</h1></center>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <form action="delete.php" method="POST">
                        <table class="table table-bordered" >
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Apellido</th>
                                    <th class="text-center">Edad</th>
                                    <th class="text-center">Género</th>
                                    <th class="text-center">Ciudad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if (!empty($_GET)) {
                                        //echo $_GET['id'];
                                        include 'connection.php';
                                        $cn =  Database::connect();
                                        $cn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                                        $query = $cn->prepare("SELECT * FROM usuario where idusuario = ?");
                                        $query->execute(array($_GET['id']));
                                        $data = $query->fetch(PDO::FETCH_ASSOC);
                                        $user = $data["idusuario"];
                                        echo '<tr>
                                        <td class="text-center">'.$data["idusuario"].'</td>
                                        <td class="text-center">'.$data["nombre"].'</td>
                                        <td class="text-center">'.$data["apellido"].'</td>
                                        <td class="text-center">'.$data["edad"].'</td>
                                        <td class="text-center">'.$data["genero"].'</td>
                                        <td class="text-center">'.$data["ciudad"].'</td>
                                        </tr>';
                                        echo "<input type='hidden' name='idUser' id='idUser' value='$user'>";
                                        Database::disconnect();
                                    }else{
                                        echo "nada ha venido";
                                    }
                                ?>
                            </tbody>
                        </table>
                        <div>
                            <input type="submit" name="eliminar" class="btn btn-danger" value="Eliminar">
                            <a href="index.php" class="btn btn-success">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
<?php 
    if (isset($_POST['eliminar'])) {
        include 'connection.php';
        $id = trim($_POST['idUser']);
        $cnu = Database::connect();
        $cnu->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $cnu->prepare("DELETE FROM usuario WHERE idusuario = ?");
        $query->execute(array($id));
        Database::disconnect();
        header("Location: index.php");
    }
?>
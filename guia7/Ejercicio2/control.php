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
        date_default_timezone_set('America/El_Salvador');
        $dia = date("Y-m-d");
        $hora = date("H:i:s");
        $f =   file("control.txt");
        $fi = fopen("control.txt", "w+");
        $info = $_SERVER['REMOTE_ADDR'] . ", " . $dia . " , " . $hora ." , ". $_SERVER["SCRIPT_NAME"]. PHP_EOL;
        for ($i = 0; $i < count($f); $i++) {
            $a = explode(", ", $f[$i]);
            fwrite($fi, $f[$i]);
        }
        fwrite($fi, $info);
        fclose($fi);
    ?>
    <div class="container my-5">
        <div class="col-md-9">
            <table class="table table-success table-striped">
                <thead>
                    <tr>
                        <th>IP</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Script</th>
                    </tr>
                </thead> 
                <tbody>
                    <?php
                        $file = file("control.txt");
                        for ($i = 0; $i < count($file); $i++) {
                            $a = explode(", ", $file[$i]);
                            echo "<tr class='table-primary'>";
                            echo "<th>" . $a[0] . "</th>";
                            echo "<th>" . $a[1] . "</th>";
                            echo "<th>" . $a[2] . "</th>";
                            echo "<th>" . $a[3] . "</th>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
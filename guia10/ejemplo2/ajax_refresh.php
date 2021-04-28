<?php
    function connect() {
        return  new  PDO('mysql:host=localhost;dbname=autocompletedb;charset=utf8',  'root',  '', 
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }
    $pdo = connect();
    $keyword = '%' . trim($_POST['keyword']) . '%';
    $sql = "SELECT * FROM country WHERE country_name LIKE (:keyword) ORDER BY country_id ASC LIMIT 0, 10";
    $query = $pdo->prepare($sql);
    $query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
    $query->execute();
    $list = $query->fetchAll();
    foreach ($list as $rs) {
        //Colocar en negrita el texto escrito
        $country_name = str_replace(trim($_POST['keyword']), '<b>' . $_POST['keyword'] . '</b>', $rs['country_name']);
        //Mostrar nueva opción
        echo '<li onclick="set_item(\'' . str_replace("'", "\'", $rs['country_name']) . '\')">' . $country_name . '</li>';
    }
?>
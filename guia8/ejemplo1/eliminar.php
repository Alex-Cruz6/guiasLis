<?php
    //Incluir librería de conexión a la base de datos
    include_once("db-mysqli.php");
    $isbn = $_GET['id'];
    $sql = "SELECT * FROM libros WHERE isbn = '" . $isbn . "'";
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
    $msg = "<script>\n";
    $preg = "Deseas eliminar el libro de: isbn = ";
    $preg .= "isbn = " . $row['isbn'] . ",";
    $preg .= "autor = " . $row['autor'] . ",";
    $preg .= "titulo = " . $row['titulo'] . ",";
    $preg .= "precio = " . $row['precio'] . ".";
    $msg .= "if(confirm(\"" . $preg . "\")){";
    $msg .= "location.href=\"mostrarlibros.php?opc=eliminar&del=s&id=" . $isbn . "\";}";
    $msg .= "else{location.href=\"mostrarlibros.php?opc=eliminar&del=n\";}</script>";
    echo utf8_decode($msg);
?>
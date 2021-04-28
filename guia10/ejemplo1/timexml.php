<?php
    header('Content-Type: text/xml');
    date_default_timezone_set('America/El_Salvador');
    echo "<?xml version=\"1.0\" ?><clock1><timenow>" . date('h:i:s a') 
    /* date('H:i:s') */ . "</timenow></clock1>";
?>
<?php

    define('DB_SERVER', 'mysql:host=kunet;dbname=db_k1818793');
    define('DB_USERNAME', 'k1818793');
    define('DB_PASSWORD', 'N8gQtrfhxBkJ2LA');
    
    $pdoOptions = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );    


    $pdo = new PDO(DB_SERVER, DB_USERNAME, DB_PASSWORD, $pdoOptions);

?>
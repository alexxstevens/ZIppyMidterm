<?php
     $dsn = 'mysql:host=localhost;dbname=zippyusedautos';
     $username = 'root';
     $password = 'MesA683103!';


    try {
        $db = new PDO($dsn, $username, $password);
        //$db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>


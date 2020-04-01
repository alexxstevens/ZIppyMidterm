
<?php 
include 'header.php';
session_destroy();
header("Location: ../controller/index.php");
?>
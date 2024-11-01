<?php 

# Database configuration
$host = "localhost";
$user = "root";
$password = "";
$dbname = "midterm";
$dsn = "mysql:host={$host};dbname={$dbname}";

# Declaring variable for PDO to connect database
$pdo = new PDO($dsn, $user, $password);
$pdo->exec("SET time_zone = '+08:00';");

?>
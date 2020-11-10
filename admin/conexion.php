<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "gamershop";

try {
    $conexion = new PDO("mysql:host=$host; dbname=$dbname", $user, $pass);
}
catch (PDOException $e) {
    echo "Error: " + $e -> getMessage();
}
?>
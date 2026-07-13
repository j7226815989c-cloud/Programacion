<?php

$host = "localhost";
$dbname = "proyectojaz_db";
$user = "jaz_db";
$pass = "12345678";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if(!$conn){
    die("Error de conexión: " . mysqli_connect_error());
}

?>

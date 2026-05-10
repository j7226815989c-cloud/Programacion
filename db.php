<?php

$host = "localhost";
$port = "5432";
$dbname = "jgarcia3_db";
$user = "jgarcia";
$pass = "12345";

$conn = pg_connect(
    "host=$host port=$port dbname=$dbname user=$user password=$pass"
);

if(!$conn){
    die("Error de conexión");
}

?>

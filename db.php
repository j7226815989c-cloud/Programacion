<?php

$host = "localhost";
$port = "5432";
$dbname = "proyectojaz_db";
$user = "jaz_db";
$pass = "12345678";

$conn = pg_connect(
    "host=$host port=$port dbname=$dbname user=$user password=$pass"
);

if(!$conn){
    die("Error de conexión a PostgreSQL");
}

?>

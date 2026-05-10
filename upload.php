<?php
include "db.php";

if(isset($_FILES['imagen'])){

    $nombre = $_FILES['imagen']['name'];
    $tmp = $_FILES['imagen']['tmp_name'];

    $ruta = "uploads/" . time() . "_" . $nombre;

    move_uploaded_file($tmp, $ruta);

    $conn->query("INSERT INTO imagenes (ruta) VALUES ('$ruta')");
}

header("Location: index.php");
?>
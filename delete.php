<?php
include "db.php";

$id = $_POST['id'];

// Opcional: borrar archivo físico
$result = $conn->query("SELECT ruta FROM imagenes WHERE id=$id");
$row = $result->fetch_assoc();

if($row){
    if(file_exists($row['ruta'])){
        unlink($row['ruta']);
    }
}

$conn->query("DELETE FROM imagenes WHERE id=$id");

header("Location: index.php");
?>
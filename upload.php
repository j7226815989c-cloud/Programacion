<?php
include "db.php";

if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0){

    $nombre = time() . "_" . $_FILES['imagen']['name'];
    $ruta = "uploads/" . $nombre;

    if(!is_dir("uploads")){
        mkdir("uploads", 0777, true);
    }

    if(move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta)){

        pg_query_params($conn,
            "INSERT INTO imagenes(ruta) VALUES($1)",
            array($ruta)
        );
    }
}

header("Location: index.php");
?>

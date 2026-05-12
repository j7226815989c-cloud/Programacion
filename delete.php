<?php
include "db.php";

if(isset($_POST['id'])){

    $id = $_POST['id'];

    $res = pg_query_params($conn,
        "SELECT ruta FROM imagenes WHERE id = $1",
        array($id)
    );

    $row = pg_fetch_assoc($res);

    if($row){

        pg_query_params($conn,
            "DELETE FROM imagenes WHERE id = $1",
            array($id)
        );

        if(file_exists($row['ruta'])){
            unlink($row['ruta']);
        }
    }
}

header("Location: index.php");
?>

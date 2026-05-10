<?php
include "db.php";

if(isset($_POST['id'])){

    $id = $_POST['id'];

    // obtener ruta
    $res = pg_query_params(
        $conn,
        "SELECT ruta FROM imagenes WHERE id = $1",
        array($id)
    );

    $data = pg_fetch_assoc($res);

    if($data){
        $ruta = $data['ruta'];

        if(file_exists($ruta)){
            unlink($ruta);
        }

        // eliminar registro
        pg_query_params(
            $conn,
            "DELETE FROM imagenes WHERE id = $1",
            array($id)
        );
    }

    header("Location: index.php");
    exit();
}
?>

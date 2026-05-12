<?php
include "db.php";

if (isset($_POST['id']) && $_POST['id'] !== '') {

    $id = (int) $_POST['id']; // fuerza entero (evita "")

    $res = pg_query_params(
        $conn,
        "SELECT ruta FROM imagenes WHERE id = $1",
        array($id)
    );

    if ($res && pg_num_rows($res) > 0) {

        $row = pg_fetch_assoc($res);

        // borrar de BD
        pg_query_params(
            $conn,
            "DELETE FROM imagenes WHERE id = $1",
            array($id)
        );

        // borrar archivo si existe
        if (!empty($row['ruta']) && file_exists($row['ruta'])) {
            unlink($row['ruta']);
        }
    }
}

header("Location: index.php");
exit();
?>

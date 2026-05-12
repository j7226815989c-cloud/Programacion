<?php
include "db.php";

$index = isset($_GET['index']) ? intval($_GET['index']) : 0;

// Traer todas las imágenes
$result = pg_query($conn, "SELECT id, ruta FROM imagenes ORDER BY id ASC");

$imagenes = [];

// Construir ruta base del servidor
$basePath = __DIR__ . "/";

while ($row = pg_fetch_assoc($result)) {

    // Ruta física del archivo
    $rutaFisica = $basePath . $row['ruta'];

    // SOLO agregar si el archivo existe realmente
    if (file_exists($rutaFisica)) {
        $imagenes[] = $row;
    } else {
        // opcional: limpiar basura en BD (descomenta si quieres)
        // pg_query($conn, "DELETE FROM imagenes WHERE id = " . intval($row['id']));
    }
}

// Responder según resultados
if (count($imagenes) > 0) {

    $index = $index % count($imagenes);

    header('Content-Type: application/json');
    echo json_encode($imagenes[$index]);

} else {

    header('Content-Type: application/json');
    echo json_encode(null);
}
?>

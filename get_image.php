<?php
include "db.php";

$index = isset($_GET['index']) ? intval($_GET['index']) : 0;

$result = $conn->query("SELECT id, ruta FROM imagenes");

$imgs = [];

while ($row = $result->fetch_assoc()) {
    $imgs[] = $row;
}

$total = count($imgs);

if ($total > 0) {

    $index = $index % $total;
    if ($index < 0) $index = $total - 1;

    echo json_encode($imgs[$index]);

} else {
    echo json_encode(null);
}
?>
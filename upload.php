<?php
include "db.php";

if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0){

    $nombre = time() . "_" . $_FILES['imagen']['name']; // evitar duplicados
    $ruta = "uploads/" . $nombre;

    // Crear carpeta si no existe
    if(!is_dir("uploads")){
        mkdir("uploads", 0777, true);
    }

    if(move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta)){

        $stmt = $conn->prepare("INSERT INTO imagenes (nombre, ruta) VALUES (?, ?)");
        $stmt->bind_param("ss", $nombre, $ruta);

        if($stmt->execute()){
            header("Location: galeria.php");
            exit;
        } else {
            echo "Error al guardar en BD";
        }

        $stmt->close();
    } else {
        echo "Error al subir archivo";
    }
}
?>
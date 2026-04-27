<?php
include "db.php";

if(isset($_POST['id'])){

    $id = $_POST['id'];

    $stmt = $conn->prepare("SELECT ruta FROM imagenes WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result();
    $data = $res->fetch_assoc();

    if($data){
        $ruta = $data['ruta'];

        if(file_exists($ruta)){
            unlink($ruta);
        }

        $stmt = $conn->prepare("DELETE FROM imagenes WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

    header("Location: index.php");
    exit;
}
?>
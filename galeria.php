<?php
session_start();
include "db.php";

$result = pg_query($conn, "SELECT id, ruta FROM imagenes");

$imgs = [];
$ids = [];

while ($row = pg_fetch_assoc($result)) {
    $imgs[] = $row['ruta'];
    $ids[] = $row['id'];
}
?>
<!DOCTYPE html>
<html>
<body style="text-align:center;background:#111;color:#fff;">

<h2>Galería</h2>

<button onclick="prev()">⬅</button>
<button onclick="next()">➡</button><br><br>

<img id="img" width="400"><br><br>

<!-- BOTÓN BORRAR (dentro de galería) -->
<form action="delete.php" method="POST" onsubmit="return confirm('¿Eliminar imagen?');">
    <input type="hidden" name="id" id="img_id">
    <button style="background:red;color:white;">Eliminar imagen</button>
</form>

<br>

<form action="upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="imagen" required>
    <button>Subir</button>
</form>

<script>
let imgs = <?php echo json_encode($imgs); ?>;
let ids = <?php echo json_encode($ids); ?>;

let i = 0;

function show(){
    if(imgs.length > 0){
        document.getElementById("img").src = imgs[i];
        document.getElementById("img_id").value = ids[i];
    } else {
        document.getElementById("img").src = "";
    }
}

function next(){
    i = (i + 1) % imgs.length;
    show();
}

function prev(){
    i = (i - 1 + imgs.length) % imgs.length;
    show();
}

show();
</script>

</body>
</html>

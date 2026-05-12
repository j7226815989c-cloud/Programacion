<?php
session_start();
include "db.php";

if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Carrusel PostgreSQL AJAX</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    margin:0;
    display:flex;
    font-family:Arial;
}

/* SIDEBAR */
.sidebar{
    width:220px;
    background:#f5f5f5;
    height:100vh;
    padding:15px;
}

.sidebar h2{
    color:#0d6efd;
}

.sidebar a{
    display:block;
    padding:10px;
    margin:5px 0;
    text-decoration:none;
    color:#333;
    border-radius:5px;
}

.sidebar a:hover{
    background:#ddd;
}

.active{
    background:#cfd8e3;
}

/* CONTENIDO */
.content{
    flex:1;
    padding:20px;
    text-align:center;
    background:#111;
    color:white;
}

.carousel-item{
    text-align:center;
}
</style>

</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>Menú</h2>
    <hr>

    <a href="index.php" class="active">Carrusel</a>
    <a href="diseño_ajustable.html">Diseño ajustable</a>
    <a href="listas.html">Listas</a>
    <a href="contenido.html">Contenido</a>
    <a href="links.html">Links</a>
    <a href="modelcaja.html">Modelo de Caja</a>
    <a href="#">JavaScript</a>
    <a href="#">Slider</a>
    <a href="#">Perfil</a>

    <br><br>
    <a href="logout.php" style="color:red;">Cerrar sesión</a>
</div>

<!-- CONTENIDO -->
<div class="content">

<h2>Bienvenido <?php echo $_SESSION['nombre']; ?></h2>
<h3>Carrusel PostgreSQL AJAX</h3>

<br>

<!-- CARRUSEL AJAX -->
<div id="carouselExample" class="carousel slide" style="max-width:600px; margin:auto;">

  <div class="carousel-inner">

    <div class="carousel-item active">
      <div class="d-flex flex-column align-items-center">

        <img id="img"
             class="img-fluid rounded"
             style="max-height:400px; object-fit:contain;">

        <form action="delete.php" method="POST"
              onsubmit="return confirm('¿Eliminar esta imagen?');"
              class="mt-3">

            <input type="hidden" name="id" id="img_id">
            <button class="btn btn-danger">🗑 Eliminar</button>
        </form>

      </div>
    </div>

  </div>

  <!-- BOTONES -->
  <button class="carousel-control-prev" type="button" onclick="prev()">
    <span class="carousel-control-prev-icon"></span>
  </button>

  <button class="carousel-control-next" type="button" onclick="next()">
    <span class="carousel-control-next-icon"></span>
  </button>

</div>

<br><br>

<!-- SUBIR IMAGEN -->
<form action="upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="imagen" required>
    <button class="btn btn-success">Subir imagen</button>
</form>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- AJAX POSTGRES -->
<script>
let i = 0;

function cargarImagen(){

    fetch("get_image.php?index=" + i)
    .then(res => res.json())
    .then(data => {

        if(!data || !data.ruta){
            console.log("Imagen inválida");
            return;
        }

        document.getElementById("img").src = data.ruta;
        document.getElementById("img_id").value = data.id;
    });
}
function next(){
    i++;
    cargarImagen();
}

function prev(){
    if(i > 0) i--;
    cargarImagen();
}

// cargar primera imagen
cargarImagen();
</script>

</body>
</html>

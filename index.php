<?php
session_start();
include "db.php";

if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit();
}

$result = pg_query($conn, "SELECT id, ruta FROM imagenes");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Carrusel</title>

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

<!-- MENÚ -->
<div class="sidebar">
    <h2>Menú</h2>
    <hr>

    <a href="index.php" class="active">Carrusel</a>
    <a href="diseño_ajustable.html" class="active">Diseño ajustable</a>
    <a href="listas.html" class="active">Listas</a>
    <a href="contenido.html" class="active">Contenido</a>
    <a href="links.html" class="active">Links</a>
    <a href="modelcaja.html" class="active">Modelo de Caja</a>
    <a href="#">JavaScript</a>
    <a href="#">Slider</a>
    <a href="#">Perfil</a>

    <br><br>
    <a href="logout.php" style="color:red;">Cerrar sesión</a>
</div>

<!-- CONTENIDO -->
<div class="content">

<h2>Bienvenido <?php echo $_SESSION['nombre']; ?></h2>
<h3>Carrusel</h3>

<br>

<div id="carouselExample" class="carousel slide" style="max-width:600px; margin:auto;">
  <div class="carousel-inner">

<?php
$active = true;

while($row = pg_fetch_assoc($result)){
    echo '<div class="carousel-item '.($active ? 'active' : '').'">';

    echo '
    <div class="d-flex flex-column align-items-center">

        <img src="'.$row['ruta'].'"
             class="img-fluid rounded"
             style="max-height:400px; object-fit:contain;">

        <form action="delete.php" method="POST"
              onsubmit="return confirm(\'¿Eliminar esta imagen?\');"
              class="mt-3">

            <input type="hidden" name="id" value="'.$row['id'].'">
            <button class="btn btn-danger">🗑️ Eliminar</button>
        </form>

    </div>
    ';

    echo '</div>';
    $active = false;
}
?>

  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>

  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<br><br>

<!-- SUBIR -->
<form action="upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="imagen" required>
    <button class="btn btn-success">Subir imagen</button>
</form>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

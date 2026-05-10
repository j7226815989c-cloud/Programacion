<?php
include "db.php";

if(isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['password'])){

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $result = pg_query_params(
        $conn,
        "INSERT INTO usuarios (nombre, email, password) VALUES ($1, $2, $3)",
        array($nombre, $email, $password)
    );

    if($result){
        header("Location: login.php");
        exit();
    } else {
        die(pg_last_error($conn));
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Registro</title>

<style>
body{
    margin:0;
    font-family:Arial;
    background:linear-gradient(135deg,#0f172a,#9333ea);
    color:white;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

.glass{
    background:rgba(255,255,255,0.1);
    padding:30px;
    border-radius:15px;
    width:320px;
    backdrop-filter: blur(10px);
}

input{
    width:100%;
    padding:10px;
    margin:8px 0;
    border:none;
    border-radius:8px;
}

.btn-main{
    background:#3b82f6;
    color:white;
    border:none;
    padding:10px;
    width:100%;
    border-radius:8px;
    cursor:pointer;
}

.btn-main:hover{
    background:#2563eb;
}

a{
    color:white;
    text-decoration:none;
}
</style>

</head>

<body>

<div class="glass">

    <h2 style="text-align:center;">Crear cuenta</h2>

    <?php if(isset($error)){ ?>
        <p style="color:#ff6b6b;"><?php echo $error; ?></p>
    <?php } ?>

    <form method="POST">

        <input type="text" name="nombre" placeholder="Nombre" required>

        <input type="email" name="email" placeholder="Correo" required>

        <input type="password" name="password" placeholder="Contraseña" required>

        <button class="btn-main">Registrarse</button>

    </form>

    <br>

    <a href="login.php">Volver al login</a>

</div>

</body>
</html>

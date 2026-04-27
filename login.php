<?php
session_start();
include "db.php";

if(isset($_POST['email']) && isset($_POST['password'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($user = $result->fetch_assoc()){
        if(password_verify($password, $user['password'])){
            $_SESSION['id'] = $user['id'];
            $_SESSION['nombre'] = $user['nombre'];
            header("Location: index.php");
            exit;
        } else {
            $error = "Contraseña incorrecta";
        }
    } else {
        $error = "Usuario no encontrado";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>

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

    <h2 style="text-align:center;">Iniciar sesión</h2>

    <?php if(isset($error)){ ?>
        <p style="color:#ff6b6b;"><?php echo $error; ?></p>
    <?php } ?>

    <form method="POST">

        <input type="email" name="email" placeholder="Correo" required>

        <input type="password" name="password" placeholder="Contraseña" required>

        <button class="btn-main">Entrar</button>

    </form>

    <br>

    <a href="registro.php">Crear cuenta</a>

</div>

</body>
</html>
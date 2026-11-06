<?php
    // Inicia la sesión para poder usar los datos guardados en el registro
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Conecto mi archivo de estilos -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
   // Título de la página de inicio de sesión
   echo "<h2>Inicio de sesion</h2>";
?>

    <!-- Formulario para entrar al sistema -->
    <form method="POST">
        <!-- Imagen del login -->
        <img src="img/login.png" width="100">
    <br>
    <!-- Campo para escribir el usuario -->
    Usuario: <input type="text" name="usuario"><br><br>
    <!-- Campo para escribir la contraseña, no se ve lo que escribes -->
    Contraseña: <input type="password" name="pass"><br><br>
    <!-- Botón para enviar el formulario -->
    <input type="submit" name="entrar" value="Entrar">
    </br>
</form>
<br>
<!-- Enlace para ir a la página de registro si no tienes cuenta -->
<a href="registro.php">Registro</a>

<?php
// Si el usuario presionó el botón "Entrar"
if(isset($_POST['entrar'])){
    // Guardo lo que escribió en usuario y contraseña
    $us = $_POST['usuario'];
    $p1 = $_POST['pass'];

    // Traigo de la sesión el hash y el usuario que se guardaron en el registro
    $r = $_SESSION['hash'];
    $g = $_SESSION['usuario'];

    // Reviso si el usuario que escribió existe
    if($us == $g){
        // Aquí verifico si la contraseña es la correcta usando el hash
        if(password_verify($p1, $r)){
            echo "<br>La contraseña es valida";
            echo "<br>Bienvenido al sistema";
        }else{
            echo "<br>La contraseña es invalida";
            echo "<br>Contraseña incorrecta";
        }
    }else{
        // Si el usuario no coincide con el registrado
        echo "Usuario inexistente";
    }
}
?>
</body>
</html>
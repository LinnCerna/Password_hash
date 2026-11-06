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
    // Título de la página de registro
    echo "<h2>Registro de usuarios</h2>";
?>

<!-- Formulario para registrar un usuario nuevo -->
<form method="POST">
    <!-- Imagen del registro -->
    <img src="img/registro.png" width="100">
    <!-- Campo para el nombre -->
    Nombre: <input type="text" name="nombre"><br><br>
    <!-- Campo para el usuario -->
    Usuario: <input type="text" name="usuario"><br><br>
    <!-- Campo para la contraseña -->
    Contraseña: <input type="password" name="pass"><br><br>
    <!-- Campo para confirmar la contraseña -->
    Confirmar: <input type="password" name="pass2"><br><br>
    <!-- Botón para registrar -->
    <input type="submit" name="registrar" value="Registrar">
</form>
<br>
<!-- Enlace para regresar al login -->
<a href="login.php">Login</a>

<?php
$dm = ""; // Variable para guardar el mensaje que le muestro al usuario

// Si el usuario presionó el botón "Registrar"
if(isset($_POST['registrar'])){
    // Guardo lo que escribió en cada campo
    $nom = $_POST['nombre']; // nombre
    $us = $_POST['usuario']; // usuario
    $p1 = $_POST['pass']; // contraseña 1
    $p2 = $_POST['pass2']; // contraseña 2

    // Reviso si dejó vacía alguna contraseña
    if($p1 == "" || $p2 == ""){
        $dm = "Su contraseña tendra que ser de
         6 caracteres como minimo" . "<br>";
    }else{
        // Creo el hash de la contraseña para guardarla segura, no en texto normal
        $r = password_hash($p1, PASSWORD_DEFAULT);
        echo "<br>Resultado : " . $r . "<br>";

        // Inicio sesión y guardo el usuario y el hash para usarlos en el login
        session_start();
        $_SESSION['usuario'] = $us;
        $_SESSION['hash'] = $r;

        $dm = "<br>Registrado correctamente";
    }
        // Muestro el mensaje final
        echo $dm . "<br>";
}
?>

</body>
</html>
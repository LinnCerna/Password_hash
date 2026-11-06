<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
echo "<h2>Inicio de sesion</h2>";
?>
    <form method="POST">
    <br>
    Usuario: <input type="text" name="usuario"><br><br>
    Contraseña: <input type="password" name="pass"><br><br>
    <input type="submit" name="entrar" value="Entrar">
    </br>
</form>
<br>
<a href="registro.php">Registro</a>
<?php


if(isset($_POST['entrar'])){
    $us = $_POST['usuario'];
    $p1 = $_POST['pass'];

    $r = $_SESSION['hash'];
    $g = $_SESSION['usuario'];

             if($us == $g){
        // aqui verifico la contraseña
        if(password_verify($p1, $r)){
            echo "<br>La contraseña es valida";
            echo "<br>Bienvenido al sistema";
        }else{
            echo "<br>La contraseña es invalida";
            echo "<br>Contraseña incorrecta";
        }
    }else{
        echo "Usuario inexistente";
    }
}
?>
</body>
</html>

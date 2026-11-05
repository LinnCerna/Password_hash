
<?php
// Inicio de sesion con password_verify

session_start();

echo "<h2>Inicio de sesion</h2>";

if(isset($_POST['entrar'])){

    $us = $_POST['usuario'];
    $p1 = $_POST['pass'];

    if(isset($_SESSION['usuario']) && isset($_SESSION['hash'])){

        $r = $_SESSION['hash'];
        $g = $_SESSION['usuario'];

        if($us == $g){

            if(password_verify($p1, $r)){

                echo "Bienvenido al sistema";

            }else{

                echo "Incorrecta";

            }

        }else{

            echo "<Usuario inexisatente";

        }

    }else{

        echo "Debes registrarte" . "</br>";

    }
}
?>

<form method="POST">
    <br>
    Usuario:
    <input type="text" name="usuario">
    <br><br>

    Contraseña:
    <input type="password" name="pass">
    <br><br>

    <input type="submit" name="entrar" value="Entrar">
    </br>
</form>

<br>

<a href="registro.php">Registro</a>

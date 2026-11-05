// esto se hizo con el comando: password_hash
<?php
echo "<h2>Registro de usuarios</h2>";

$dm = "";
if(isset($_POST['registrar'])){

    $nom = $_POST['nombre'];
    $us = $_POST['usuario'];
    $p1 = $_POST['pass'];
    $p2 = $_POST['pass2'];

    if($nom == "" || $us == "" || $p1 == ""){
        $dm = "Todos los campos";
    }else if(strlen($p1) < 6){
        $dm = "Debe tener 6 caracteres como minimo" . "<br>";
    }else if($p1 != $p2){
        $dm = "No coinciden";
    }else{

        $r = password_hash($p1, PASSWORD_DEFAULT);
        echo "Resultado : " . $r . "<br>";

        session_start();
        $_SESSION['usuario'] = $us;
        $_SESSION['hash'] = $r;

        $dm = "Registrado correctamente";
    }
    echo $dm . "<br>";
}
?>
<form method="POST">
    Nombre: <input type="text" name="nombre"><br><br>
    Usuario: <input type="text" name="usuario"><br><br>
    Contraseña: <input type="password" name="pass"><br><br>
    Confirmar: <input type="password" name="pass2"><br><br>
    <input type="submit" name="registrar" value="Registrar">
</form>
<br>
<a href="login.php">Login</a>
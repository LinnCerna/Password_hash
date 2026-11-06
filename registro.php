<?php
echo "<h2>Registro de usuarios</h2>";
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
<?php
$dm = "";// mensaje
if(isset($_POST['registrar'])){
    $nom = $_POST['nombre']; // nombre
    $us = $_POST['usuario'];// usuario
    $p1 = $_POST['pass'];// contraseña 1
    $p2 = $_POST['pass2'];// contraseña 2

    if($p1 == "" || $p2 == ""){
        $dm = "Su contraseña tendra que ser de
         6 caracteres como minimo" . "<br>";
    }else{
        $r = password_hash($p1, PASSWORD_DEFAULT);
        echo "<br>Resultado : " . $r . "<br>";

        session_start();
        $_SESSION['usuario'] = $us;
        $_SESSION['hash'] = $r;

        $dm = "<br>Registrado correctamente";
    }
        echo $dm . "<br>";
}
?>

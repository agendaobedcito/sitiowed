<?php

include '../conexion/conexion.php';

session_start();

$correo = $_POST['correo'];
$pass = $_POST['clave'];
$sel = $con ->prepare("SELECT * FROM usuarios WHERE Correo = '$correo' AND Clave = '$pass' AND status = '1'");
$sel->execute();

if($f = $sel->fetch()){
    $_SESSION['usuario'] = $usuarioCon;
    header("location: ../admin/administrador.php");
}
else{
    echo "Tu usuario y contraseña es incorrecto"; 
}
?>
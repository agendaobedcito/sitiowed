<?php

include '../conexion/conexion.php';

$id = $_GET['id'];

session_start();

$del = $con->prepare("DELETE FROM inventario WHERE $id = ID");

if($del->execute()){
    header('location: ../extend/inventario.php');
}

?>
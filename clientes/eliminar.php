<?php

session_start();

include '../conexion/conexion.php';

$id = $_GET['id'];

$del = $con->prepare("DELETE FROM compras WHERE id=:ID");

$del->bindParam(':ID',$id);

if($del->execute()){
    header('location: ./mostrar_compras.php');
}
?>
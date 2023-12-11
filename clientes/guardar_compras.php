<?php

include '../conexion/conexion.php';

$id = $_GET['id'];

$sel = $con->prepare("SELECT * FROM inventario WHERE ID = $id");

$sel->execute();

if($f = $sel->fetch()){

    $producto = $f['Producto'];
    $precio = $f['Precio'];
    $categoria = $f['Categoria'];
    $foto = $f['Foto'];

    $ins = $con->prepare("INSERT INTO compras VALUES(DEFAULT, :Clave, :Producto, :Costo, :Categoria, :Foto)");

    $ins->bindparam(':Clave',$id);
    $ins->bindparam(':Producto',$producto);
    $ins->bindparam(':Costo',$precio);
    $ins->bindparam(':Categoria',$categoria);
    $ins->bindparam(':Foto',$foto);

    if($ins->execute()){
        header('location: ./mostrar_compras.php');
    }
    else{
        echo 'no se inserto';
    }
}
?>
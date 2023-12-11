<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pozole</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<style>
      body{
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            background-attachment: fixed;
            background-image: url(../img/inicio.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }
</style>
<body class="bg-light">
<div>
     <Nav class="navbar navbar-expand-lg navbar-light bg-info">
        <a href="#" class="navbar-brand">Ecommerce</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
            <span class="navbar-toggeler-icon"></span></button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav">
                    <li class="nav-item mr-auto">
                        <a href="../extend/inventario.php" class="nav-link">Inventario</a>
                    </li>
                </ul>
            </div>
    </Nav>   
    </div>
    <br><br><br>

    <div class="card text-white bg-dark" style="margin-top: 1%;">
<div class="card-header"><h4 class="card-title">Editar</h4>
<div class="card-body">
    <table class="table">
        <thead>
            <th>Foto</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Categoria</th>
            <th>Desc</th>
            <th>Accion</th>
        </thead>
        <tbody>
            <?php

            include '../conexion/conexion.php';

            $id = $_GET['id'];

            $sel = $con->prepare("SELECT * FROM inventario WHERE ID = $id");

            $sel->execute();

            while($f = $sel->fetch()){
              ?>  
            <tr>
                <form action="../admin/actualizar.php?id=<?php echo $f['ID']?>" method="post" enctype="multipart/form-data">
                <td><input class="form-control" type="file" name="foto" value="<?php echo $f['Foto']; ?>"></td>
                <td><input class="form-control" name="producto" type="text" value="<?php echo $f['Producto']; ?>"></td>
                <td><input class="form-control" name="cantidad" type="text" value="<?php echo $f['Cantidad']; ?>"></td>
                <td><input class="form-control" name="precio" type="number" name="precio" value="<?php echo $f['Precio']; ?>"></td>
                <td>
                <select name="categoria" required class="form-control">
                        <option>CARROS</option>
                        <option>MOTOS</option>
                        <option >TENDENCIA</option>
                    </select>
                </td>
                <td><input class="form-control" type="text" name="descripcion" value="<?php echo $f['Descripcion']; ?>"></td>
                <td><button type="submit">Editar</button></td>
            </tr>
            </form>
            <?php
            }
            $sel = null;
            $con = null;

            ?>
        </tbody>
    </table>
</body>
</html>
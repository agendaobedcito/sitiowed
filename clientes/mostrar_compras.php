<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>compras</title>
    <link rel="shortcut icon" href="./img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<style>
    body{
          display: flex;
          min-height: 100vh;
          flex-direction: column;
          background-attachment: fixed;
          background-image: url(../img/inicio.jpg);
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
      }
</style>
<body>
    <div>
        <Nav class="navbar navbar-expand-lg navbar-light bg-light">
           <a href="#" class="navbar-brand">AGENCIA</a>
           <button class="navbar-toggler" type="button" data-toggle="collapse">
               <span class="navbar-toggeler-icon"></span></button>
               <div class="collapse navbar-collapse" id="menu">
                   <ul class="navbar-nav">
                       <li class="nav-item mt-auto">
                       <a href="./" class="nav-link"><h4>Todos los productos</h4></a>
                       </li>
                       <li class="nav-item mt-auto">
                       <a href="./categorias.php?c=TENDENCIA" class="nav-link"><h4>Tendencia</h4></a>
                       </li>
                       <li class="nav-item mt-auto">
                       <a href="./categorias.php?c=CARROS" class="nav-link"><h4>carros</h4></a>
                       </li>
                       <li class="nav-item mt-auto">
                       <a href="./categorias.php?c=MOTOS" class="nav-link"><h4>MOTOS</h4></a>
                       </li>
                   </ul>
                </nav>
                </div>
    </div>
    <br><br><br><br>
    <div class="card text-white bg-info" style="margin-top: 1%;">
<div class="card-header"><h4 class="card-title">COMPRAS REALIZADAS</h4><a href="./">Hacer una nueva compra</a>
<div class="card-body">
    <table class="table">
        <thead>
            <th>Foto</th>
            <th>Clave de la compra</th>
            <th>Id del producto</th>
            <th>Producto</th>
            <th>Precio</th>
            <th>Categoria</th>
            <th>Eliminar</th>
        </thead>
        <tbody >
            <?php

            include '../conexion/conexion.php';

            $sel = $con->prepare("SELECT * FROM compras");

            $sel->execute();

            while($f = $sel->fetch()){
              ?>  
            <tr>
                <td><img src="<?php echo $f['Foto'];?>" width="50" height="50"></td>
                <td><?php echo $f['ID']; ?></td>
                <td><?php echo $f['Clave']; ?></td>
                <td><?php echo $f['Producto']; ?></td>
                <td><?php echo "$".number_format($f['Costo'],2);?></td>
                <td><?php echo $f['Categoria']; ?></td>
                <td><a href="./eliminar.php?id=<?php echo $f['ID']?>" class="btn btn-outline-success btn-sm">
                <Span class="material-icons">ELIMINAR</Span>
                </a></td>
            </tr>
            <?php
            }
            $sel = null;
            $con = null;

            ?>
        </tbody>
    </table>
</div>
</div>
</div>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
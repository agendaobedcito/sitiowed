<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
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
                        <a href="#" class="nav-link">Inventario</a>
                    </li>
                </ul>
            </div>
    </Nav>   
    </div>
    <br>
    <div class="container" style="margin-top: 3%;">
    <div class="card text-white bg-secondary">
        <div class="card-header"><h4 class="card-title">Alta de inventario</h4></div>
        <div class="card-body">
            <form action="../admin/img_inventario.php" method="post" autocomplete="off" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" require name="producto" placeholder="Producto" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" require name="cantidad" placeholder="Cantidad" class="form-control">
                </div>
                <div class="form-group">
                    <input type="number" step="0.1" require name="precio" placeholder="Precio" class="form-control">
                </div>
                <div class="form-group">
                    <select name="categoria" required class="form-control">
                        <option name="" disabled="" selected="">Elige una categoria</option>
                        <option value="MOTOS">Motos</option>
                        <option value="CARROS">Carros</option>
                        <option value="TENDENCIA">Tendencia</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="file" name="imagen" class="form-control">
                </div>
                <div class="form-group">
                    <textarea name="descripcion" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-info">Guardar</button>
            </form>
        </div>
    </div>
</div>
<!//Mostrar el ultimo registro de la tabla>

<div class="card text-white bg-dark" style="margin-top: 1%;">
<div class="card-header"><h4 class="card-title">Ultimo registro</h4>
<div class="card-body">
    <table class="table">
        <thead>
            <th>Foto</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Categoria</th>
            <th>Desc</th>
            <th>Editar</th>
            <th>Agregar</th>
            <th>Eliminar</th>
        </thead>
        <tbody>
            <?php

            include '../conexion/conexion.php';

            $sel = $con->prepare("SELECT * FROM inventario ORDER BY ID DESC limit 5");

            $sel->execute();

            while($f = $sel->fetch()){
              ?>  
            <tr>
                <td><img src="<?php echo $f['Foto'];?>" width="50"></td>
                <td><?php echo $f['Producto']; ?></td>
                <td><?php echo $f['Cantidad']; ?></td>
                <td><?php echo "$".number_format($f['Precio'],2);?></td>
                <td><?php echo $f['Categoria']; ?></td>
                <td><?php echo $f['Descripcion']; ?></td>
                <td><a href="../admin/editar.php?id=<?php echo $f['ID']?>" class="btn btn-outline-success btn-sm">
                <Span class="material-icons">EDITAR</Span>
                </a></td>
                <td><a href="../admin/agregar_imagen.php?clave=<?php echo $f['Clave']?>" class="btn btn-outline-success btn-sm">
                <Span class="material-icons">ADD</Span>
                <td><a href="../admin/eliminar.php?id=<?php echo $f['ID']?>" class="btn btn-outline-success btn-sm">
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
<br><br><br>
<script src="../js/bootstrap.bundle.min.js.map"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
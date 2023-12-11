<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Clientes</title>
</head>
<style>
    .card {
 box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
 transition: 0.3s;
 width: 300px;
 border-radius: 5px;
 transition: .3s ease all;
}

.card:hover {
 box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
 animation-delay: 0.5s;
    transform: scale(0.9);
    transform-origin: center;
}

.container_2 {
 padding: 2px 16px;
}

.container_2 p {
 margin: 0;
 padding: 0;
}

.container_2 button {
 background-color: blue;
 color: white;
 padding: 10px 20px;
 border: none;
 cursor: pointer;
 width: 100%;
 font-size: 17px;
}

body{
    place-items: center;
    background-image: url(./img/portada.jpeg);
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

</style>

<body>
<div>
<Nav class="navbar navbar-expand-lg navbar-light bg-light">
           <a href="#" class="navbar-brand"><h4>Agencia</h4></a>
           <button class="navbar-toggler" type="button" data-toggle="collapse">
               <span class="navbar-toggeler-icon"></span></button>
               <div class="collapse navbar-collapse" id="menu">
                   <ul class="navbar-nav">
                   <li class="nav-item mt-auto">
                       <a href="./mostrar_compras.php" class="nav-link"><h4>Ver mis compras</h4></a>
                       </li>
                       <li class="nav-item mt-auto">
                       <a href="./" class="nav-link"><h4>Todos los productos</h4></a>
                       </li>
                       <li class="nav-item mt-auto">
                       <a href="./categorias.php?c=TENDENCIA" class="nav-link"><h4>Tendencia</h4></a>
                       </li>
                       <li class="nav-item mt-auto">
                       <a href="./categorias.php?c=CARROS" class="nav-link"><h4>Carros</h4></a>
                       </li>
                       <li class="nav-item mt-auto">
                       <a href="./categorias.php?c=MOTOS" class="nav-link"><h4>Motos</h4></a>
                       </li>
                   </ul>
                </nav>
                </div>
    </div>
    <br><br>
    <div class="container" style="justify-content:center; align-items:center;">
        <div class="row">
            <?php

            $cat = $_GET['c'];

            include '../conexion/conexion.php';

            $sel = $con -> prepare("SELECT * FROM inventario WHERE Categoria = ?");

            $sel->execute(array($cat));

            while ($f = $sel-> fetch()){
                ?>
            <div class="col-3">
            <div class="card">
                <img src="<?php echo $f['Foto'] ?>" alt="Product Image" style="width:100%">

                <div class="container_2">
    <h4><b><?php echo $f['Producto'] ?></b></h4>
    <p><?php echo $f['Categoria'] ?></p> 
    <p><b>Precio:</b> $<?php echo $f['Precio'] ?></p>
    <p><button><a href="./guardar_compras.php?id=<?php echo $f['ID'] ?>" style="color:white; text-decoration:none;">Añadir al carrito</a></button></p>
 </div>
 <br>
                    
                </div>
                <br><br>
            </div>
            <?php
        } ?>
        </div>
    </div>
    
</body>

</html>
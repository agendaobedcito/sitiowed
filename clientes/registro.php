<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link  href="./css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            background-attachment: fixed;
            background-image: url(./img/portada.jpeg);
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body>
<div>
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <a class="navbar-brand">"REGISTRESE PARA INICIAR SECCION"</a>
             <button class="navbar-toggler" type="button" data-togle="collapse" data-target="menu">
                <span class="navbar-toggeler-icon"></span>
             </button>
             <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a href="" class="nav-link"></a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link"></a>
                    </li>
                </ul>
             </div>
        </nav>
    </div>
    <div class="container mx-auto" style="margin-top: 15%; width:40rem;">
<div class="well">
    <h1 class="text-dark">Inicio de seccion</h1>
    <form action="../ecomerce/clientes.php" method="post">
    <div class="form-group">
        <input type="text" id="correo" class="form-control form-control-lg" name="correo" placeholder="Correo">
    </div>
    <br>
    <div class="form-group">
        <input type="password" id="clave" name="clave" class="form-control form-control-lg" placeholder="Contraseña">
    </div>
    <br>
    <div>
        <button type="submit" class="btn btn-primary" id="login">Entrar</button>
    </div>
    </form>
</div>
    </div>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>
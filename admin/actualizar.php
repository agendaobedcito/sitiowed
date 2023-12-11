<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>&copy;ECHO POR FLAVIO :3 XD</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
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

    <?php

include '../conexion/conexion.php';

    
    if($_POST){
         
    $clave = sha1(rand(0000,9999).rand(00,99));
    $id = $_GET['id'];
    $producto= $_POST['producto'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];

    $ruta = $_FILES['foto']['tmp_name'];
    $foto = $_FILES['foto']['name'];

    $cat = $_POST['categoria'];

    $up=$con->prepare("UPDATE inventario SET producto=:Producto, cantidad=:Cantidad, precio=:Precio, categoria=:Categoria, descripcion=:Descripcion, foto=:Foto WHERE id=:ID");

$up->bindparam(':ID', $id);
$up->bindparam(':Producto', $producto);
$up->bindparam(':Cantidad', $cantidad);
$up->bindparam(':Precio', $precio);
$up->bindparam(':Categoria', $cat);
$up->bindparam(':Descripcion', $descripcion);

if($ruta != ''){
    $ancho = 500;
    $alto = 400;
    $info = pathinfo($foto);
    $tamano = getimagesize($ruta);
    $width = $tamano[0];
    $height = $tamano[1];

    if($info['extension'] == 'jpg' || $info['extension'] =='JPG' || $info['extension']=='jpeg' || $info['extension']=='JPEG'){
        $fotovieja = imagecreatefromjpeg($ruta);
        $nueva = imagecreatetruecolor($ancho,$alto);
        imagecopyresampled($nueva, $fotovieja,0,0,0,0,$ancho,$alto,$width,$height);
        $copia = '../admin/copias/editado_'.$clave.'.jpg';
        imagejpeg($nueva,$copia);
    }
    
    else{
     if($info['extension'] == 'png' || $info['extension'] =='PNG'){
    $fotovieja = imagecreatefrompng($ruta );
    $nueva = imagecreatetruecolor($ancho,$alto);
    imagecopyresampled($nueva, $fotovieja,0,0,0,0,$ancho,$alto,$width,$height);
    $copia = '../admin/copias/editado_'.$clave.'.png';
    imagepng($nueva,$copia);
}
else{
    $copia = $copia;
}
 }

 
$up->bindParam(':Foto', $copia);


if($up->execute()){
    header("location:../extend/inventario.php");
}

}


else{
        echo "<script>
        alert('Seleccione un archivo valido')
    </script>";
    }
}
else{
echo "<script>
botbox.alert({
message: 'Utiliza el formulario',
callback:  function(){
    location.href = 'inventario.php';
}
});
</script>";

}
    ?>

    </body>
</html>
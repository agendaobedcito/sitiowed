<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <?php
    include '../extend/header.php';
    include '../conexion/conexion.php';

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $clave = sha1(rand(0000,9999).rand(00,99));
        $producto= htmlentities($_POST['producto']);
        $cantidad = htmlentities($_POST['cantidad']);
        $precio = htmlentities($_POST['precio']);
        $descripcion = htmlentities($_POST['descripcion']);
    
        $ruta = $_FILES['imagen']['tmp_name'];
        $imagen = $_FILES['imagen']['name'];

        $cat = $_POST['categoria'];
       
        $ins=$con->prepare("INSERT INTO inventario VALUES (DEFAULT,:Clave,:Producto,:Cantidad,:Precio,:Categoria,:Descripcion,:Foto)");

        $ins->bindParam(':Clave', $clave);
        $ins->bindParam(':Producto', $producto);
        $ins->bindParam(':Cantidad', $cantidad);
        $ins->bindParam(':Precio', $precio);
        $ins->bindParam(':Categoria', $cat);
        $ins->bindParam(':Descripcion', $descripcion);
       
        if($ruta != ''){
            $ancho = 500;
            $alto = 400;
            $info = pathinfo($imagen);
            $tamano = getimagesize($ruta);
            $width = $tamano[0];
            $height = $tamano[1];
    
            if($info['extension'] == 'jpg' || $info['extension'] =='JPG' || $info['extension']=='jpeg' || $info['extension']=='JPEG'){
                $imagenvieja = imagecreatefromjpeg($ruta);
                $nueva = imagecreatetruecolor($ancho,$alto);
                imagecopyresampled($nueva, $imagenvieja,0,0,0,0,$ancho,$alto,$width,$height);
                $copia = '../admin/foto_producto/original_'.$clave.'.jpg';
                imagejpeg($nueva,$copia);
            }
            
            else{
             if($info['extension'] == 'png' || $info['extension'] =='PNG'){
            $imagenvieja = imagecreatefrompng($ruta );
            $nueva = imagecreatetruecolor($ancho,$alto);
            imagecopyresampled($nueva, $imagenvieja,0,0,0,0,$ancho,$alto,$width,$height);
            $copia = '../admin/foto_producto/original_'.$clave.'.png';
            imagepng($nueva,$copia);
        }
        else{
            $copia = $copia;
        }
         }
    $ins->bindParam(':Foto', $copia);


    if($ins->execute()){
        header("location:../extend/inventario.php");
    }

        }
        
        
        else{
                echo ('El formato no es compatible');
            }
    }
    else{
        echo "<script>
        botbox.alert({
        message: 'Utiliza el formulario',
        callback:  function(){
            location.href = '../extend/inventario.php';
        }
    });
    </script>";
    }
    include '../extend/footer.php';
    ?>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
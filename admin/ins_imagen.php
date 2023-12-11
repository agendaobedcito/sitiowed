<?php
include '../extend/header.php';
include'../conexion/conexion.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $clave_producto=htmlentities($_POST['clave']);
    $cont=0;
    foreach($_FILES['imagen'] ['tmp_name'] as $key => $value){
        $ruta=$_FILES['imagen']['tmp_name'][$key];
        $imagen=$_FILES['imagen']['name'][$key];
        $ancho=500;
        $alto=400;
        $info=pathinfo($imagen);
        $tamano=getimagesize($ruta);
        $width=$tamano[0];
        $height=$tamano[1];
        $clave=sha1(rand(0000,9999).rand(00,99));
        
        if($info['extension'] == 'jpg' || $info['extension'] =='JPG'|| $info['extension'] =='jpeg'|| $info['extension']=='JPEG'){
            $imagenvieja = imagecreatefromjpeg($ruta);
            $nueva = imagecreatetruecolor($ancho,$alto);
            imagecopyresampled($nueva, $imagenvieja,0,0,0,0,$ancho,$alto,$width,$height);
            $cont++;
            $rand=rand(000,999);
            $renombrar=$clave.$rand.$cont;
            $copia = "./fotos/foto".$renombrar.".jpg";
            imagejpeg($nueva,$copia);
        }elseif($info['extension'] == 'png' || $info['extension'] =='PNG'){
            $imagenvieja = imagecreatefrompng($ruta);
            $nueva = imagecreatetruecolor($ancho,$alto);
            imagecopyresampled($nueva, $imagenvieja,0,0,0,0,$ancho,$alto,$width,$height);
            $cont++;
            $rand=rand(000,999);
            $renombrar=$clave.$rand.$cont;
            $copia = "./fotos/foto".$renombrar.".png";
            imagepng($nueva,$copia);
    }else{ echo ('El formato no es compatible');}

    //INSERTAR IMAGEN EN LA BD
$ins=$con->prepare("INSERT INTO imagenes VALUES (DEFAULT, :Clave,:Clave_producto,:Ruta)");
$ins->bindparam(':Clave',$clave);
$ins->bindparam(':Clave_producto',$clave_producto);
$ins->bindparam(':Ruta',$copia);
$ins->execute();
if($ins){
    header("location:../extend/inventario.php");
}else{echo "'Imagenes no pudieron ser guardadas correctamente','agregar_imagenes.php?clave='.$clave_producto.''";}
$ins=null;
$ins=null;
}
}echo "<script> botbox.alert({
message: 'Utiliza el formulario',
callback:  function(){
    location.href = 'inventario.php';
}});</script>";


include '../extend/footer.php';
?>
</body>
</html>
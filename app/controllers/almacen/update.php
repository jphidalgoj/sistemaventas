<?php
include('../../config.php');

$id_producto=$_POST['id_producto'];
$codigo = $_POST['codigo'];
$id_categoria = $_POST['id_categoria'];
$nombre = $_POST['nombre'];
$id_usuario = $_POST['id_usuario'];
$descripcion = $_POST['descripcion'];
$stock= $_POST['stock'];
$stock_minimo = $_POST['stock_minimo'];
$stock_maximo = $_POST['stock_maximo'];
$precio_compra = $_POST['precio_compra'];
$precio_venta = $_POST['precio_venta'];
$fecha_ingreso = $_POST['fecha_ingreso'];
$imagen_texto=$_POST['imagen_texto'];

if($_FILES['imagen']['name'] != null){
    $nombreDelArchivo= date("Y-m-d-h-i-s");
    $imagen_texto=$nombreDelArchivo."_".$_FILES['imagen']['name'];
    $location ="../../../almacen/img_productos/".$imagen_texto;

    move_uploaded_file($_FILES['imagen']['tmp_name'],$location);
}else{

}


 

$sentencia = $pdo->prepare("UPDATE tbl_almacen 
            SET
             nombre=:nombre,
             descripcion=:descripcion,
             stock=:stock,
             stock_minimo=:stock_minimo,
             stock_maximo=:stock_maximo,
             precio_compra=:precio_compra,
             precio_venta=:precio_venta,
             fecha_ingreso=:fecha_ingreso,
             imagen=:imagen,
             id_categoria=:id_categoria,
             id_usuario=:id_usuario,
             
             fyh_actualizacion=:fyh_actualizacion
            WHERE id_producto=:id_producto");

$sentencia->bindParam('nombre', $nombre);
$sentencia->bindParam('descripcion', $descripcion);
$sentencia->bindParam('stock', $stock);
$sentencia->bindParam('stock_minimo', $stock_minimo);
$sentencia->bindParam('stock_maximo', $stock_maximo);
$sentencia->bindParam('precio_compra', $precio_compra);
$sentencia->bindParam('precio_venta', $precio_venta );
$sentencia->bindParam('fecha_ingreso', $fecha_ingreso);
$sentencia->bindParam('imagen', $imagen_texto);
$sentencia->bindParam('id_categoria', $id_categoria);
$sentencia->bindParam('id_usuario', $id_usuario);

$sentencia->bindParam('fyh_actualizacion',$fechaHora);
$sentencia->bindParam('id_producto',$id_producto);

if ($sentencia->execute()) {
    session_start();    
    $_SESSION['mensaje'] = "Actualizacion correcta";
    $_SESSION['icono'] = "success";
    header('Location:' . $URL . '/almacen');
} else {
    //echo "No coinsiden las contraseñas";
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar";
    $_SESSION['icono'] = "error";
    header('Location:' . $URL . '/almacen/update.php');
}

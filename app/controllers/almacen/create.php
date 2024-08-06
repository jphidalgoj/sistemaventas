<?php
include('../../config.php');

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

$imagen= $_POST['imagen'];
$nombreDelArchivo= date("Y-m-d-h-i-s");
$filename=$nombreDelArchivo."_".$_FILES['imagen']['name'];
$location ="../../../almacen/img_productos/".$filename;

move_uploaded_file($_FILES['imagen']['tmp_name'],$location);
 


$sentencia = $pdo->prepare("INSERT INTO tbl_almacen 
            (codigo, nombre, descripcion, stock, stock_minimo, stock_maximo, precio_compra, precio_venta,fecha_ingreso, imagen, id_categoria, id_usuario, fyh_creacion)
    VALUES (:codigo, :nombre, :descripcion, :stock, :stock_minimo, :stock_maximo, :precio_compra, :precio_venta,:fecha_ingreso, :imagen, :id_categoria, :id_usuario, :fyh_creacion);");

$sentencia->bindParam('codigo', $codigo);
$sentencia->bindParam('nombre', $nombre);
$sentencia->bindParam('descripcion', $descripcion);
$sentencia->bindParam('stock', $stock);
$sentencia->bindParam('stock_minimo', $stock_minimo);
$sentencia->bindParam('stock_maximo', $stock_maximo);
$sentencia->bindParam('precio_compra', $precio_compra);
$sentencia->bindParam('precio_venta', $precio_venta );
$sentencia->bindParam('fecha_ingreso', $fecha_ingreso);
$sentencia->bindParam('imagen', $filename);
$sentencia->bindParam('id_usuario', $id_usuario);
$sentencia->bindParam('id_categoria', $id_categoria);
$sentencia->bindParam('fyh_creacion',$fechaHora);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Registro correcto el producto";
    $_SESSION['icono'] = "success";
    header('Location:' . $URL . '/almacen');
} else {
    //echo "No coinsiden las contraseñas";
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar";
    $_SESSION['icono'] = "error";
    header('Location:' . $URL . '/almacen/create.php');
}

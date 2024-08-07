<?php
$id_producto_get=$_GET['id'];


$sql_productos ="SELECT *, c.nombre_categoria,u.email, u.id_usuarios
FROM tbl_almacen a
INNER JOIN tbl_categorias c ON a.id_categoria=c.id_categoria
INNER JOIN tbl_usuarios u ON u.id_usuarios=a.id_usuario
WHERE id_producto=$id_producto_get;";
$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();
$productos_datos = $query_productos->fetchAll(PDO::FETCH_ASSOC);

foreach ($productos_datos as $productos_dato) {
    
    $email=$productos_dato['email'];
    $codigo = $productos_dato['codigo'];
    $id_categoria = $productos_dato['id_categoria'];
    $nombre_categoria=$productos_dato['nombre_categoria'];
    $nombre = $productos_dato['nombre'];
    $id_usuario = $productos_dato['id_usuarios'];
    $descripcion = $productos_dato['descripcion'];
    $stock = $productos_dato['stock'];
    $stock_minimo = $productos_dato['stock_minimo'];
    $stock_maximo = $productos_dato['stock_maximo'];
    $precio_compra = $productos_dato['precio_compra'];
    $precio_venta = $productos_dato['precio_venta'];
    $fecha_ingreso = $productos_dato['fecha_ingreso'];
    $imagen= $productos_dato['imagen'];
}
<?php
$id_producto_get=$_GET['id'];


$sql_productos ="SELECT *, c.nombre_categoria,u.email
FROM tbl_almacen a
INNER JOIN tbl_categorias c ON a.id_categoria=c.id_categoria
INNER JOIN tbl_usuarios u ON u.id_usuarios=a.id_usuario
WHERE id_producto=$id_producto_get;";
$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();
$productos_datos = $query_productos->fetchAll(PDO::FETCH_ASSOC);
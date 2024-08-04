<?php


$sql_usuarios = "SELECT us.id_usuarios, us.nombres, us.email, rol.rol
FROM tbl_usuarios us 
INNER JOIN tbl_roles rol ON us.id_rol=rol.id_rol;";
$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$usuarios_datos = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);

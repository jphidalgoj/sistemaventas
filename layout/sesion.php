<?php
session_start();
if(isset($_SESSION['sesion_email'])){
  //echo "si existe sesion";
  $email_sesion=$_SESSION['sesion_email'];
  $sql="SELECT us.id_usuarios, us.nombres, us.email, rol.rol
        FROM tbl_usuarios us 
        INNER JOIN tbl_roles rol ON us.id_rol=rol.id_rol
      WHERE email='$email_sesion';";
  $query=$pdo->prepare($sql);
  $query->execute();
  $usuarios=$query->fetchAll(PDO::FETCH_ASSOC);
  foreach($usuarios as $usuario){
    $id_usuario_sesion=$usuario['id_usuarios'];
    $nombres_sesion=$usuario['nombres'];
    $rol_sesion=$usuario['rol'];
  }
}else{
  header('Location: ' . $URL . '/login');
    exit();
}
<?php
include('../../config.php');


$id_usuario=$_POST['id_usuario'];



    $sentencia = $pdo->prepare("DELETE FROM tbl_usuarios
        WHERE id_usuarios=:id_usuario");

    $sentencia->bindParam('id_usuario', $id_usuario);
    $sentencia->execute();
    session_start();
    $_SESSION['mensaje']= "Se ha eliminado el usuario";
    $_SESSION['icono']= "success"; 
    header('Location:'.$URL.'/usuarios');
 
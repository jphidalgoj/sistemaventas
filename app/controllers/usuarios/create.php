<?php
include('../../config.php');

$nombres = $_POST['nombres'];
$email = $_POST['email'];

$password_user = $_POST['password_user'];
$rol = $_POST['rol'];
$password_repeat = $_POST['password_repeat'];

if ($password_user == $password_repeat) {
    $password_user = password_hash($password_user, PASSWORD_DEFAULT);

    $sentencia = $pdo->prepare("INSERT INTO tbl_usuarios (nombres, email, password_user, id_rol, fyh_creacion)
    VALUES (:nombres, :email,:password_user,:id_rol, :fyh_creacion);");

    $sentencia->bindParam('nombres', $nombres);
    $sentencia->bindParam('email', $email);
    $sentencia->bindParam('password_user', $password_user);
    $sentencia->bindParam('id_rol', $rol);
    $sentencia->bindParam('fyh_creacion', $fechaHora);
    $sentencia->execute();
    session_start();
    $_SESSION['mensaje']= "Registro correcto"; 
    header('Location:'.$URL.'/usuarios');
} else {
    //echo "No coinsiden las contraseñas";
    session_start();
    $_SESSION['mensaje']= "Error las contraseñas no son iguales"; 
    header('Location:'.$URL.'/usuarios/create.php');
}

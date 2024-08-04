<?php
include('../../config.php');

$rol = $_POST['rol'];




$sentencia = $pdo->prepare("INSERT INTO tbl_roles (rol, fyh_creacion)
    VALUES (:rol, :fyh_creacion);");

$sentencia->bindParam('rol', $rol);
$sentencia->bindParam('fyh_creacion', $fechaHora);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Registro correcto de rol";
    $_SESSION['icono'] = "success";
    header('Location:' . $URL . '/roles');
} else {
    //echo "No coinsiden las contraseñas";
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar";
    $_SESSION['icono'] = "error";
    header('Location:' . $URL . '/roles/create.php');
}

<?php
include('../../config.php');

$rol = $_POST['rol'];

$id_rol = $_POST['id_rol'];

$sentencia = $pdo->prepare("UPDATE tbl_roles
        SET rol=:rol,
            fyh_actualizacion=:fyh_actualizacion 
        WHERE id_rol=:id_rol");

$sentencia->bindParam('rol', $rol);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam('id_rol', $id_rol);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Actualizacion Correcta";
    $_SESSION['icono'] = "success";
    header('Location:' . $URL . '/usuarios');
} else {
    //echo "No coinsiden las contraseñas";
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo actualizar";
    $_SESSION['icono'] = "error";
    header('Location:' . $URL . '/roles/update.php?id=' . $id_rol);
}

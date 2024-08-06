<?php
include('../../config.php');

$nombre_categoria = $_GET['nombre_categoria'];
$id_categoria = $_GET['id_categoria'];

$id_rol = $_POST['id_rol'];

$sentencia = $pdo->prepare("UPDATE tbl_categorias
        SET nombre_categoria=:nombre_categoria,
            fyh_actualizacion=:fyh_actualizacion 
        WHERE id_categoria=:id_categoria");

$sentencia->bindParam('nombre_categoria', $nombre_categoria);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam('id_categoria', $id_categoria);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Actualizacion Correcta";
    $_SESSION['icono'] = "success";
    //header('Location:' . $URL . '/usuarios');
    ?>
    <script>
        location.href='<?= $URL;?>/categorias';
    </script>
    <?php
} else {
    //echo "No coinsiden las contraseñas";
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo actualizar";
    $_SESSION['icono'] = "error";
    //header('Location:' . $URL . '/roles/update.php?id=' . $id_rol);
    ?>
    <script>
        location.href='<?= $URL;?>/categorias';
    </script>
    <?php
}

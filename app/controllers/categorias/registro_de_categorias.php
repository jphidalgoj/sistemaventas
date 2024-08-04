<?php
include('../../config.php');

$nombre_categoria =$_GET['nombre_categoria'];



$sentencia = $pdo->prepare("INSERT INTO tbl_categorias (nombre_categoria, fyh_creacion)
    VALUES (:nombre_categoria, :fyh_creacion);");

$sentencia->bindParam('nombre_categoria', $nombre_categoria);
$sentencia->bindParam('fyh_creacion', $fechaHora);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Registro correcto de categoria";
    $_SESSION['icono'] = "success";
    //header('Location:' . $URL . '/categorias');
    ?>
    <script>
        location.href='<?= $URL;?>/categorias';
    </script>
    <?php
} else {
    //echo "No coinsiden las contraseñas";
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar";
    $_SESSION['icono'] = "error";
    //header('Location:' . $URL . '/categorias');
}

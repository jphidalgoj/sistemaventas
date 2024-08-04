<?php
define('SERVIDOR', 'localhost');
define('USUARIO', 'root');
define('PASSWORD', '');
define('DB', 'sistemaventas');

$servidor = "mysql:dbname=" . DB . ";host=" . SERVIDOR;

try {
    $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    //echo "Conexión correcta";
} catch (PDOException $e) {
    echo "Error de coneccion";
}

$URL="http://localhost/sistema_ventas/";

date_default_timezone_set("America/Guayaquil");
$fechaHora = date('Y-m-d H:i:s');


?>

<?php
require_once "../verif/verificar.php";
$conexion = new mysqli("localhost: 3307", "root", "", "patos2");
// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>
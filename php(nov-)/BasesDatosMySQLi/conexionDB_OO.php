<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "empresa";

//desactivar toda notificacion
error_reporting(0);
mysqli_report(MYSQLI_REPORT_OFF);

//Creamos la conexion utilizando la clase MySQLi
$conexion = new Mysqli($servername, $username, $password, $database);

/* Verificar conexion*/

if ($conexion->connect_error) {
    die("Fallo la conexion a la base de datos: " . $conexion->connect_error);
}else{
    echo "<h2>Conexion realizada con exito</h2>";
    $conexion->close();
}
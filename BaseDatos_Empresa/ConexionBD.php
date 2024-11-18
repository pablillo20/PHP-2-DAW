<?php
$servername = "localhost";
$database = "empresa";
$username = "root";
$password = "";

// Desactivar toda notificacion de error
error_reporting(0);
mysqli_report(MYSQLI_REPORT_OFF);

// Creamos la conexion utilizando la clase MySQLi
$conexion =new Mysqli($servername, $username, $password, $database);

// Verificar conexion
if($conexion->connect_error){
    die("Fallo la conexion a la base de datos: ".$conexion->connect_error);
}else{
    echo "<h2>Conexion realizada</h2>";
    // cerramos la conexion cuando terminemos, no vamos a sseguir trabajando con la BD
    $conexion->close();
}
?>
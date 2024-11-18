<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "empresa";

//desactivar toda notificacion
error_reporting(0);
mysqli_report(MYSQLI_REPORT_OFF);

//conectar base de datos
$conexion = mysqli_connect($servername, $username, $password, $database);

if (!$conexion) {
    die("la conexion ha fallado " .mysqli_connect_error());
}else{
    echo "<h2>Conexion realizada corectamente</h2>";
    mysqli_close($conexion);
}



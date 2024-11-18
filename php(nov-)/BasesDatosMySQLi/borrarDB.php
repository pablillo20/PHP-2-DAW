<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "empresa";

$conexion = @new mysqli($servername, $username, $password, $database);

if ($conexion->connect_error) {
    die("Fallo la conexion: " . $conexion->connect_error);
}
$sql = "DELETE FROM usuarios WHERE nombre='Mateo'";
$delete = $conexion->query($sql);

if ($delete) {
    echo "Borrado exitoso";
}else{
    echo "Error: " .$conexion->connect_error;
}
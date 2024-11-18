<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "empresa";

$conexion = @new mysqli($servername, $username, $password, $database);

if ($conexion->connect_error) {
    die("Fallo la conexion: " . $conexion->connect_error);
}
$sql = "INSERT INTO usuarios VALUES(null, 'Mateo','mateo123', 3)";
$insert = $conexion->query($sql);

if ($insert) {
    echo "datos insertados correctamente";
}else{
    echo "error al insertar" . $conexion->connect_error;
}
$conexion->close();
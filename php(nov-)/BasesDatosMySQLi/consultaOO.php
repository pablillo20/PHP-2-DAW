<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "empresa";

$conexion = @new mysqli($servername, $username, $password, $database);

if ($conexion->connect_error) {
    die("Fallo la conexion: " . $conexion->connect_error);
}
$sql = "SELECT * FROM usuarios";


if ($resultado = $conexion->query($sql)) {
    while($obj = $resultado->fetch_assoc()) {
        echo "Codigo: ".$obj['codigo']." , Nombre: ".$obj['nombre']." , Clave: ".$obj['clave']." , Rol: ".$obj['rol']."<br> ";
    }
    $conexion->close();
}else{
    echo "no hay registros";
}
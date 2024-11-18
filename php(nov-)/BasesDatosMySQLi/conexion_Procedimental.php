<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "empresa";

$conexion = mysqli_connect($servername, $username, $password, $database);

if (!$conexion) {
    die("la conexion ha fallado: " . mysqli_connect_error());
}
$sql = "SELECT * FROM usuarios";
$query = mysqli_query($conexion, $sql);

if(mysqli_num_rows($query) > 0){
    while($row = mysqli_fetch_assoc($query)){
        echo "Codigo: ".$row['codigo']." , Nombre: ".$row['nombre']." , Clave: ".$row['clave']." , Rol: ".$row['rol']."<br> ";
    }
    $conexion->close();
}

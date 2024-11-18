<?php
$servername = "localhost";
$database = "empresa";
$username = "root";
$password = "";

$conexion =mysqli_connect($servername, $username, $password, $database);

if (!$conexion) {
    die("Fallo la conexion: " . mysqli_connect_error());
}
$sql = "SELECT * FROM usuarios";
$query = mysqli_query($conexion, $sql);
if(mysqli_num_rows($query) > 0){
    while($row = mysqli_fetch_assoc($query)){
        echo "Codigo: " . $row["codigo"]. " , Nombre: " . $row["nombre"]. ", Rol:" . $row["rol"]. "<br>";
    }
}else {
    echo "No existen datos";
}
?>
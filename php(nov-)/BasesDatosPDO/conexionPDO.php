<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "empresa";

try{

    $conexion = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<h2> Conexion establecida con exito </h2>";

}catch(PDOException $e){
    echo "imposible conectarse. Error: ". $e->getMessage();
}
<?php
$servername = "localhost";
$database = "empresa";
$username = "root";
$password = "";

try{
    $bd = new PDO("mysql:host=$servername;dbname=$database;charset=utf8mb4", $username, $password);
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try{
        $insert = $bd->prepare("INSERT INTO usuarios(nombre, clave, rol) VALUES (:nombre, :clave, :rol)");

        $insert->bindParam(':nombre', $nombre);
        $insert->bindParam(':clave', $clave);
        $insert->bindParam(':rol', $rol);

        $nombre="Mishael";
        $clave="25252525";
        $rol="2";

        $insert->execute();

        echo "Insert realizado con exito";

    } catch (PDOException $err){
        die("Error ejecutando consulta SQL. ".$err->getMessage());
    }
} catch (PDOException $e) {
    echo "Imposible conectar. Error: ".$e->getMessage();
}

$conexion = null;
?>
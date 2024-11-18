<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "empresa";

try {
    $bd = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try{
        $stmt = $bd->query("SELECT * FROM usuarios");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        foreach ($stmt->fetchAll() as $row) {
            echo "Nombre: " . $row["nombre"] . " ,Rol: ".$row["rol"] ."<br>";
        }

    }catch (PDOException $err){
        die("error ejecutando la consulta". $err->getMessage());
    }


}catch (PDOException $e){
    echo "Error: " . $e->getMessage();
}
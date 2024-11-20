<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "empresa";

try{
    $bd = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try {
        $preparada = $bd->prepare("select nombre from usuarios where rol = ?");
        $preparada->bindParam(1, $rol);
        $rol = 2;
        $preparada->execute();

        echo "<p><strong>Numero de usuarios con rol " . $rol . "</strong>" . $preparada->rowCount() . "</p>";

        //Leemos los datos del recordset que nos devuelve SELECT en el objeto PDOStatement
        $preparada->setFetchMode(PDO::FETCH_ASSOC);
        while($row = $preparada->fetch()){
            echo "<p><strong>Nombre del usuario:</strong>" . $row['nombre'] . "</p>";
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}catch(Exception $e){
    echo $e->getMessage();
}
?>

<?php
$localhost = "localhost";
$user = "root";
$password = "";
$database = "empresa";

try {
    $bd = new PDO("mysql:host=$localhost;dbname=$database", $user, $password);
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        // Ejemplo 1: Consulta con bindParam
        echo 'Consulta realizada con bindParam: <br>';
        $nom = 'Susana';
        $s = $bd->prepare("SELECT * FROM empresa WHERE nombre = :nombre");
        $s->setFetchMode(PDO::FETCH_ASSOC);
        $s->bindParam(':nombre', $nom); // Vincula la variable
        $nom = 'Daniel'; // Cambia el valor antes de ejecutar
        $s->execute(); // Se usará 'Daniel' en la consulta

        while ($row = $s->fetch()) {
            echo "Nombre: " . $row['nombre'] . "<br>";
            echo "Clave: " . $row['clave'] . "<br>";
            echo "Rol: " . $row['rol'] . "<br>";
        }

        // El mismo ejemplo con bindValue
        echo 'Consulta realizada con bindValue: <br>';
        $nom = 'Susana';
        $s = $bd->prepare("SELECT * FROM empresa WHERE nombre = :nombre");
        $s->setFetchMode(PDO::FETCH_ASSOC);
        $s->bindValue(':nombre', $nom); // Vincula el valor actual de $nom
        $nom = 'Daniel'; // Cambiar aquí no afecta porque bindValue usa el valor en el momento de la vinculación
        $s->execute(); // Se usará 'Susana' en la consulta

        while ($row = $s->fetch()) {
            echo "Nombre: " . $row['nombre'] . "<br>";
            echo "Clave: " . $row['clave'] . "<br>";
            echo "Rol: " . $row['rol'] . "<br>";
        }
    } catch (PDOException $e) {
        echo "Error en la consulta: " . $e->getMessage();
    }
} catch (PDOException $e) {
    echo "Error al conectar con la base de datos: " . $e->getMessage();
}

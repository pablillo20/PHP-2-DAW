<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Viviendas Almacenadas</title>
</head>
<style>
    h2 {
        color: blue;
    }
    form {
        border: solid lightblue;
    }
    textarea{
        height: 5em;
        width: 350px;
    }
</style>
<body>
<?php
$xml_file = 'viviendas.xml';

if (file_exists($xml_file)) {
    $xml = simplexml_load_file($xml_file);
    echo "<h2>Viviendas Almacenadas</h2>";
    foreach ($xml->vivienda as $vivienda) {
        // Mostrar datos de la vivienda
        echo "<p><strong>Tipo:</strong> {$vivienda->tipo}</p>";
        echo "<p><strong>Zona:</strong> {$vivienda->zona}</p>";
        echo "<p><strong>Dirección:</strong> {$vivienda->direccion}</p>";
        echo "<p><strong>Número de dormitorios:</strong> {$vivienda->dormitorios}</p>";
        echo "<p><strong>Precio:</strong> €{$vivienda->precio}</p>";
        echo "<p><strong>Tamaño:</strong> {$vivienda->tamano} m²</p>";

        // Mostrar observaciones
        echo "<p><strong>Observaciones:</strong> " . (!empty($vivienda->observaciones) ? $vivienda->observaciones : "No hay observaciones.") . "</p>";

        // Mostrar foto
        if (!empty($vivienda->foto)) {
            echo "<p><strong>Foto:</strong> <a href='{$vivienda->foto}' target='_blank'>Ver imagen en grande</a> <img src='{$vivienda->foto}' alt='Foto de la vivienda' style='width:100px;height:auto;'></p>";
        } else {
            echo "<p><strong>Foto:</strong> No se ha subido imagen.</p>";
        }

        // Mostrar beneficio
        if (!empty($vivienda->beneficio)) {
            echo "<p><strong>Beneficio:</strong> €{$vivienda->beneficio}</p>";
        }

        echo "<hr>";
    }
} else {
    echo "<p>No hay viviendas almacenadas.</p>";
}
?>

<p>
    <a href="index.php">Insertar Nueva Vivienda</a>
</p>

</body>
</html>

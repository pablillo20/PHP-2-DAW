<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Producto</title>
</head>
<body>
<h1>Selecciona un Producto</h1>
<form method="POST" action="index.php">
    <label for="producto">Producto:</label>
    <select name="producto" id="producto" style="width: 500px;">
        <option>Elige el Producto Deseado</option>
        <?php
        // Conexion a la Base de Datos TiendaElectronica
        require_once 'Config/configuracion.php';
        require_once 'library/ClassConexion.php';

        use Lib\TiendaElectro;

        try {
            // Establecemos la conexión
            $conexion = new TiendaElectro();
            $stmt = $conexion->query("SELECT cod, nombre FROM productos;");
            $stmt->setFetchMode(\PDO::FETCH_ASSOC);

            // Iteramos sobre los resultados y los mostramos en el select
            foreach ($stmt->fetchAll() as $row) {
                echo "<option value='" . $row['cod'] . "'>" . $row['cod'] . " - " . $row['nombre'] . "</option>";
            }
        } catch (Exception $e) {
            echo "<option value=''>Imposible conectarse. Error: " .($e->getMessage()) . "</option>";
        }
        ?>
    </select>
    <button type="submit">Enviar</button>
</form>

<?php
// Verificamos si se ha enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['producto'])) {
    $producto = $_POST['producto'];

    echo "<p>Producto seleccionado: " . $producto . "</p>";

    try {
        $conexion = new TiendaElectro();

        // Ejecutamos la consulta para obtener el stock de tiendas
        $stmt = $conexion->prepare("SELECT t.nombre AS tienda, s.unidades 
                                    FROM stock s
                                    INNER JOIN tiendas t ON s.tienda = t.cod
                                    WHERE s.producto = :producto");
        $stmt->bindParam(':producto', $producto, \PDO::PARAM_STR);
        $stmt->execute();

        // Verificamos si se han encontrado resultados
        $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        if ($resultados) {
            echo "<h2>Stock del Producto '$producto' en las Tiendas:</h2>";

            // Imprimimos los resultados
            foreach ($resultados as $row) {
                echo "<p>Tienda: " . $row['tienda'] . " - Unidades Disponibles: " . $row['unidades'] . "</p><br>";
            }
        } else {
            echo "<p>No se encontró información de stock para este producto.</p>";
        }
    } catch (Exception $e) {
        echo "<p>Error al obtener el stock: " .($e->getMessage()) . "</p>";
    }
}
?>
</body>
</html>

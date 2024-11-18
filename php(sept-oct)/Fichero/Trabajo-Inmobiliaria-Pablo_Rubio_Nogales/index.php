<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Vivienda</title>
</head>
<style>
    h2 {
        color: blue;
    }
    form {
        border: solid lightblue;
    }
    textarea {
        height: 5em;
        width: 350px;
    }
</style>
<body>
<h2>Formulario de Vivienda</h2>

<?php
$xml_file = 'viviendas.xml';
$fotos_dir = 'fotos';

// Crear directorio de fotos
if (!file_exists($fotos_dir)) mkdir($fotos_dir, 0777, true);

$errores = [];

function validar_datos() {
    $errores = [];
    // Validación del tipo
    if (!in_array($_POST['tipo'], ['Piso', 'Adosado', 'Chalet', 'Casa'])) {
        $errores[] = "Tipo no válido";
    }
    // Validación de la zona
    if (!in_array($_POST['zona'], ['Centro', 'Zaidín', 'Chana', 'Albaicín', 'Sacromonte', 'Realejo'])) {
        $errores[] = "Zona no válida";
    }
    // Validación de dormitorios
    if (!isset($_POST['dormitorios']) || $_POST['dormitorios'] < 1 || $_POST['dormitorios'] > 5) {
        $errores[] = "Dormitorios no válido";
    }
    // Validación de precio y tamaño
    if (!isset($_POST['precio']) || !ctype_digit($_POST['precio'])) {
        $errores[] = "Precio debe ser un número válido";
    }
    if (!isset($_POST['tamano']) || !ctype_digit($_POST['tamano'])) {
        $errores[] = "Tamaño debe ser un número válido";
    }
    return $errores;
}

function calcular_beneficio($zona, $tamano, $precio) {
    $porcentajes = [
        'Centro' => $tamano > 100 ? 0.35 : 0.30,
        'Zaidín' => $tamano > 100 ? 0.28 : 0.25,
        'Chana' => $tamano > 100 ? 0.25 : 0.22,
        'Albaicín' => $tamano > 100 ? 0.35 : 0.20,
        'Sacromonte' => $tamano > 100 ? 0.25 : 0.22,
        'Realejo' => $tamano > 100 ? 0.28 : 0.25,
    ];
    return $precio * $porcentajes[$zona];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errores = validar_datos();

    // Validar el tamaño de la foto
    if (isset($_FILES['foto']) && $_FILES['foto']['size'] > 100000) {
        $errores[] = "La foto excede 100KB";
    }

    // Si no hay errores, procesar la vivienda
    if (empty($errores)) {
        $foto_url = '';
        if (isset($_FILES['foto']) && $_FILES['foto']['size'] > 0) {
            $foto_url = $fotos_dir . '/' . basename($_FILES['foto']['name']);
            move_uploaded_file($_FILES['foto']['tmp_name'], $foto_url);
        }

        $beneficio = calcular_beneficio($_POST['zona'], $_POST['tamano'], $_POST['precio']);

        // Crear o cargar archivo XML
        $xml = file_exists($xml_file) ? simplexml_load_file($xml_file) : new SimpleXMLElement('<viviendas></viviendas>');

        // Añadir vivienda al XML
        $vivienda = $xml->addChild('vivienda');
        $vivienda->addChild('tipo', htmlspecialchars($_POST['tipo']));
        $vivienda->addChild('zona', htmlspecialchars($_POST['zona']));
        $vivienda->addChild('direccion', htmlspecialchars($_POST['direccion']));
        $vivienda->addChild('dormitorios', htmlspecialchars($_POST['dormitorios']));
        $vivienda->addChild('precio', htmlspecialchars($_POST['precio']));
        $vivienda->addChild('tamano', htmlspecialchars($_POST['tamano']));
        $vivienda->addChild('foto', htmlspecialchars($foto_url));
        $vivienda->addChild('beneficio', htmlspecialchars($beneficio));

        // Guardar XML tabulado
        $dom = new DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml->asXML());
        $dom->save($xml_file);

        // Mostrar resultados
        echo "<h3>Vivienda guardada exitosamente</h3>";
        echo "<p><strong>Tipo:</strong> " . htmlspecialchars($_POST['tipo']) . "</p>";
        echo "<p><strong>Zona:</strong> " . htmlspecialchars($_POST['zona']) . "</p>";
        echo "<p><strong>Dirección:</strong> " . htmlspecialchars($_POST['direccion']) . "</p>";
        echo "<p><strong>Dormitorios:</strong> " . htmlspecialchars($_POST['dormitorios']) . "</p>";
        echo "<p><strong>Precio:</strong> €" . htmlspecialchars($_POST['precio']) . "</p>";
        echo "<p><strong>Tamaño:</strong> " . htmlspecialchars($_POST['tamano']) . " m²</p>";
        echo "<p><strong>Foto:</strong> <img src='$foto_url' alt='Foto' style='width:100px;height:auto;'></p>";
        echo "<p><strong>Beneficio:</strong> €" . htmlspecialchars($beneficio) . "</p>";
        echo "<button onclick='window.location.href=\"index.php\"'>Volver</button>";
        echo "<button onclick='window.location.href=\"viviendas.php\"'>Ver viviendas</button>";
        exit;
    }
}
?>

<!-- Formulario -->
<form action="index.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td><label>Tipo:</label></td>
            <td>
                <select name="tipo">
                    <option value="Piso">Piso</option>
                    <option value="Adosado">Adosado</option>
                    <option value="Chalet">Chalet</option>
                    <option value="Casa">Casa</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label>Zona:</label></td>
            <td>
                <select name="zona">
                    <option value="Centro">Centro</option>
                    <option value="Zaidín">Zaidín</option>
                    <option value="Chana">Chana</option>
                    <option value="Albaicín">Albaicín</option>
                    <option value="Sacromonte">Sacromonte</option>
                    <option value="Realejo">Realejo</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label>Dirección:</label></td>
            <td><input type="text" name="direccion"></td>
        </tr>
        <tr>
            <td><label>Dormitorios:</label></td>
            <td>
                <input type="radio" name="dormitorios" value="1"> 1
                <input type="radio" name="dormitorios" value="2"> 2
                <input type="radio" name="dormitorios" value="3"> 3
                <input type="radio" name="dormitorios" value="4"> 4
                <input type="radio" name="dormitorios" value="5"> 5
            </td>
        </tr>
        <tr>
            <td><label>Precio (€):</label></td>
            <td><input type="text" name="precio"></td>
        </tr>
        <tr>
            <td><label>Tamaño:</label></td>
            <td><input type="text" name="tamano"> m²</td>
        </tr>
        <tr>
            <td><label>Foto:</label></td>
            <td><input type="file" name="foto" accept="image/*"></td>
        </tr>
        <tr>
            <td><label>Observaciones:</label></td>
            <td><textarea name="observaciones" rows="4" cols="30"></textarea></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;"><button type="submit">Insertar vivienda</button></td>
        </tr>
    </table>
</form>

<!-- Mostrar errores -->
<?php
if (!empty($errores)) {
    foreach ($errores as $error) {
        echo "<p style='color: red;'>$error</p>";
    }
}
?>

</body>
</html>

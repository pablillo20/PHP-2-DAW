<!DOCTYPE html>
<html>
<head>
    <title>Subida de imágenes</title>
</head>
<body>
<h1>Subida de archivos con PHP</h1>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="imagen" required />
    <input type="submit" value="Enviar" />
</form>

<?php
// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Directorio donde se guardarán las imágenes
    $directorio = "images/";

    // Asegurarse de que el directorio exista
    if (!is_dir($directorio)) {
        mkdir($directorio, 0755, true);
    }

    // Obtener información del archivo subido
    $nombre_archivo = basename($_FILES['imagen']['name']);
    $tipo_archivo = $_FILES['imagen']['type'];
    $tamano_archivo = $_FILES['imagen']['size'];
    $archivo_temporal = $_FILES['imagen']['tmp_name'];
    $ruta_destino = $directorio . $nombre_archivo;

    // Verificar si se ha seleccionado un archivo
    if ($nombre_archivo != "") {
        // Verificar el tipo de archivo
        $tipos_permitidos = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($tipo_archivo, $tipos_permitidos)) {
            echo "El archivo no es una imagen válida. Solo se permiten JPEG, PNG y GIF.";
        } elseif ($tamano_archivo > 2 * 1024 * 1024) { // Limitar el tamaño a 2MB
            echo "El archivo es demasiado grande. El tamaño máximo permitido es de 2MB.";
        } elseif (getimagesize($archivo_temporal) === false) {
            echo "El archivo no es una imagen.";
        } else {
            if(is_uploaded_file($archivo_temporal)){
                // Mover el archivo al directorio de destino
                if (move_uploaded_file($archivo_temporal, $ruta_destino)) {
                    echo "La imagen se ha subido correctamente: <strong>$nombre_archivo</strong><br />";
                } else {
                    echo "Ha ocurrido un error al subir la imagen.";
                }
            }
        }
    } else {
        echo "Por favor, selecciona una imagen.";
    }
}
?>

<h2>Listado de imágenes</h2>
<?php
// Mostrar las imágenes en el directorio
$imagenes = scandir("images/");
foreach ($imagenes as $imagen) {
    if ($imagen != "." && $imagen != "..") {
        echo "<img src='images/$imagen' width='200' /><br />";
    }
}

?>
</body>
</html>




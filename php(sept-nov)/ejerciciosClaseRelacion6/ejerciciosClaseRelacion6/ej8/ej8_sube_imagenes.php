<?php
    const CARPETA_IMAGENES="./images/";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (is_uploaded_file($_FILES["foto"]["tmp_name"])) {
            $nombreDirectorio = CARPETA_IMAGENES;
            $nombreFichero = $_FILES["foto"]["name"];
            $nombreCompleto = $nombreDirectorio . $nombreFichero;

            if (is_file($nombreCompleto)) {
                $idUnico = "_";
                $nombreCompleto = $nombreDirectorio . $idUnico . $nombreFichero;
            }
            echo($nombreCompleto . "<br/>");
            move_uploaded_file(($_FILES["foto"]["tmp_name"]), $nombreCompleto);
        } else
            echo("No se ha podido subir el fichero<br/>\n");
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Subida archivos con PHP - ejercicio 8</title>
    </head>
    <body>
        <h1>Subida de archivos con PHP</h1>
        <form  method = "post" enctype="multipart/form-data" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="foto" >Imagen</label>
            <input type="file" name ="foto" id="foto" placeholder="Seleccionar archivo"/>
            <!--input type="hidden" name="MAX_FILE_SIZE" value="1048576" /><br/-->
            <!--input name="file_input_name" type="file" /><br /><br /-->
            <button type="submit" >Enviar archivo</button>
        </form>
        <h1>Listado de imágenes</h1>
<?php
    if (is_dir(CARPETA_IMAGENES) && //existe la carpeta¿?
        $dh = opendir(CARPETA_IMAGENES)){
        while (($file = readdir($dh)) !== false) {//iteramos por el contenido de la carpeta( punto 7.2 "Manipular directorios"
                                                    // en los apuntes de clase
            if (is_file(CARPETA_IMAGENES . $file)){
                echo "<p><img src=\"" .CARPETA_IMAGENES . $file . "\" alt =\"" . $file . "\" ></p<p>";
            }
        };
        closedir($dh);
    }
?>

    </body>
</html>
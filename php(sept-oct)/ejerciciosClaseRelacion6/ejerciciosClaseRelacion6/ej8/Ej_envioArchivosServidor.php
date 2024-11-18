<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulario ejemplo envio archivos servidor con PHP</title>
</head>
<body>
    Fichero recibido: Nombre: <?= $_FILES[ "foto" ][ "name" ]."<br>"?>
    Tamaño: <?= $_FILES[ "foto" ][ "size" ]." bytes"."<br>"?>
    Temporal: <?= $_FILES[ "foto" ][ "tmp_name" ]."<br>"?>
    Tipo: <?= $_FILES[ "foto" ][ "type" ]."<br>"?>
    Error: <?= $_FILES[ "foto" ][ "error" ]."<br>"?>

<?php
   // var_dump(apache_request_headers());
    //echo "<br/>";
    // comprobando y moviendo a un directorio

    if (is_uploaded_file ($_FILES["foto"]["tmp_name"]) ) {
        $nombreDirectorio = "./uploads/";
        $nombreFichero = $_FILES["foto"]["name"];

        $nombreCompleto = $nombreDirectorio.$nombreFichero;

        if (is_file($nombreCompleto)) {
            $idUnico = time();
            $nombreCompleto = $idUnico."-".$nombreFichero;
        }
        echo($nombreCompleto . "<br/>");
        move_uploaded_file(($_FILES["foto"]["tmp_name"]), $nombreCompleto);
    }
    else
        echo("No se ha podido subir el fichero<br/>\n");
?>
</body>
</html>
<?php
/**Crea un fichero de texto con varias líneas
 * Ábrelo en modo escritura.
 * Lee su contenido con fgets() y muestra el contenido.
 * Cierra el archivo.
 * Escribe dentro de ese archivo un nuevo texto, recuerda que ahora no tendrá que estar abierto en modo lectura.
 * Copia ese fichero de texto en el mismo directorio con otro nombre.
 * Renombra el archivo de texto anterior.
 * Elimina este último archivo.
 */
 $nombreArchivo= "archivoEjercicio5.txt";

 //Crea un fichero de texto con varias líneas ================================
 $fp = fopen($nombreArchivo, "w+");

 if ($fp) {
     $texto = "mi primera línea\r\n";
     fwrite($fp, $texto);

     $texto = "mi segunda línea\r\n";
     fwrite($fp, $texto);

     $texto = "mi tercera línea\r\n";
     fwrite($fp, $texto);
     fclose($fp);
 }
 else
     echo "no se ha podido crear el archivo ". $nombreArchivo;

 //Ábrelo en modo escritura. ===========================================
 $fp = fopen($nombreArchivo, "r");
 if ($fp) {
    // Lee su contenido con fgets() y muestra el contenido.

    while (($buffer = fgets($fp)) !== false){
        echo $buffer;
    }
    if (!feof($fp))
        echo "Error inesperado en la lectura";
    //Cierra el archivo.
     fclose($fp);
 }

 //Escribe dentro de ese archivo un nuevo texto, recuerda que ahora no tendrá que estar abierto en modo lectura.
 $fp = fopen($nombreArchivo, "a");

 if ($fp) {
     $texto = "añadimos una nueva linea";
     fwrite($fp, $texto);
     fclose($fp);
 }

 //Copia ese fichero de texto en el mismo directorio con otro nombre.
$archivoCopia = "archivoCopia.txt";
 if (copy($nombreArchivo, $archivoCopia)){
    //Renombra el archivo de texto anterior.
     if (rename($archivoCopia, ("nuevo" . $archivoCopia))){
         //elimina este último archivo.
         unlink(("nuevo" . $archivoCopia));
     }
     else
         echo "Error al intentar renombrar el archivo" . $archivoCopia . "a nuevo" . $archivoCopia;

 }
 else
     echo "error al copiar el archivo " . $nombreArchivo. " en " .  $archivoCopia;




<?php
/*
 * Crea un script para abrir un fichero de texto para lectura.
 * Debes de asegurarte que el fichero existe y en caso contrario mostrar un mensaje de error. Pon dos ejemplos,
 * con un fichero que existe y con otro que no existe.
 * NOTA: se recomienda no mirar la solución antes de intentarlo.
 * Advierte que se produce un Warning. ¿Puedes solucionarlo? */
$pathArchivo = "miarchivo.txt";

if (file_exists($pathArchivo)) {
    $fp = fopen("miarchivo.txt", "r");
    if ($fp)
        echo "El archivo existe y he podido abrirlo para lectura<br/>";
    else
        echo "El archivo existe PERO NO he podido abrirlo para lectura<br/>";
}
else
    echo "El archivo NO existe<br/>";
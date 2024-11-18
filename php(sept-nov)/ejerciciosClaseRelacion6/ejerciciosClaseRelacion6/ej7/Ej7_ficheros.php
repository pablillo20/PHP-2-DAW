<?php
    $directorio = "pruebasEj7";
    if (!is_dir($directorio)){
        if(!mkdir("./" . $directorio)) {
            echo "no se pudo crear el directorio " . $directorio;
            exit(1);
        }
        $archivoCopia = "fichero_ejemplo.txt";
        copy($archivoCopia, "./" . $directorio . "/" . $archivoCopia);

        if ($dh = opendir($directorio)){
            //nota: ver https://www.php.net/manual/en/language.operators.assignment.php?form=MG0AV3
            // a cerca del operador '='
            while (($file = readdir($dh)) !== false) {
                echo "nombre archivo: $file : tipo archivo: " . filetype($directorio . "/" . $file) . "<br/>";
            }
            closedir($dh);
        }

    }

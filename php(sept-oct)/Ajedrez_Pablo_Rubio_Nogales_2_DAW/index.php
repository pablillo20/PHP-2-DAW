<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablero de Ajedrez</title>

    <style>
        table, td {
            border: 2px solid blue;
            border-collapse: collapse;
        }
        td {
            width: 50px;
            height: 50px;
            margin: 0 auto;
            padding: 0px;
        }
        td.blanca {
            background-color: white;
        }
        td.gris {
            background-color: #EEEEEE;
        }
        img {
            opacity: 0.3;
            width: 100%;
            height: 100%;
            margin: 0px;
        }
    </style>
</head>
<body>



<?php

include 'funcionesAjedrez.php';

dibujarTablero();
?>

</body>
</html>
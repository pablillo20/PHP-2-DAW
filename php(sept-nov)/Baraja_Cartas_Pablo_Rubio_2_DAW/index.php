<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Baraja Española - Corrección</title>
</head>
<body>
<?php

// Baraja de cartas con sus valores
$baraja = [
    'bastos_1.jpg' => 11, 'bastos_2.jpg' => 0, 'bastos_3.jpg' => 10, 'bastos_4.jpg' => 0, 'bastos_5.jpg' => 0,
    'bastos_6.jpg' => 0, 'bastos_7.jpg' => 0, 'bastos_8.jpg' => 0, 'bastos_9.jpg' => 0,
    'bastos_10.jpg' => 10, 'bastos_11.jpg' => 3, 'bastos_12.jpg' => 4, 'copas_1.jpg' => 11,
    'copas_2.jpg' => 0, 'copas_3.jpg' => 10, 'copas_4.jpg' => 0, 'copas_5.jpg' => 0,
    'copas_6.jpg' => 0, 'copas_7.jpg' => 0, 'copas_8.jpg' => 0, 'copas_9.jpg' => 0,
    'copas_10.jpg' => 2, 'copas_11.jpg' => 3, 'copas_12.jpg' => 4, 'espadas_1.jpg' => 11,
    'espadas_2.jpg' => 0, 'espadas_3.jpg' => 10, 'espadas_4.jpg' => 0, 'espadas_5.jpg' => 0,
    'espadas_6.jpg' => 0, 'espadas_7.jpg' => 0, 'espadas_8.jpg' => 0, 'espadas_9.jpg' => 0,
    'espadas_10.jpg' => 2, 'espadas_11.jpg' => 3, 'espadas_12.jpg' => 4, 'oros_1.jpg' => 11,
    'oros_2.jpg' => 0, 'oros_3.jpg' => 10, 'oros_4.jpg' => 0, 'oros_5.jpg' => 0,
    'oros_6.jpg' => 0, 'oros_7.jpg' => 0, 'oros_8.jpg' => 0, 'oros_9.jpg' => 0,
    'oros_10.jpg' => 2, 'oros_11.jpg' => 3, 'oros_12.jpg' => 4
];

// Seleccionar las cartas de la mano del jugador
$mano = [];
$aleatorio = 0;

echo "<h2>Cartas en tu mano:</h2>";
for($i = 0; $i < 3; $i++){
    // Seleccionar una carta aleatoria
    $aleatorio = array_rand($baraja);
    $mano[$i] = $baraja[$aleatorio];

    // Mostrar la imagen de la carta
    echo "<img src='Imagenes/$aleatorio'>";

    // Borrar de la array para que no vuelva a salir
    unset($baraja[$aleatorio]);
}

// Seleccionar las cartas ganadas
$ganadas = [];
$total = 0;

echo "<h2>Cartas ganadas:</h2>";
for ($i = 0; $i < 10; $i++) {
    // Seleccionar una carta aleatoria (clave)
    $ramd = array_rand($baraja);

    // Guardar la clave (nombre de la carta) y su valor (puntos)
    $ganadas[$i]['clave'] = $ramd;
    $ganadas[$i]['valor'] = $baraja[$ramd];

    // Sumar los puntos de la carta seleccionada al total
    $total += $ganadas[$i]['valor'];

    // Mostrar la imagen de la carta seleccionada
    echo "<img src='Imagenes/{$ganadas[$i]['clave']}'>";

    // Eliminar la carta de la baraja para evitar duplicados
    unset($baraja[$ramd]);
}

// Mostrar el total de puntos de las cartas ganadas
echo "<h3>Total de puntos de las cartas ganadas: $total</h3>";

?>
</body>
</html>


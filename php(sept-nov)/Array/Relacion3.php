<?php
// Ejericicio 1

// Array de 8 números enteros
$numeros = [8, 3, 5, 9, 1, 6, 7, 4];

// a. Recorrer y mostrar el array
echo "<h3>Array original:</h3>" . implode(" ", $numeros) . "<br>";

// b. Ordenar y mostrar el array
sort($numeros);
echo "<h3>Array ordenado:</h3>" . implode(" ", $numeros) . "<br>";

// c. Mostrar la longitud del array
echo "<h3>Longitud del array:</h3>" . count($numeros) . "<br>";

// d. Buscar un elemento dentro del array
$buscar = 5;
echo "<h3>Buscar el número $buscar:</h3>";
echo (array_search($buscar, $numeros) !== false) ? "Encontrado<br>" : "No encontrado<br>";

// e. Buscar un elemento por parámetro GET
if (isset($_GET['numero'])) {
    $numeroURL = $_GET['numero'];
    echo "<h3>Buscar el número $numeroURL (desde URL):</h3>";
    echo (array_search($numeroURL, $numeros) !== false) ? "Encontrado<br>" : "No encontrado<br>";
}
?>

<?php
// Ejercicio 2

// Inicializar el array vacío
$numeros = [];

// Añadir valores al array mientras su longitud sea menor que 120
for ($i = 0; count($numeros) < 120; $i++) {
    $numeros[] = $i;
}

// Mostrar el contenido del array
echo "<h3>Array con 120 elementos:</h3>";
echo implode(", ", $numeros);
?>

<?php
// Ejercicio 3

function ramdonBi() {
    $arrayOriginal = [];
    $arrayComplementario = [];

    // Generar el array con valores aleatorios (0 o 1)
    for ($i = 0; $i < 7; $i++) {
        $arrayOriginal[$i] = rand(0, 1);
    }

    // Calcular el complementario (0 -> 1, 1 -> 0)
    for ($i = 0; $i < 7; $i++) {
        $arrayComplementario[$i] = $arrayOriginal[$i] == 0 ? 1 : 0;
    }

    // Mostrar el array original
    echo "Array Original: " . implode(", ", $arrayOriginal) . "<br>";

    // Mostrar el array complementario
    echo "Array Complementario: " . implode(", ", $arrayComplementario) . "<br>";
}

// Llamar a la función
ramdonBi();
?>

<?php
// Ejercicio 4


// Crear el array con 20 valores aleatorios entre 0 y 100
$valores = [];
$cuadrados = [];
$cubos = [];

for ($i = 0; $i < 20; $i++) {
    $valores[$i] = rand(0, 100);  // Genera un valor aleatorio entre 0 y 100
    $cuadrados[$i] = $valores[$i] ** 2;  // Calcula el cuadrado
    $cubos[$i] = $valores[$i] ** 3;  // Calcula el cubo
}

// Mostrar el contenido de los tres arrays en tres columnas
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>Valor</th><th>Cuadrado</th><th>Cubo</th></tr>";

for ($i = 0; $i < 20; $i++) {
    echo "<tr>";
    echo "<td>" . $valores[$i] . "</td>";
    echo "<td>" . $cuadrados[$i] . "</td>";
    echo "<td>" . $cubos[$i] . "</td>";
    echo "</tr>";
}

echo "</table>";

?>

<?php
// Genera un array con entre 20 y 30 animales usando los códigos Unicode entre 128000 y 128060
$animalCodes = range(128000, 128060);
shuffle($animalCodes); // Mezclar los códigos para mayor aleatoriedad

// Seleccionar un número aleatorio de animales entre 20 y 30
$numAnimales = rand(20, 30);
$animales = array_slice($animalCodes, 0, $numAnimales);

// Mostrar los animales seleccionados
echo "Animales seleccionados ($numAnimales animales):<br>";
foreach ($animales as $animal) {
    echo "&#$animal; ";
}

// Elegir un animal al azar para eliminar
$indiceEliminar = array_rand($animales);
$animalEliminar = $animales[$indiceEliminar];

echo "<br><br>Animal a eliminar:<br>";
echo "&#$animalEliminar; ";

// Eliminar el animal del array
unset($animales[$indiceEliminar]);

// Mostrar la lista de animales restantes
$animalesRestantes = count($animales);
echo "<br><br>Animales restantes ($animalesRestantes animales):<br>";
foreach ($animales as $animal) {
    echo "&#$animal; ";
}
?>

<?php
echo "<table border='1'>";
foreach ($_SERVER as $key => $value) {
    echo "<tr><td>$key</td><td>$value</td></tr>";
}
echo "</table>";
?>


<p><?php
    // Array de asignaturas con notas
    $notas = [
        "Matemáticas" => [3, 10, 7],
        "Lengua" => [8, 5, 3],
        "Física" => [7, 1, 2],
        "Latín" => [7, 4, 8],
        "Inglés" => [6, 3, 7]
    ];

    // Función para calcular la media de las notas
    function calcularMedia($notas) {
        return round(array_sum($notas) / count($notas), 1);
    }

    // Calcular la media total
    $totalMedia = 0;
    $numAsignaturas = count($notas);

    // Imprimir la tabla
    echo "<table border='1' cellspacing='0' cellpadding='5' style='margin: 0 auto; text-align: center;'>";
    echo "<tr><th>Asignatura</th><th>Trimestre 1</th><th>Trimestre 2</th><th>Trimestre 3</th><th>Media</th></tr>";

    foreach ($notas as $asignatura => $trimestres) {
        $media = calcularMedia($trimestres);
        echo "<tr>";
        echo "<td>$asignatura</td>";
        echo "<td>{$trimestres[0]}</td>";
        echo "<td>{$trimestres[1]}</td>";
        echo "<td>{$trimestres[2]}</td>";
        echo "<td>$media</td>";
        echo "</tr>";
        $totalMedia += $media;
    }

    $mediaTotal = round($totalMedia / $numAsignaturas, 1);
    echo "</table>";
    echo "<p style='text-align: center;'>La media total es $mediaTotal</p>";
    ?>
</p>


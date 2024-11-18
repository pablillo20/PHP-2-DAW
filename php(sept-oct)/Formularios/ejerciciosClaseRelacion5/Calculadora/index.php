<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora en PHP</title>
</head>
<body>
<h1>Calculadora Simple en PHP</h1>

<!-- Formulario para la calculadora -->
<form method="post" action="">
    <input type="text" name="num1" placeholder="Número 1" required>
    <input type="text" name="num2" placeholder="Número 2" required>
    <br><br>

    <!-- Botones de operación -->
    <input type="submit" name="operacion" value="Sumar">
    <input type="submit" name="operacion" value="Restar">
    <input type="submit" name="operacion" value="Multiplicar">
    <input type="submit" name="operacion" value="Dividir">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores de los números ingresados y sanitizarlos
    $num1 = filter_var($_POST["num1"], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $num2 = filter_var($_POST["num2"], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $operacion = $_POST["operacion"];
    $resultado = 0;
    $errores = [];

    // Validación usando filtros PHP para números decimales
    if (!filter_var($num1, FILTER_VALIDATE_FLOAT)) {
        $errores[] = "El primer número no es válido. Debe ser un número entero o decimal.";
    }

    if (!filter_var($num2, FILTER_VALIDATE_FLOAT)) {
        $errores[] = "El segundo número no es válido. Debe ser un número entero o decimal.";
    }

    // Mostrar errores si los hay
    if (!empty($errores)) {
        foreach ($errores as $error) {
            echo "<h2 style='color:red;'>Error: $error</h2>";
        }
    } else {
        // Convertir los valores a float (ya que pasaron la validación)
        $num1 = floatval($num1);
        $num2 = floatval($num2);

        // Realizar la operación según el botón presionado
        if ($operacion == "Sumar") {
            $resultado = $num1 + $num2;
            echo "<h2>Resultado: $num1 + $num2 = $resultado</h2>";
        } elseif ($operacion == "Restar") {
            $resultado = $num1 - $num2;
            echo "<h2>Resultado: $num1 - $num2 = $resultado</h2>";
        } elseif ($operacion == "Multiplicar") {
            $resultado = $num1 * $num2;
            echo "<h2>Resultado: $num1 * $num2 = $resultado</h2>";
        } elseif ($operacion == "Dividir") {
            if ($num2 != 0) {
                $resultado = $num1 / $num2;
                echo "<h2>Resultado: $num1 / $num2 = $resultado</h2>";
            } else {
                echo "<h2 style='color:red;'>Error: No se puede dividir por cero.</h2>";
            }
        }
    }
}
?>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><?php
        $pais = "España";
        $habitantes = "10000";
        $continente = "Europa";

        echo "Pais : ", var_dump($pais) , ",un total de ", var_dump($habitantes) , " habitantes y en ", var_dump($continente);
    ?></p>

    <p><?php
        $radio = 5;
        $pi =pi();

        $longitud = (2 * $pi) * $radio;
        $superficie = $pi * ($radio * $radio);
        $volumen = 4/3 * $pi * ($radio*$radio*$radio);

        $superfice = round($superficie,2);
        $longitud = round($longitud,2);
        $volumen = round($volumen,2);
       
        printf("La salido usando printf :superficie : %.2f  , longitud : %.2f  , volumen : %.2f", "$superficie" , "$longitud", "$volumen");

        echo "<br>Salida usando echo : ", $superfice, "  |  ", $longitud, "   |   ", $volumen;


    ?></p>

    <p><?php
    $a1 = 1;
    $b1 = -5;
    $c1 = 6;
    $solucion;
    $solucion1;
    
    $solucion = (-$b1 + sqrt((($b1*$b1) -4*$a1*$c1)))/2*$a1;
    $solucion1 =(-$b1 - sqrt((($b1*$b1) -4*$a1*$c1)))/2*$a1;

    printf("Solucion 1 = %f , la solucion 2 = %f " ,$solucion, $solucion1);
    echo "<br>";
    echo "Solucion 1 y Solucion 2   =  $solucion   |   $solucion1 ";
    ?></p>

    <p><?php
    $fecha1;


    $fecha = date("Y-m-d");
    echo "hoy es: ".$fecha . '<br>';

    echo "mañana sera:".date("d/m/Y", strtotime($fecha."+1days")).'<br>';

    echo "ayer fue:".date("d/m/Y", strtotime($fecha."-1days"));
    ?></p>

<p><?php
    $ca = "pablo";

    $s = strlen($ca);

    for ( $i = ($s-1); $i >= 0; $i--){
        echo($ca[$i]);
    };
    ?></p>

    <p><?php
        $altura = 5; // Altura de la pirámide
        
        for ($i = 1; $i <= $altura; $i++) {
            for ($j = 1; $j <= $altura - $i; $j++) {
                echo " &nbsp ";
                
            }
            for ($k = 1; $k <= (2 * $i - 1); $k++) {
                echo "*";
                
            }
            echo "<br>";
        }
    ?></p>

    <p><?php
        $altura = 5; // Altura de la pirámide
    
        for ($i = 1; $i <= $altura; $i++) {
            //espacios 
            for ($j = 1; $j <= $altura - $i; $j++) {
                echo " &nbsp ";
            }
            
            // Imprimir los asteriscos
            for ($k = 1; $k <= (2 * $i - 1); $k++) {
                //bordes y la base
                if ($k == 1 || $k == (2 * $i - 1) || $i == $altura) {
                    echo "*";
                } else {
                    echo "&nbsp;&nbsp;";
                }
            }
            echo "<br>";
        }
    ?></p>
    <p><?php
        $dado1 = rand(1, 6);
        $dado2 = rand(1, 6); 

        echo "Tirada de los dados: $dado1 y $dado2\n";

        if ($dado1 == $dado2) {
            echo "¡Has sacado una pareja de valores iguales!\n";
        }

        echo "El mayor valor es: " . max($dado1, $dado2) . "\n";
    ?></p>
    <p><?php
        echo "<table border='1' cellpadding='10'>";
        echo "<tr><th>Decimal</th><th>Binario</th><th>Octal</th><th>Hexadecimal</th></tr>";

        for ($i = 1; $i <= 20; $i++) {
            echo "<tr>";
            printf("<td>%d</td>", $i);                 // Decimal
            printf("<td>%b</td>", $i);                 // Binario
            printf("<td>%o</td>", $i);                 // Octal
            printf("<td>%X</td>", $i);                 // Hexadecimal en mayúscula
            echo "</tr>";
        }

        echo "</table>";
    ?></p>
    <p><?php
        $num1 = (float)$_GET['num1'];
        $num2 = (float)$_GET['num2'];
        $operacion = $_GET['operacion'];

        // Realizar la operación según lo solicitado
        switch ($operacion) {
            case 'suma':
                $resultado = $num1 + $num2;
                echo"El resultado de la suma es: $resultado";
                break;
            case 'resta':
                $resultado = $num1 - $num2;
                echo "El resultado de la resta es: $resultado";
                break;
            case 'multiplicacion':
                $resultado = $num1 * $num2;
                echo "El resultado de la multiplicación es: $resultado";
                break;
            case 'division':
                if ($num2 != 0) {
                    $resultado = $num1 / $num2;
                    echo "El resultado de la división es: $resultado";
                } else {
                    echo "Error: No se puede dividir por cero.";
                }
                break;
            default:
                echo "Operación no válida. Usa 'suma', 'resta', 'multiplicacion' o 'division'.";
                break;
        }
    ?></p>
    <p><?php
        $num1 = intval($_GET['num1']);
        $num2 = intval($_GET['num2']);

        for ($i = $num1 + 1; $i < $num2; $i++) {
            if ($i % 2 != 0) { 
                echo $i . "<br>";
            }
        }
    ?></p>
    <p><?php

        $longitud = $_GET['longitud'];

        // Asegúrate de que longitud sea un número válido
        if (is_numeric($longitud)) {
            // Imprimir el elemento SVG con la longitud proporcionada
            echo "<svg width='$longitud' height='20'>"; // Altura fija para el SVG
            echo "<line x1='0' y1='10' x2='$longitud' y2='10' stroke='black' stroke-width='2' />";
            echo "</svg>";
        } else {
            echo "Por favor, proporciona una longitud válida.";
        }

    ?><p>


</body>
</html>
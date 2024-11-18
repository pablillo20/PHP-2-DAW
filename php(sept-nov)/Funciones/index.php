<!DOCTYPE html>
 <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<p>
    
    <p><?php
        function factorial ($numero){
            $resultado = 1;
            for ($x = $numero; $x > 0; $x--){
                $resultado = $resultado * $x;
            }
            return $resultado;
        }

        $numero = 5;
        echo "El factorial de $numero es: " . factorial($numero);   

    ?></p>

    <p><?php
        

        function sumar($a, $b) {
            return $a + $b;
        }
        
        function restar($a, $b) {
            return $a - $b;
        }
        
        function multiplicar($a, $b) {
            return $a * $b;
        }
        
        function dividir($a, $b) {
            if ($b == 0) {
                return "Error: División por cero.";
            }
            return $a / $b;
        }
        
        function calculador($num1, $num2, $operacion) {
            switch ($operacion) {
                case '+':
                    return sumar($num1, $num2);
                case '-':
                    return restar($num1, $num2);
                case '*':
                    return multiplicar($num1, $num2);
                case '/':
                    return dividir($num1, $num2);
                default:
                    return "Error: Operación no válida.";
            }
        }
        
        $num1 = filter_input(INPUT_GET, 'num1', FILTER_VALIDATE_FLOAT);
        $num2 = filter_input(INPUT_GET, 'num2', FILTER_VALIDATE_FLOAT);
        $operacion = filter_input(INPUT_GET, 'operacion', FILTER_SANITIZE_STRING);

        // Comprobamos que los valores sean numéricos y la operación válida
        $resultado = (
        is_numeric($num1) && is_numeric($num2) && in_array($operacion, ['+', '-', '*', '/'])
        ) ? calculador($num1, $num2, $operacion) : "Error: Los valores deben ser numéricos y la operación válida (+, -, *, /).";

        // Mostramos el resultado
        echo "El resultado es: " . $resultado;

    ?></p>

    <p><?php

        function comprobarArgumento($arg) {
            if (is_string($arg)) {
            
            if (empty($arg)) {
                return "Este es el relleno porque estaba vacía";
            } else {
                return strtoupper($arg); 
            }
        } else {
            return $arg . " no es una cadena de caracteres";
        }
        }

    echo comprobarArgumento("");          
    echo comprobarArgumento("Hola");     
    echo comprobarArgumento(123);        
    echo comprobarArgumento(null);       
    ?></p>


    <p><?php

        function calcularPotencia($base, $exponente = 2) {
        return pow($base, $exponente); 
        }

    echo calcularPotencia(3);         
    
    ?></p>

    <p><?php

    function fechaHoyEnCastellano() {
        setlocale(LC_TIME, 'ES.UTF-8');
         $fechaActual = strftime("%A, %d de %B de %Y");

        return $fechaActual;
    }

    echo fechaHoyEnCastellano();
    ?></p>

    <p><?php

        function calcularMCD($a, $b) {
            $a = abs($a);
            $b = abs($b);
    
            while ($b != 0) {
                $temp = $b;
                $b = $a % $b; 
                $a = $temp;
            }
    
        return $a; 
    }
    
    echo "El MCD de 48 y 18 es: " . calcularMCD(48, 18) . "\n"; 

    ?></p>

    <p><?php


        if(isset($_GET['numero'])){
            $numero =$_GET['numero'];
        }else{
            echo "Debe intruducir el parametro numero";
            exit;
        }

        $es_primo = true;

        for ($i = 2; $i < $numero; $i++) {
            if ($numero % $i == 0) {
                $es_primo = false;
                break;
            }
        }

        if ($es_primo && $numero > 1) {
            echo "$numero es un número primo";
        } else {
            echo "$numero no es un número primo";
        }


    ?></p>

    <p><?php
        function esMatriculaValida($cadena) {
            // 7 caracteres
            if (strlen($cadena) != 7) {
                return false;
            }


            $numeros = substr($cadena, 0, 4); // primeros 4 caracteres
            $letras = substr($cadena, 4, 3);  // últimos 3 caracteres

            // Verificar que sean números
            if (!ctype_digit($numeros)) {
                return false;
            }

            // Consonantes mayúsculas
            if (!preg_match('/^[BCDFGHJKLMNPRSTVWXYZ]{3}$/', $letras)) {
                return false;
            }


            return true;
        }


        $matricula = "1234BCD";
        if (esMatriculaValida($matricula)) {
            echo "La matrícula es válida.";
        } else {
            echo "La matrícula no es válida.";
        }

    ?></p>

    <p><?php
        function validar_contraseña($contraseña) {
            // Verificar que la longitud esté entre 6 y 15 caracteres
            if (strlen($contraseña) < 6 || strlen($contraseña) > 15) {
                return false;
            }

            // Verificar que contenga al menos un número
            if (!preg_match('/\d/', $contraseña)) {
                return false;
            }

            // Verificar que contenga al menos una letra mayúscula
            if (!preg_match('/[A-Z]/', $contraseña)) {
                return false;
            }

            // Verificar que contenga al menos una letra minúscula
            if (!preg_match('/[a-z]/', $contraseña)) {
                return false;
            }

            // Verificar que contenga al menos un carácter no alfanumérico
            if (!preg_match('/\W/', $contraseña)) {
                return false;
            }

            // Si pasa todas las validaciones, es una contraseña válida
            return true;
        }

        $contraseña = "Contraseña1!";
        if (validar_contraseña($contraseña)) {
            echo "Contraseña válida.";
        } else {
            echo "Contraseña no válida.";
        }
    ?></p>
















</body>
</html>
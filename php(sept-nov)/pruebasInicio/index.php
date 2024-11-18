<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hola Mundo</title>
</head>
<body>
    <p><?php echo "prueba con echo"?></p>
    <p><?="Esto es un tag"?></p>
    <p><?php print("Esto es un print")?></p>
    <p><?php
        $variable =33;
        echo gettype($variable);
    ?></p>

    <p><?php
        $a = 5;
        $b = $a;
        echo "valor de a : ", $a," valor de b : ", $b;

        $c = &$a;
        echo " valor de c : ", $c;
        $c = 7;
        echo "echo valor de a : ", $a," valor de b : ", $b, " valor de c :", $c;
        $a = 8;
        echo "echo valor de a : ", $a," valor de b : ", $b, " valor de c :", $c;
    ?></p>

    <p><?php
        $a = "hola";
        $$a = "mundo";
        echo "$a $hola";
    ?></p>
    <p><?php
        $a = 10;
        printf("La salido usando printf : %f", "$a");    
    ?></p>


    <p><?php
        echo "\n--- DESPLAZAMIENTO DE BITS A LA DERECHA SOBRE ENTEROS POSITIVOS ---\n";

        $val = 4;
        $places = 1;
        $res = $val >> $places;
        echo "dezplazar numero 4 en binario 1 posicion es  = ", $res;
    
    ?></p>

    <p><?php
        $listado_archivos = "ls -l"; // Listado de todos los archivos del directorio actual
        echo "<pre>$listado_archivos<pre>"; // Se muestra en pantalla
    ?></p>

    <p><?php
        // Si la variable no existe o es igual a null sale el mensaje de las interogaciones
        $variable = null;
        echo $variable ?? 'No existe';
    ?></p>

    
</body> 
</html>
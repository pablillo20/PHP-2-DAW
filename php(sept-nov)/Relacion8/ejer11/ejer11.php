<?php
// Iniciar la sesión
session_start();

// Comprobar si existe una variable de sesión llamada 'contador'. Si no existe, inicializarla
if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 0;
}

// Verificar si se ha pasado el parámetro 'accion' por GET
if (isset($_GET['accion'])) {
    $accion = (int) $_GET['accion']; // Obtener el valor de 'accion' y convertirlo a entero

    // Si 'accion' es 1, incrementar el contador
    if ($accion == 1) {
        $_SESSION['contador']++;
    }
    // Si 'accion' es 0, decrementar el contador
    elseif ($accion == 0) {
        $_SESSION['contador']--;
    }
}

// Mostrar el valor actual de 'contador'
echo "Valor actual del contador: " . $_SESSION['contador'];
?>

<!-- Enlace para incrementar o decrementar el contador -->
<p><a href="?accion=1">Incrementar contador</a></p>
<p><a href="?accion=0">Decrementar contador</a></p>

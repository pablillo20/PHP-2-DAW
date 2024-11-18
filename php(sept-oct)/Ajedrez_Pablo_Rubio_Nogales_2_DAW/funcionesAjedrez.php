<?php
// Piezas Blancas
$PiezasBlancas = ['torreb.png', 'caballob.png', 'alfilb.png', 'reinab.png', 'reyb.png', 'alfilb.png', 'caballob.png', 'torreb.png'];

// Piezas Negras
$PiezasNegras = ['torren.png', 'caballon.png', 'alfiln.png', 'reinan.png', 'reyn.png', 'alfiln.png', 'caballon.png', 'torren.png'];

// Peones Blancos
$PeonesBlancos = ['peon-blanco.png', 'peon-blanco.png', 'peon-blanco.png', 'peon-blanco.png', 'peon-blanco.png', 'peon-blanco.png', 'peon-blanco.png', 'peon-blanco.png'];

// Peones Negros
$PeonesNegros = ['peon-negro.png', 'peon-negro.png', 'peon-negro.png', 'peon-negro.png', 'peon-negro.png', 'peon-negro.png', 'peon-negro.png', 'peon-negro.png'];

// Función para elegir el color de cada celda
function colorCelda($fila, $columna) {
    if (($fila + $columna) % 2 == 0) {
        return 'blanca';
    } else {
        return 'gris';
    }
}


// Función para dibujar el tablero
function dibujarTablero() {
    // Variables globales
    global $PiezasNegras, $PeonesNegros, $PiezasBlancas, $PeonesBlancos;

    // Creamos el tablero con las piezas en las posiciones iniciales
    $tablero = array(
        $PiezasNegras,      // Fila 0: Piezas Negras
        $PeonesNegros,      // Fila 1: Peones Negros
        array('', '', '', '', '', '', '', ''), // Fila 2: Vacía
        array('', '', '', '', '', '', '', ''), // Fila 3: Vacía
        array('', '', '', '', '', '', '', ''), // Fila 4: Vacía
        array('', '', '', '', '', '', '', ''), // Fila 5: Vacía
        $PeonesBlancos,     // Fila 6: Peones Blancos
        $PiezasBlancas      // Fila 7: Piezas Blancas
    );

    // Dibujar la tabla HTML
    echo '<table>';
    for ($fila = 0; $fila < 8; $fila++) {
        echo '<tr>';
        for ($columna = 0; $columna < 8; $columna++) {
            $color = colorCelda($fila, $columna);
            echo '<td class="' . $color . '">';
            if ($tablero[$fila][$columna] != '') {
                $pieza = $tablero[$fila][$columna];
                echo '<img src="' . $pieza . '">';
            }
            echo '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}
?>

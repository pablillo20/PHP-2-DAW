<?php
class Perro {
    private $tamaño;
    private $raza;
    private $color;
    private $nombre;

    public function __construct($tamaño, $raza, $color, $nombre) {
        $this->set_tamaño($tamaño);
        $this->set_raza($raza);
        $this->set_color($color);
        $this->set_nombre($nombre);
    }

    public function mostrar_propiedades() {
        echo "El tamaño del perro es {$this->tamaño}, su color es {$this->color}, su raza es {$this->raza} y su nombre es: {$this->nombre}.<br>";
    }

    public function speak() {
        echo "{$this->nombre} dice: Guau, guau!<br>";
    }

    public function get_tamaño() {
        return $this->tamaño;
    }

    public function set_tamaño($tamaño) {
        if (is_string($tamaño) && strlen($tamaño) <= 21) {
            $this->tamaño = $tamaño;
            return true;
        } else {
            echo "Error: El tamaño debe ser una cadena de texto y no exceder los 21 caracteres.<br>";
            return false;
        }
    }

    public function get_raza() {
        return $this->raza;
    }

    public function set_raza($raza) {
        if (is_string($raza) && strlen($raza) <= 21) {
            $this->raza = $raza;
            return true;
        } else {
            echo "Error: La raza debe ser una cadena de texto y no exceder los 21 caracteres.<br>";
            return false;
        }
    }

    public function get_color() {
        return $this->color;
    }

    public function set_color($color) {
        if (is_string($color) && strlen($color) <= 21) {
            $this->color = $color;
            return true;
        } else {
            echo "Error: El color debe ser una cadena de texto y no exceder los 21 caracteres.<br>";
            return false;
        }
    }

    public function get_nombre() {
        return $this->nombre;
    }

    public function set_nombre($nombre) {
        if (is_string($nombre) && strlen($nombre) <= 21) {
            $this->nombre = $nombre;
            return true;
        } else {
            echo "Error: El nombre debe ser una cadena de texto y no exceder los 21 caracteres.<br>";
            return false;
        }
    }
}

try {
    $labrador = new Perro("Grande", "Labrador", "Marrón", "Max");
    $labrador->mostrar_propiedades();
    $labrador->speak();

    $caniche = new Perro("Pequeño", "Caniche", "Blanco", "Bella");
    $caniche->mostrar_propiedades();
    $caniche->speak();

    $perro_error_message = $labrador->set_nombre('Luna');
    echo $perro_error_message ? 'Nombre actualizado correctamente' : 'Nombre no modificado';
    echo "<br>";

} catch (Exception $e) {
    echo "Error al procesar el archivo: " . $e->getMessage() . "<br>";
}
?>


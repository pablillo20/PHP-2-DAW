<?php

// Clase base Animal
class Animal {
    protected $nombre;
    protected $edad;

    public function __construct($nombre, $edad) {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    public function saludo() {
        return "Hola, soy un animal llamado $this->nombre y tengo $this->edad años.";
    }
}

// Clase Caballo hereda de Animal
class Caballo extends Animal {
    private $raza;

    public function __construct($nombre, $edad, $raza) {
        parent::__construct($nombre, $edad);
        $this->raza = $raza;
    }

    public function raza() {
        return "Soy de la raza $this->raza.";
    }
}

// Clase Oveja hereda de Animal
class Oveja extends Animal {
    private $tipoLana;

    public function __construct($nombre, $edad, $tipoLana) {
        parent::__construct($nombre, $edad);
        $this->tipoLana = $tipoLana;
    }

    public function tipoDeLana() {
        return "Mi lana es de tipo $this->tipoLana.";
    }
}

// Ejemplo de uso
$caballo = new Caballo("Spirit", 5, "Pura Sangre");
echo $caballo->saludo();

echo $caballo->raza();



$oveja = new Oveja("Dolly", 3, "Merina");
echo $oveja->saludo();
echo "\n";
echo $oveja->tipoDeLana();

?>


<?php

// Incluyendo la definición de la clase Coche
class Coche {
    private $color;
    private $marca;
    private $modelo;
    private $velocidad;
    private $caballos;
    private $plazas;

    // Constructor php 7
    public function __CONSTRUCT(string $color,string $marca,string $modelo,int $velocidad, int $caballos, int $plazas) {
        $this->color = $color;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->velocidad = $velocidad;
        $this->caballos = $caballos;
        $this->plazas = $plazas;
    }
    // Constructor php 8
/*    public function __CONSTRUCT(
        private string $color,
        private string $marca,
        private string $modelo,
        private int $velocidad,
        private int $caballos,
        private int $plazas
    ) {}
}*/

    // Métodos getters y setters...

    public function getColor(): string {
        return $this->color;
    }

    public function setColor(string $color) {
        $this->color = $color;
    }

    public function getMarca(): string {
        return $this->marca;
    }

    public function setMarca(string $marca) {
        $this->marca = $marca;
    }

    public function getModelo(): string {
        return $this->modelo;
    }

    public function setModelo(string $modelo) {
        $this->modelo = $modelo;
    }

    public function getVelocidad(): int {
        return $this->velocidad;
    }

    public function setVelocidad(int $velocidad) {
        $this->velocidad = $velocidad;
    }

    public function getCaballos(): int {
        return $this->caballos;
    }

    public function setCaballos(int $caballos) {
        $this->caballos = $caballos;
    }

    public function getPlazas(): int {
        return $this->plazas;
    }

    public function setPlazas(int $plazas) {
        $this->plazas = $plazas;
    }

    public function frenar() {
        $this->velocidad--;
    }

    public function acelerar() {
        $this->velocidad++;
    }
}

$coche = new Coche("rojo","ferrari","aventador",300,500,2);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Datos del Coche</title>
</head>
<body>

<h1>Datos del Coche</h1>
<ul>
    <li><strong>Marca:</strong> <?php echo $coche->getMarca(); ?></li>
    <li><strong>Modelo:</strong> <?php echo $coche->getModelo(); ?></li>
    <li><strong>Color:</strong> <?php echo $coche->getColor(); ?></li>
    <li><strong>Velocidad:</strong> <?php echo $coche->getVelocidad(); ?> km/h</li>
    <li><strong>Caballos de fuerza:</strong> <?php echo $coche->getCaballos(); ?></li>
    <li><strong>Número de plazas:</strong> <?php echo $coche->getPlazas(); ?></li>
</ul>

</body>
</html>

<?php

namespace Lib;
use MySQLi;
class DataBase{
    private MySQLi $conexion;
    public function __construct(
        private string $servidor,
        private string $usuario,
        private string $pass,
        private string $baseDatos)
    {
        $this->conexion = $this->conectar();

    }

    private function conectar(): MySQLi{
        $conexion = new mysqli($this->servidor, $this->usuario, $this->pass, $this->baseDatos);
        if ($conexion ->connect_error) {
            die("Error en la conexion base de datos: ".$conexion->connect_error);
        }
        return $conexion;
    }
}
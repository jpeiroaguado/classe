<?php
// Definir la interfaz Vehiculo
interface Vehiculo {
    public function obtenerDetalles();
    public function encender();
}

// Clase Coche que implementa la interfaz Vehiculo
class Coche implements Vehiculo {
    private $marca;
    private $modelo;

    public function __construct($marca, $modelo) {
        $this->marca = $marca;
        $this->modelo = $modelo;
    }

    public function obtenerDetalles() {
        return "Coche - Marca: " . $this->marca . ", Modelo: " . $this->modelo;
    }

    public function encender() {
        return "El coche está encendido.";
    }
}

// Clase Moto que implementa la interfaz Vehiculo
class Moto implements Vehiculo {
    private $marca;
    private $modelo;

    public function __construct($marca, $modelo) {
        $this->marca = $marca;
        $this->modelo = $modelo;
    }

    public function obtenerDetalles() {
        return "Moto - Marca: " . $this->marca . ", Modelo: " . $this->modelo;
    }

    public function encender() {
        return "La moto está encendida.";
    }
}

// Crear instancias de Coche y Moto
$coche = new Coche("Ford", "Mustang");
$moto = new Moto("Kawasaki", "Ninja");

// Mostrar detalles y encender los vehículos
echo $coche->obtenerDetalles() . "<br>";
echo $coche->encender() . "<br>";
echo $moto->obtenerDetalles() . "<br>";
echo $moto->encender();
?>

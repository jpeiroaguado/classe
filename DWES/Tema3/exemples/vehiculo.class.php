<?php
class Vehiculo {
    public static $tipo = "Automóvil"; // Propiedad estática

    public static function obtenerTipo() {
        return self::$tipo;
    }

    public $marca;

    public function __construct($marca) {
        $this->marca = $marca; // Asignar valor a la propiedad de instancia
    }

    public function mostrarMarca() {
        return "La marca del vehículo es " . $this->marca; // Usar -> para acceder a la propiedad de instancia
    }
}

// Acceder a método y propiedad estática
echo "Tipo de vehículo: " . Vehiculo::obtenerTipo() . "<br>";

// Crear una instancia de Vehiculo
$miVehiculo = new Vehiculo("Toyota");
echo $miVehiculo->mostrarMarca(); // Acceder al método de instancia

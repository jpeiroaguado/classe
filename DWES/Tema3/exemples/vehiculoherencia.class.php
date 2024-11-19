<?php
// Clase base
class Vehiculo {
    public $marca;
    public $modelo;

    public function __construct($marca, $modelo) {
        $this->marca = $marca;
        $this->modelo = $modelo;
    }

    public function mostrarDetalles() {
        return "Marca: " . $this->marca . ", Modelo: " . $this->modelo;
    }
}

// Clase derivada Coche
class Coche extends Vehiculo {
    public $numeroPuertas;

    public function __construct($marca, $modelo, $numeroPuertas) {
        parent::__construct($marca, $modelo); // Llamar al constructor de la clase padre
        $this->numeroPuertas = $numeroPuertas;
    }

    public function mostrarDetalles() {
        return parent::mostrarDetalles() . ", Número de puertas: " . $this->numeroPuertas; // Llamar al método de la clase padre
    }
}

// Clase derivada Moto
class Moto extends Vehiculo {
    public $tipo;

    public function __construct($marca, $modelo, $tipo) {
        parent::__construct($marca, $modelo); // Llamar al constructor de la clase padre
        $this->tipo = $tipo;
    }

    public function mostrarDetalles() {
        return parent::mostrarDetalles() . ", Tipo: " . $this->tipo; // Llamar al método de la clase padre
    }
}

// Crear instancias de las clases derivadas
$coche = new Coche("Toyota", "Corolla", 4);
$moto = new Moto("Yamaha", "MT-07", "Deportiva");

// Mostrar detalles de los vehículos
echo $coche->mostrarDetalles() . "<br>";
echo $moto->mostrarDetalles();
?>

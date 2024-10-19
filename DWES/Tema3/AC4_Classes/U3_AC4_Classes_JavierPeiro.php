<?php
class CuentaBancaria {
    private $usuari;
    private $pin;
    private $entrades=[];
    private $eixides=[];
    private $saldo;

    public function __construct($usuari, $pin) {
        $this->usuari = $usuari;
        $this->pin = $pin;
        $this->entrades = [];
        $this->eixides = [];
        $this->saldo = 0;
    }

    public function canviaPin($nou_pin) {
        $this->pin = $nou_pin;
    }

    public function validaUsuario($usuari, $pin) {
        if($this->usuari==$usuari && $this->pin==$pin){
            return true;
        }
        else{
            return false;
        }        
    }

    public function ingressar($cantitat) { 
            $this->entrades[] = $cantitat;
            $this->saldo += $cantitat;
    }

    public function traure($cantitat) {
        if($cantitat<=$this->saldo){
            $this->eixides[]=$cantitat;
            $this->saldo-=$cantitat;
            return true;
        } else {
            return false;
        }
    }

    public function getSaldo() {
        return $this->saldo;
    }

    public function getEntradas() {
        return implode(', ', $this->entrades);
    }

    public function getSalidas() {
        return implode(', ', $this->eixides);
    }
}

$compte = new CuentaBancaria("Eloy", "1234");
$compte->ingressar(100);
$compte->ingressar(500);
$compte->traure(50);
$compte->traure(25);

echo "Saldo: " . $compte->getSaldo() . "<br>";
echo "Entrades: " .$compte->getEntradas()."<br>"; 
echo "Eixides: " .$compte->getSalidas(). "<br>"; 
?>
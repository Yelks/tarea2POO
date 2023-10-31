<? 

class Camion {
    private $numEjes;
    private $tonelaje;

    public function __construct($numEjes, $tonelaje) {
        $this->numEjes = $numEjes;
        $this->tonelaje = $tonelaje;
    }

    public function calcularPeaje() {
        $precioPorEje = 5;
        $precioPorTonelada = 10;

        $peaje = ($this->numEjes * $precioPorEje) + ($this->tonelaje * $precioPorTonelada);

        return $peaje;
    }

    public function getNumEjes() {
        return $this->numEjes;
    }

    public function getTonelaje() {
        return $this->tonelaje;
    }
}

class CabinaPeaje {
    private $totalRecaudado = 0;
    private $totalCamionesPasados = 0;

    public function cobrarPeaje(Camion $camion) {
        $peaje = $camion->calcularPeaje();
        $this->totalRecaudado += $peaje;
        $this->totalCamionesPasados++;

        echo "Se ha cobrado un peaje de €{$peaje} al camión con {$camion->getNumEjes()} ejes y un tonelaje de {$camion->getTonelaje()} toneladas.<br>";
        echo "Recaudación total: €{$this->totalRecaudado}<br>";
        echo "Número total de camiones que han pasado: {$this->totalCamionesPasados}<br>";
    }
}

// Ejemplo de uso
$camion1 = new Camion(4, 8);
$camion2 = new Camion(6, 12);

$cabinaPeaje = new CabinaPeaje();

$cabinaPeaje->cobrarPeaje($camion1);
$cabinaPeaje->cobrarPeaje($camion2);


?>
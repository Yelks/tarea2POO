<?php

interface CapacidadLimite {
    const LIMITE_PASAJEROS_AUTO = 5;
    const LIMITE_PASAJEROS_FURGONETA = 9;
}

class VehiculoMotorizado {
    protected $fabricante;
    protected $modelo;
    protected $anioFabricacion;
    protected $kilometraje;

    public function __construct($fabricante, $modelo, $anioFabricacion, $kilometraje) {
        $this->fabricante = $fabricante;
        $this->modelo = $modelo;
        $this->anioFabricacion = $anioFabricacion;
        $this->kilometraje = $kilometraje;
    }

    public function __toString() {
        return "Fabricante: {$this->fabricante}\nModelo: {$this->modelo}\nAño de Fabricación: {$this->anioFabricacion}\nKilometraje: {$this->kilometraje} km";
    }
}

class Motocicleta extends VehiculoMotorizado {
    private $usoDeterminado;

    public function __construct($fabricante, $modelo, $anioFabricacion, $kilometraje, $usoDeterminado) {
        parent::__construct($fabricante, $modelo, $anioFabricacion, $kilometraje);
        $this->usoDeterminado = $usoDeterminado;
    }

    public function __toString() {
        return parent::__toString() . "\nUso Determinado: {$this->usoDeterminado}";
    }
}

class Automovil extends VehiculoMotorizado implements CapacidadLimite {
    private $estilo;

    public function __construct($fabricante, $modelo, $anioFabricacion, $kilometraje, $estilo) {
        parent::__construct($fabricante, $modelo, $anioFabricacion, $kilometraje);
        $this->estilo = $estilo;
    }

    public function __toString() {
        return parent::__toString() . "\nEstilo: {$this->estilo}\nLímite de Pasajeros: " . self::LIMITE_PASAJEROS_AUTO;
    }
}

class Camion extends VehiculoMotorizado implements CapacidadLimite {
    private $remolques;
    private $nivelSeguridad;

    public function __construct($fabricante, $modelo, $anioFabricacion, $kilometraje, $remolques, $nivelSeguridad) {
        parent::__construct($fabricante, $modelo, $anioFabricacion, $kilometraje);
        $this->remolques = $remolques;
        $this->nivelSeguridad = $nivelSeguridad;
    }

    public function __toString() {
        return parent::__toString() . "\nRemolques: {$this->remolques}\nNivel de Seguridad: " . ($this->nivelSeguridad ? "Alto" : "Bajo") . "\nLímite de Pasajeros: " . self::LIMITE_PASAJEROS_AUTO;
    }
}

// Programa principal
echo "Seleccione el tipo de vehículo (1 = Motocicleta, 2 = Automóvil, 3 = Camión): ";
$opcion = readline();

if ($opcion == 1) {
    $motocicleta = new Motocicleta("Honda", "CBR500R", 2022, 3000, "Deportiva");
    echo $motocicleta;
} elseif ($opcion == 2) {
    $automovil = new Automovil("Toyota", "Camry", 2023, 1500, "Sedán");
    echo $automovil;
} elseif ($opcion == 3) {
    $camion = new Camion("Volvo", "VNL", 2020, 50000, 2, true);
    echo $camion;
} else {
    echo "Opción no válida.";
}

?>
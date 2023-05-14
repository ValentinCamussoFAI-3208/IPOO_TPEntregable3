<?php
include_once 'Pasajero.php';

class PasajeroEspecial extends Pasajero {
    // Atributos
    private $cantServicios;
    // Método constructor
    public function __construct($nombre, $apellido, $nDocumento, $telefono, $cantServicios) {
        parent::__construct($nombre, $apellido, $nDocumento, $telefono);
        $this->cantServicios = $cantServicios;
    }
    // Métodos set
    public function setCantServicios($cantServicios) {
        $this->cantServicios = $cantServicios;
    }
    // Métodos get
    public function getCantServicios() {
        return $this->cantServicios;
    }
    /** Retorna el porcentaje que debe aplicarse como incremento según las características del pasajero
     * @return INT */
    public function darPorcentajeIncremento() {
        $incremento = 15;
        if ($this->getCantServicios() > 1) {
            $incremento = 30;
        }
        return $incremento;
    }
}
?>
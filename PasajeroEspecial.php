<?php
include_once 'Pasajero.php';

class PasajeroEspecial extends Pasajero {
    // Atributos
    private $cantServicios;
    // Método constructor
    public function __construct($nombre, $apellido, $nDocumento, $telefono, $nAsiento, $nTicketPasaje, $cantServicios) {
        parent::__construct($nombre, $apellido, $nDocumento, $nAsiento, $nTicketPasaje, $telefono);
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
    // Método toString
    public function __toString() {
        $salida = parent::__toString();
        $salida .= "Cantidad de servicios que necesita: " . $this->getCantServicios() . "\n";
        return $salida;
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
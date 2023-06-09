<?php
include_once 'Pasajero.php';

class PasajeroVIP extends Pasajero {
    // Atributos
    private $nViajeroFrecuente;
    private $millas;
    // Método constructor
    public function __construct($nombre, $apellido, $nDocumento, $telefono,$nAsiento, $nTicketPasaje, $nViajeroFrecuente, $millas) {
        parent::__construct($nombre, $apellido, $nDocumento, $telefono, $nAsiento, $nTicketPasaje);
        $this->nViajeroFrecuente = $nViajeroFrecuente;
        $this->millas = $millas;
    }
    // Métodos set
    public function setNViajeroFrecuente($nViajeroFrecuente) {
        $this->nViajeroFrecuente = $nViajeroFrecuente;
    }
    public function setMillas($millas) {
        $this->millas = $millas;
    }
    // Métodos get
    public function getNViajeroFrecuente() {
        return $this->nViajeroFrecuente;
    }
    public function getMillas() {
        return $this->millas;
    }
    // Método toString
    public function __toString() {
        $salida = parent::__toString();
        $salida .= "Número de viajero frecuente: " . $this->getNViajeroFrecuente() . "\n";
        $salida .= "Cantidad de millas acumuladas: " . $this->getMillas() . "\n";
        return $salida;
    }
    /** Retorna el porcentaje que debe aplicarse como incremento según las características del pasajero
     * @return INT */
    public function darPorcentajeIncremento() {
        $incremento = 35;
        // Supuse que si el pasajero tiene más de 300 millas el incremento es de 30, no 35+30 (no se entiende bien la consigna)
        if ($this->getMillas() > 300) {
            $incremento = 30;
        }
        return $incremento;
    }
}
?>
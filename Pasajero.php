<?php

class Pasajero {
    // Atributos
    private $nombre;
    private $apellido;
    private $nDocumento;
    private $telefono;
    private $nAsiento;
    private $nTicketPasaje;
    // Método constructor
    public function __construct($nombre, $apellido, $nDocumento, $telefono, $nAsiento, $nTicketPasaje) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->nDocumento = $nDocumento;
        $this->telefono = $telefono;
        $this->nAsiento  = $nAsiento;
        $this->nTicketPasaje  = $nTicketPasaje;
    }
    // Métodos set
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }
    public function setNDocumento($nDocumento) {
        $this->nDocumento = $nDocumento;
    }
    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
    public function setNAsiento($nAsiento) {
        $this->nAsiento = $nAsiento;
    }
    public function setNTicketPasaje($nTicketPasaje) {
        $this->nTicketPasaje = $nTicketPasaje;
    }
    // Métodos get
    public function getNombre() {
        return $this->nombre;
    }
    public function getApellido() {
        return $this->apellido;
    }
    public function getNDocumento() {
        return $this->nDocumento;
    }
    public function getTelefono() {
        return $this->telefono;
    }
    public function getNAsiento() {
        return $this->nAsiento;
    }
    public function getNTicketPasaje() {
        return $this->nTicketPasaje;
    }
    /** Método toString, Devuelve una cadena de caracteres con la información de un pasajero
     * @return STRING
     */
    public function __toString() {
        $salida = "Nombre: " . $this->getNombre() . "\n";
        $salida .= "Apellido: " . $this->getApellido() . "\n";
        $salida .= "Número de documento: " . $this->getNDocumento() . "\n";
        $salida .= "Número de teléfono: " . $this->getTelefono() . "\n";
        $salida .= "Número de asiento: " . $this->getNAsiento() . "\n";
        $salida .= "Número de ticket del pasaje del viaje: " . $this->getNTicketPasaje() . "\n";
        return $salida;
    }
    /** Retorna el porcentaje que debe aplicarse como incremento según las características del pasajero
     * @return INT */
    public function darPorcentajeIncremento() {
        return 10;
    }
}
?>
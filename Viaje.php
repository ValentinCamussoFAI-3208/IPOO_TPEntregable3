<?php

class Viaje {
    // Atributos
    private $codigo;
    private $destino;
    private $maxPasajeros;
    private $pasajeros = array();
    private $cantidadPasajeros;
    private $responsable;

    // Método constructor
    public function __construct($codigoViaje, $destinoViaje, $maxPasajerosViaje, $pasajerosViaje, $cantidadPasajerosViaje , $responsableViaje) {
        $this->codigo = $codigoViaje;
        $this->destino = $destinoViaje;
        $this->maxPasajeros = $maxPasajerosViaje;
        $this->pasajeros = $pasajerosViaje;
        $this->cantidadPasajeros = $cantidadPasajerosViaje;
        $this->responsable = $responsableViaje;
    }
    // Métodos set
    public function setCodigo($codigoViaje) {
        $this->codigo = $codigoViaje;
    }
    public function setDestino($destinoViaje) {
        $this->destino = $destinoViaje;
    }
    public function setMaxPasajeros($maxPasajerosViaje) {
        $this->maxPasajeros = $maxPasajerosViaje;
    }
    public function setPasajeros($pasajerosViaje) {
        $this->pasajeros = $pasajerosViaje;
    }
    public function setCantidadPasajeros($cantidadPasajerosViaje) {
        $this->cantidadPasajeros = $cantidadPasajerosViaje;
    }
    public function setResponsable($responsableViaje) {
        $this->responsable = $responsableViaje;
    }
    // Métodos get
    public function getCodigo() {
        return $this->codigo;
    }
    public function getDestino() {
        return $this->destino;
    }
    public function getMaxPasajeros() {
        return $this->maxPasajeros;
    }
    public function getPasajeros() {
        return $this->pasajeros;
    }
    public function getCantidadPasajeros() {
        return $this->cantidadPasajeros;
    }
    public function getResponsable() {
        return $this->responsable;
    }

    /** Esta función agrega a un pasajero dado al array de pasajeros.
     * @param STRING $nombre
     * @param STRING $apellido
     * @param INT $documento
     * @return BOOLEAN
     */
    public function agregarPasajero($pasajero) {
        $pasajerosAux = $this->getPasajeros();
        $pasajerosActuales = $this->getCantidadPasajeros();
        $encontro = false;
        $i = 0;
        // while que verifica si el pasajero ya esta en el arreglo de pasajeros
        while ($i < count($pasajerosAux) && !$encontro) {
            $unPasajero = $pasajerosAux[$i];
            if ($unPasajero->getNDocumento() == $pasajero->getNDocumento()) {
                $encontro = true;
            }
            $i++;
        }
        // Si no encontro al pasajero, agrega los datos del nuevo pasajero
        if ($encontro == false) {
            array_push($this->pasajeros, $pasajero); // Agrega al final los datos del nuevo pasajero
            $pasajerosActuales++;
            $this->setCantidadPasajeros($pasajerosActuales);
        }
        // Se retorna $encontro para hacerle saber al usuario si el pasajero ya esta en el arreglo
        return $encontro;
    }

    /** Esta función elimina a un pasajero dado del array de pasajeros.
     * @param INT $documento
     * @return BOOLEAN
     */
    public function eliminarPasajero($documento) {
        $pasajerosAux = $this->getPasajeros();
        $pasajerosActuales = $this->getCantidadPasajeros();
        $encontro = false;
        $i = 0;
        // 'While' que busca al pasajero mediante el número de documento
        while ($i < count($pasajerosAux) && !$encontro) {
            $unPasajero = $pasajerosAux[$i];
            // En caso de que encuentre al pasajero, lo elimina
            if ($unPasajero->getNDocumento() == $documento) {
                // Elimina los datos guardados del pasajero
                unset($pasajerosAux[$i]);
                // Acomoda los indices del arreglo
                $pasajerosAux = array_values($pasajerosAux);
                // Modifica el arreglo de pasajeros con el nuevo arreglo sin el pasajero eliminado
                $this->setPasajeros($pasajerosAux);
                // Se le asigna true a $encontro asi se detiene el 'while'
                $encontro = true;
                $pasajerosActuales--;
                $this->setCantidadPasajeros($pasajerosActuales);
            }
            $i++;
        }
        // Se retorna $encontro asi en el programa principal se da a entender al usuario si pudo o no hacerse la eliminación
        return $encontro;
    }

    /** Esta función modifica los datos de un pasajero dado.
     * @param STRING $nombre
     * @param STRING $apellido
     * @param INT $documento
     * @return BOOLEAN
     */
    public function modificarPasajero($nombre, $apellido, $documento, $telefono) {
        $pasajerosAux = $this->getPasajeros();
        $encontro = false;
        $i = 0;
        // 'While' que busca al pasajero mediante el número de documento
        while ($i < count($pasajerosAux) && !$encontro) {
            $unPasajero = $pasajerosAux[$i];
            if ($unPasajero->getNDocumento() == $documento) {
                // Modifica el nombre, apellido y teléfono del pasajero
                $unPasajero->setNombre($nombre);
                $unPasajero->setApellido($apellido);
                $unPasajero->setTelefono($telefono);
                $pasajerosAux[$i] = $unPasajero;
                // Modifica el arreglo de pasajeros con los nuevos datos del pasajero
                $this->setPasajeros($pasajerosAux);
                // Se le asigna true a $encontro asi se detiene el while
                $encontro = true;
            }
            $i++;
        }
        // Se retorna $encontro asi en el programa principal se da a entender al usuario si pudo o no hacerse la modificación
        return $encontro;
    }
    /** Esta función __toString retorna una cadena de texto con la información del viaje
     * @return STRING
     */
    public function __toString() {
        // Se guardan y concatenan los datos del viaje
        $salida = "Código del viaje: " . $this->getCodigo() . "\n";
        $salida .= "Destino del viaje: " . $this->getDestino() . "\n";
        $salida .= "Cantidad de pasajeros máximos del viaje: " . $this->getMaxPasajeros() . "\n";
        $arrayPasajeros = $this->getPasajeros();
        // Cuando $arrayPasajeros no esta vacio, ejecuta el 'for' que concatenan los datos de todos los pasajeros del viaje.
        if (count($arrayPasajeros) != 0) {
            for ($i = 0; $i < count($arrayPasajeros); $i++) {
                $unPasajero = $arrayPasajeros[$i];
                $salida .= "\nPasajero N°" . ($i+1) . "\n";
                $salida .= $unPasajero;
            }
            $salida .=  "\n";
        }
        $salida .= "Cantidad de pasajeros actuales: " . $this->getCantidadPasajeros() . "\n";
        $salida .= "Datos del responsable del viaje:\n";
        $salida .= $this->getResponsable();
        return $salida;
    }
}
?>
<?php
require './Datos/mensajedatos.php';
class MensajeNegocio {
    public function obtenerMensajes($mensajePadreId){
        $mensajedato= new MensajeDatos();
        return $mensajedato->obtenerMensajes($mensajePadreId);
    }
    
    public function guardarMensaje($mensaje){
        $mensajedato= new MensajeDatos();
        return $mensajedato->guardarMensaje($mensaje);
    }
    public function obtenerMuro(){
        return $this->obtenerMensajes(null);
    }
    
}

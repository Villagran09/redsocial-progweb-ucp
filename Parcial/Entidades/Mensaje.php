<?php
class Mensaje {
    private $mensajeId;
   private $mensajePadreId;
   private $contenido;
   private $fecha;
   private $remitenteUsuarioId;
   private $destinatarioUsuarioId;
   private $remitente;
    private $destinatario;
    private $respuestas;
    
    
   public function getMensajeId(){
       return $this->mensajeId;
   }
  
   public function getMensajePadreId() {
      return $this->mensajePadreId;
   }
   public function setMensajePadreId($mensajePadreId) {
      $this->mensajePadreId = $mensajePadreId;
   }
   
   public function getContenido(){
       return $this->contenido;
   }
   public function setContenido($contenido){
       $this->contenido= $contenido;
   }
   
   public function getFecha(){
       return $this->fecha;
   }
   public function setFecha($fecha){
       $this->fecha=$fecha;
   }
   
   public function getRemitenteUsuarioId(){
      return $this->remitenteUsuarioId;
   }
   public function setRemitenteUsuarioId($remitenteUsuarioId){
       $this->remitenteUsuarioId=$remitenteUsuarioId;
   }
   
   public function getDestinatarioUsuarioId(){
       return $this->destinatarioUsuarioId;
   }
   public function setDestinatarioUsuarioId($destinatarioUsuarioId){
       $this->destinatarioUsuarioId=$destinatarioUsuarioId;
   }
   
   public function getRemitente(){
        return $this->remitente;
    }
    public function setRemitente($remitente){
        $this->remitente=$remitente;
    }
    
    public function getDestinatario(){
        return $this->destinatario;
    }
    public function setDestinatario($destinatario){
        $this->destinatario=$destinatario;
    }
   
    public function getRespuestas(){
        return $this->respuestas;
    }
    public function setRespuestas($respuestas){
        $this->respuestas=$respuestas;
    }
    
   public function __construct($mensajeId,$mensajePadreId, $contenido,$fecha,$remitenteUsuarioId,$destinatarioUsuarioId) {
      $this->mensajeId = $mensajeId;
      $this->mensajePadreId = $mensajePadreId;
      $this->contenido = $contenido;
      $this->fecha = $fecha;
      $this->remitenteUsuarioId=$remitenteUsuarioId;
      $this->destinatarioUsuarioId=$destinatarioUsuarioId;
      
   }
}

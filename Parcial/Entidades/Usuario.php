<?php
class Usuario {
    private $usuarioId;
    private $nombreUsuario;
    private $password;
    private $nombre;
    private $apellido;
    private $email;
    


    public function getUsuarioId(){
        return $this->usuarioId;
    }
    
    public function getNombreUsuario(){
        return $this->nombreUsuario;
    }
    public function setNombreUsuario($nombreUsuario){
        $this->nombreUsuario=$nombreUsuario;
    }
    
    public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
        $this->password=$password;
    }
    
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    
    public function getApellido(){
        return $this->apellido;
    }
    public function setApellido($apellido){
        $this->apellido=$apellido;
    }
    
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email=$email;
    }
    
    

    public function __construct($usuarioId,$nombreUsuario, $nombre,$apellido) {
      $this->usuarioId = $usuarioId;
      $this->nombreUsuario = $nombreUsuario;
     
      $this->nombre = $nombre;
      $this->apellido = $apellido;
      
   }
    
}
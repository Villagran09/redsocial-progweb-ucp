<?php
require './Datos/UsuarioDatos.php';
class UsuarioNegocio {
    public function obtenerUsuarios($usuarioId){
        $usuariodato= new UsuarioDatos();
        return $usuariodato->obtenerUsuarios($usuarioId);
    }
    
    public function obtenerUsuarioPorNombre($nombre){
        $nombre=$_SESSION['k_username'];
        $usuariodato= new UsuarioDatos();
        return $usuariodato->obtenerUsuarioPorNombre($nombre);
    }
    
}

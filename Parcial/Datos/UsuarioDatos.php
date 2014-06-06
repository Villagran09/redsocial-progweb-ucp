<?php
require './Datos/conexion.php';
require './Entidades/Usuario.php';
class UsuarioDatos {
    public function obtenerUsuarios($usuarioId){
        $conec= new conexion();
        
        $consulta=$conec->prepare('SELECT usuarioId, nombreUsuario, nombre, apellido  '
                                 . ' FROM usuario '
                                 . ' WHERE usuarioId="'.$usuarioId->getUsuarioId().'"');
        $consulta->execute();
        $registros= $consulta->fetchAll();
        
        $userListado= new ArrayObject(array());
        foreach ($registros as $row) {
            $usuarioId=$row['usuarioId'];
            $nombreUsuario=$row['nombreUsuario'];
            $nombre=$row['nombre'];
            $apellido=$row['apellido'];   
                    
            $user= new Usuario($usuarioId, $nombreUsuario, $nombre, $apellido);
            
            $userListado->append($user);
        }
        
        return $userListado;
    }
    //obtener nombre
    public function obtenerUsuarioPorNombre($nombre){
        $conec= new conexion();
        
        $consulta=$conec->prepare('SELECT usuarioId, nombreUsuario, nombre, apellido '
                                 . ' FROM usuario '
                                 . ' WHERE nombre="'.$nombre->getNombre().'"');
        $consulta->execute();
        $registros= $consulta->fetchAll();
        
        $userListado= new ArrayObject(array());
        foreach ($registros as $row) {
            $usuarioId=$row['usuarioId'];
            $nombreUsuario=$row['nombreUsuario'];
            $nombre=$row['nombre'];
            $apellido=$row['apellido'];   
                    
            $user= new Usuario($usuarioId, $nombreUsuario, $nombre, $apellido);
            
            $userListado->append($user);
        }
        
        return $userListado;
    }
    
    //obter todos
    public function obtenerUsuariosCompletos(){
        $conec= new conexion();
        
        $consulta=$conec->prepare('SELECT usuarioId, nombreUsuario, nombre, apellido FROM usuario');
        $consulta->execute();
        $registros= $consulta->fetchAll();
        
        $userListado= new ArrayObject(array());
        foreach ($registros as $row) {
            $usuarioId=$row['usuarioId'];
            $nombreUsuario=$row['nombreUsuario'];
            $nombre=$row['nombre'];
            $apellido=$row['apellido'];   
                    
            $user= new Usuario($usuarioId, $nombreUsuario, $nombre, $apellido);
            
            $userListado->append($user);
        }
        
        return $userListado;
    }
}
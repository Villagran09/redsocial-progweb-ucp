<?php
require './Datos/conexion.php';
require './Entidades/Mensaje.php';
require './Entidades/Usuario.php';
class MensajeDatos{
    public function guardarMensaje($mensaje){
      $conexion = new Conexion(); 
      
      if ($mensaje->getMensajePadreId()==null) {
          $sql = "INSERT INTO mensaje( contenido,fecha,"
              . "remitenteUsuarioId,destinatarioUsuarioId)"
              . "VALUES('".$mensaje->getContenido()."',"
              . "'".$mensaje->getFecha()."',"
              . "".$mensaje->getRemitenteUsuarioId().","
              . "".$mensaje->getDestinatarioUsuarioId().")";
      }  else {
          $sql = "INSERT INTO mensaje(mensajePadreId, contenido,fecha,"
              . "remitenteUsuarioId,destinatarioUsuarioId) "
              . "VALUES(".$mensaje->getMensajePadreId().","
              . "'".$mensaje->getContenido()."',"
              . "'".$mensaje->getFecha()."',"
              . "".$mensaje->getRemitenteUsuarioId().","
              . "".$mensaje->getDestinatarioUsuarioId().")";
      }
      echo($sql);
      $consulta = $conexion->prepare($sql);
      $consulta->execute();
      $conexion = null;

      return TRUE;
    }

    public function obtenerMensajes($mensajePadreId){
         $conec= new conexion();
         
         if ($mensajePadreId == null){
        $consulta=$conec->prepare('SELECT mensajeId,mensajePadreId,contenido, fecha, remitenteUsuarioId,destinatarioUsuarioId, '
                                    . 'R.apellido as remitenteApellido,'
                                    . 'R.nombre as remitenteNombre,'
                                    . 'R.nombreUsuario as remitenteNombreUsuario,'
                                    . 'D.apellido as destinatarioApellido,'
                                    . 'D.nombre as destinatarioNombre,'
                                    . 'D.nombreUsuario as destinatarioNombreUsuario '
                                    . 'FROM mensaje as M '
                                    . 'INNER JOIN usuario as R '
                                        . 'ON M.remitenteUsuarioId= R.usuarioId '
                                    . 'INNER JOIN usuario as D '
                                        . 'ON M.destinatarioUsuarioId= D.usuarioId '
                                    . 'WHERE mensajePadreId IS NULL '
                                    . 'ORDER BY M.fecha DESC');
        }
        else {
            $consulta=$conec->prepare('SELECT mensajeId,mensajePadreId,contenido, fecha, remitenteUsuarioId,destinatarioUsuarioId, '
                                    . 'R.apellido as remitenteApellido,'
                                    . 'R.nombre as remitenteNombre,'
                                    . 'R.nombreUsuario as remitenteNombreUsuario,'
                                    . 'D.apellido as destinatarioApellido,'
                                    . 'D.nombre as destinatarioNombre,'
                                    . 'D.nombreUsuario as destinatarioNombreUsuario '
                                    . 'FROM mensaje as M '
                                    . 'INNER JOIN usuario as R '
                                        . 'ON M.remitenteUsuarioId= R.usuarioId '
                                    . 'INNER JOIN usuario as D '
                                        . 'ON M.destinatarioUsuarioId= D.usuarioId '
                                    . 'WHERE mensajePadreId= '.$mensajePadreId
                                    . ' ORDER BY M.fecha');
            
        }
        $consulta->execute();
        $registro= $consulta->fetchAll();
        $msjListado= new ArrayObject(array());
        foreach ($registro as $row) {
            
            $mensajeId=$row['mensajeId'];
            $mensajePadreId=$row['mensajePadreId'];
            $contenido=$row['contenido'];
            $fecha=$row['fecha'];
            
            $remitenteUsuarioId=$row['remitenteUsuarioId'];
            $remitenteNombreUsuario=$row['remitenteNombreUsuario'];
            $remitenteNombre=$row['remitenteNombre'];
            $remitenteApellido=$row['remitenteApellido'];
            
            $destinatarioUsuarioId=$row['destinatarioUsuarioId'];
            $destinatarioNombreUsuario=$row['destinatarioNombreUsuario'];
            $destinatarioNombre=$row['destinatarioNombre'];
            $destinatarioApellido=$row['destinatarioApellido'];
            
            $msj= new Mensaje($mensajeId, $mensajePadreId, $contenido, $fecha, $remitenteUsuarioId, $destinatarioUsuarioId);
            
            $remitente= new Usuario($remitenteUsuarioId, $remitenteNombreUsuario, $remitenteNombre, $remitenteApellido);
            
            
            $destinatario= new Usuario($destinatarioUsuarioId, $destinatarioNombreUsuario, $destinatarioNombre, $destinatarioApellido);
                  
            $msj->setRemitente($remitente);
            $msj->setDestinatario($destinatario);
            
            
            //buscando respuesta cuando se buscan los msj padres(muro)
            if ($mensajePadreId == null) {
                $respuestas=  $this->obtenerMensajes($mensajeId);
                $msj->setRespuestas($respuestas);
            }
            
            
            
//agregandp al listado de msj
            $msjListado->append($msj);
        }
        
        return $msjListado;
    }
    
    public function obtenerMensajesPerfil($destinatarioUsuarioId){
         $conec= new conexion();
         
        $consulta=$conec->prepare('SELECT mensajeId,mensajePadreId,contenido, fecha, remitenteUsuarioId,destinatarioUsuarioId, '
                                    . 'R.apellido as remitenteApellido,'
                                    . 'R.nombre as remitenteNombre,'
                                    . 'R.nombreUsuario as remitenteNombreUsuario,'
                                    . 'D.apellido as destinatarioApellido,'
                                    . 'D.nombre as destinatarioNombre,'
                                    . 'D.nombreUsuario as destinatarioNombreUsuario '
                                    . 'FROM mensaje as M '
                                    . 'INNER JOIN usuario as R '
                                        . 'ON M.remitenteUsuarioId= R.usuarioId '
                                    . 'INNER JOIN usuario as D '
                                        . 'ON M.destinatarioUsuarioId= D.usuarioId '
                                    . 'WHERE mensajePadreId IS NULL and M.destinatarioUsuarioId= '.$destinatarioUsuarioId  
                                    . ' ORDER BY M.fecha DESC');
        
        $consulta->execute();
        $registro= $consulta->fetchAll();
        $msjListado= new ArrayObject(array());
        foreach ($registro as $row) {
            
            $mensajeId=$row['mensajeId'];
            $mensajePadreId=$row['mensajePadreId'];
            $contenido=$row['contenido'];
            $fecha=$row['fecha'];
            
            $remitenteUsuarioId=$row['remitenteUsuarioId'];
            $remitenteNombreUsuario=$row['remitenteNombreUsuario'];
            $remitenteNombre=$row['remitenteNombre'];
            $remitenteApellido=$row['remitenteApellido'];
            
            $destinatarioUsuarioId=$row['destinatarioUsuarioId'];
            $destinatarioNombreUsuario=$row['destinatarioNombreUsuario'];
            $destinatarioNombre=$row['destinatarioNombre'];
            $destinatarioApellido=$row['destinatarioApellido'];
            
            $msj= new Mensaje($mensajeId, $mensajePadreId, $contenido, $fecha, $remitenteUsuarioId, $destinatarioUsuarioId);
            
            $remitente= new Usuario($remitenteUsuarioId, $remitenteNombreUsuario, $remitenteNombre, $remitenteApellido);
            
            
            $destinatario= new Usuario($destinatarioUsuarioId, $destinatarioNombreUsuario, $destinatarioNombre, $destinatarioApellido);
                  
            $msj->setRemitente($remitente);
            $msj->setDestinatario($destinatario);
            
            
            //buscando respuesta cuando se buscan los msj padres(muro)
            if ($mensajePadreId == null) {
                $respuestas=  $this->obtenerMensajes($mensajeId);
                $msj->setRespuestas($respuestas);
            }
            
            
            
//agregandp al listado de msj
            $msjListado->append($msj);
        }
        
        return $msjListado;
    }
    
}
<?php
require './Negocios/ComprobadorLogeo.php';
require './Negocios/MensajeNegocio.php';


//obtener muro
$msjNegocio= new MensajeNegocio();

if ($_GET["usuarioId"]!= null && $_GET["usuarioId"]!= "" && ctype_digit($_GET["usuarioId"]))
    { 
        $destinatarioUsuarioId = $_GET["usuarioId"];
     }
 
$perfil=$msjNegocio->obtenerMensajesPerfil($destinatarioUsuarioId);
?>
<html>
  <head>
	<title>Perfil</title>
        <link href="Estilos/EstiloPerfil.css" rel="stylesheet" type="text/css" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
	
		<div>
                    <div class="muroContenedor">
			<div class="NombreDelUsuario">
                            <?php echo $_SESSION['k_username'];?>
			</div>
                                
                        <form action="postPerfil.php" method="post">
                                <div>
                                     <label>A quien enviar mensaje?</label>
                                        <select name="destinatarioUsuarioId">
                                            <option value="1">EMANUEL</option>
                                            <option value="2">CRISTHIAN</option>
                                            <option value="3">JORGE</option>
                                            <option value="4">JOSE</option>
                                            <option value="5">FERNANDO</option>
                                            <option value="6">MIGUEL</option>
                                            <option value="7">CESAR</option>
                                        </select>
                                </div>
                                
                                <div class="muroContenido">
                                    <label>¿Qué estas pensando?</label> <br>
                                        <textarea name="contenido" rows="5" cols="30"> </textarea>
                                            <input type="submit" name="btnPublicar" >
                                </div>
                            </form>
                           
			</div>
		</div>
            
            <?php 
            foreach ($perfil as $p) {
        ?>
            
                <div>
                    <a href="/Parcial/perfil.php?usuarioId=<?php echo $p->getRemitente()->getUsuarioId();?>">
                        <img src="perfiles/<?php echo $p->getRemitente()->getNombreUsuario();?>.jpg" class="imagenPerfil mover">
                    </a>
                      
                        <div class="muroContenedor">
				<div class="NombreDelUsuario">
                                    
					<?php echo $p->getRemitente()->getNombre();?> &raquo;
                                    
                                        <a href="/Parcial/perfil.php?usuarioId=<?php echo $p->getDestinatario()->getUsuarioId();?>">
                                            <?php echo $p->getDestinatario()->getNombre();?>
                                        </a>
				</div>
                                
                                <div class="muroContenido">
                                   <?php echo $p->getContenido();?>
                                </div>
                            <div class="muroFecha"> 
                                    <?php echo $p->getFecha();?>
                                </div>
                            
                        </div>
                </div>
                            <div class="respuestas ">
                                
                                <?php 
                                      foreach ($p->getRespuestas() as $r) {
                                ?>
                                <div class="respuesta">
                                    <a href="/Parcial/perfil.php?usuarioId=<?php echo $r->getRemitente()->getUsuarioId();?>">
                                        <img src="perfiles/<?php echo $r->getRemitente()->getNombreUsuario();?>.jpg" class="imagenPerfil mover">
                                    </a>
                                    <div class="muroContenedor">
                                        <div class="NombreDelUsuario">
                                           <?php echo $r->getRemitente()->getNombre();?>
                                       </div> 
                                       
                                    <br>
                                       
                                       <div>
                                         <?php echo $r->getContenido();?>
                                       </div>
                                    <br>

                                       <div class="muroFecha">
                                            <?php echo $r->getFecha();?>
                                       </div>
                                    </div>
                                </div> 
                                <div>
                                <?php
                                    }
                                    ?> 
                                    <form action="postPerfil.php" method="post" class="muroContenedor"> 
                                    <input type="hidden" name="mensajePadreId" value="<?php echo $p->getMensajeId();?>" />
                                    <input type="hidden" name="destinatarioUsuarioId" value="<?php echo $p->getRemitenteUsuarioId();?>" />
                                            <textarea name="contenido" rows="3" cols="30"> </textarea>
                                            <input type="submit" name="btnPublicar" value="Responder" >
                                </form>
                                    </div>
                                </div>
                            <br>
			
                    
		
           
        <?php
            }
        ?>  
               
           
    </body>
</html>
<?php
require './Negocios/ComprobadorLogeo.php';
require './Negocios/MensajeNegocio.php';


//obtener muro
$msjNegocio= new MensajeNegocio();
$muro=$msjNegocio->obtenerMuro();

?>
<html>
  <head>
	<title>Muro</title>
        <link href="Estilos/EstiloMuro.css" rel="stylesheet" type="text/css" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
	
		<div>
                    <div class="muroContenedor">
			<div class="NombreDelUsuario">
                            <?php echo $_SESSION['k_username'];?>
			</div>
                                
                            <form action="postMuro.php" method="post">
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
            foreach ($muro as $m) {
        ?>
            
                <div>
                    <img src="perfiles/<?php echo $m->getRemitente()->getNombreUsuario();?>.jpg" class="imagenPerfil mover">
			<div class="muroContenedor">
				<div class="NombreDelUsuario">
					<?php echo $m->getRemitente()->getNombre();?> &raquo;
                                        <?php echo $m->getDestinatario()->getNombre();?>
				</div>
                                
                                <div class="muroContenido">
                                   <?php echo $m->getContenido();?>
                                </div>
                            <div class="muroFecha"> 
                                    <?php echo $m->getFecha();?>
                                </div>
                            
                        </div>
                </div>
                            <div class="respuestas ">
                                
                                <?php 
                                      foreach ($m->getRespuestas() as $r) {
                                ?>
                                <div class="respuesta">
                                    <img src="perfiles/<?php echo $r->getRemitente()->getNombreUsuario();?>.jpg" class="imagenPerfil mover">
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
                                    <form action="postMuro.php" method="post" class="muroContenedor"> 
                                    <input type="hidden" name="mensajePadreId" value="<?php echo $m->getMensajeId();?>" />
                                    <input type="hidden" name="destinatarioUsuarioId" value="<?php echo $m->getRemitenteUsuarioId();?>" />
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
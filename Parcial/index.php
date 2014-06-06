<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="Estilos/LoginEstilo.css" rel="stylesheet" type="text/css" />
        <title>Friends</title>
    </head>
    <body class="imagenDeFondo">
        <form action="Negocios/postlogin.php" method="post">
		<div class="moverdiv1">
			<div>
				<h2>FRIENDS<h2>
			</div>
			<div>
				<table >
					<tr>
						<td>
						USUARIO	
						</td>
					</tr>
					<tr>
						<td>
                                                    <input type="text" id="usuario" name="usuario"/> <br />
                                                </td>
					</tr>
				</table>
			</div>
			<div >
				<table>
					<tr>
						<td>
						CONTRASEÑA
						</td>
					</tr>
					<tr>
						<td>
                                                    <input type="password" id="password" name="password" />
						</td>
					</tr>
				</table>
			</div>
			<div>
				<table>
					<tr>
						<td>
                                                    <input type="submit" id="btnLogin"  name="btnLogin" value="Iniciar Sesi&oacute;n" class="colorDelBoton" />
						</td>
					</tr>
				</table>
			</div >
		
                </div>
            
                
            </form>
    </body>
</html>
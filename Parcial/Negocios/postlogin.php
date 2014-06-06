<?php
session_start();
?>
<?php
error_reporting(0);
require '../Datos/conexion.php';   
class PostLogin {
    
    public function iniciarSecion($usuario,$password){
        $conec= new conexion();
            $usuario = $_POST["usuario"];
            $password = $_POST["password"];
        
        if($usuario!= "" && $password!= "")
        {
            $consulta=$conec->prepare('SELECT nombreUsuario,password FROM usuario WHERE nombreUsuario="'.$usuario.'"');
            $consulta->execute();
            $registro= $consulta->fetch();
            if ($registro) {
                if($registro["password"] == $password){
			$_SESSION["k_username"] = $registro['nombreUsuario'];
                         //echo 'Has sido logueado correctamente '.$_SESSION['k_username'].' <p>';
                        header("Location: http://localhost/Parcial/muroPrueba.php");
		}else{
			//echo 'Password incorrecto';
			header("Location: http://localhost/Parcial/index.php");
		}
            }else
                {
                //echo 'Usuario no existente en la base de datos ';
		header("Location: http://localhost/Parcial/index.php");
                }
            
            
        }
        
    }
}
$variab= new PostLogin();
$variab->iniciarSecion($_POST["usuario"], $_POST["password"]);
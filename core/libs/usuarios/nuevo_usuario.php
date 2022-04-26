<?php   session_start();
        include "../../../connection/connection.php";
        include "lib_usuarios.php";
        
        $oneUsuario = new Usuarios();
        
        if($conn){
                        
            $nombre = mysqli_real_escape_string($conn,$_POST['nombre']);
            $email = mysqli_real_escape_string($conn,$_POST['email']);
                       
            if(($nombre == '') || ($email == '')){
                echo 3;
            }else{
                $oneUsuario->agregarUser($oneUsuario,$nombre,$email,$conn,$dbase);
            }
        }else{
            echo 7; // sin conexion
        }
        
?>

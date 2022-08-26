<?php   session_start();
        include "../../../connection/connection.php";
        include "lib_usuarios.php";
        
        $oneUsuario = new Usuarios();
        
        if($conn){
            
            $id = mysqli_real_escape_string($conn,$_POST['bookId']);
            $role = mysqli_real_escape_string($conn,$_POST['permisos']);
                       
            if(($role == '') || ($id == '')){
                echo 3;
            }else{
                $oneUsuario->cambiarPermisos($oneUsuario,$id,$role,$conn,$dbase);
            }
        }else{
            echo 7; // sin conexion
        }
        
?>

<?php   session_start();
        include "../../../connection/connection.php";
        include "lib_usuarios.php";
        
        $oneUsuario = new Usuarios();
        
        if($conn){
            
            $id = mysqli_real_escape_string($conn,$_POST['bookId']);
            $password_1 = mysqli_real_escape_string($conn,$_POST['password_1']);
            $password_2 = mysqli_real_escape_string($conn,$_POST['password_2']);
                       
            if(($id == '') || ($password_1 == '') || ($password_2 == '')){
                echo 3;
            }else{
                $oneUsuario->changePass($oneUsuario,$id,$password_1,$password_2,$conn,$dbase);
            }
        }else{
            echo 7; // sin conexion
        }
        
?>

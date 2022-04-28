<?php   session_start();
        include "../../../connection/connection.php";
        include "lib_expedientes.php";
        
        if($conn){
        
            $oneExp = new Expedientes();
            
            $id = mysqli_real_escape_string($conn,$_POST['id']);
                        
            if(id == ''){
                echo 3; // no existe el id
            }else{
                $oneExp->deleteRegistroExpediente($id,$conn,$dbase);
            }
        }else{
            echo 7; // sin conexion
        }







?>

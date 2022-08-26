<?php   session_start();
        include "../../../connection/connection.php";
        include "lib_expedientes.php";
        
        if($conn){
        
            $oneExp = new Expedientes();
            
            $id = mysqli_real_escape_string($conn,$_POST['id']);
            $fecha_egreso = mysqli_real_escape_string($conn,$_POST['fecha_egreso']);
            $destino = mysqli_real_escape_string($conn,$_POST['destino']);
            
            if((id == '') ||
               ($fecha_egreso == '') ||
                    ($destino == '')){
                                echo 3; // hay campos sin completar
            }else{
                $oneExp->enviarExpediente($oneExp,$id,$fecha_egreso,$destino,$conn,$dbase);
            }
        }else{
            echo 7; // sin conexion
        }







?>

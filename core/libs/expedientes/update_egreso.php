<?php   session_start();
        include "../../../connection/connection.php";
        include "lib_expedientes.php";
        
        if($conn){
        
            $oneExp = new Expedientes();
            
            $id = mysqli_real_escape_string($conn,$_POST['id']);
            $fecha_egreso = mysqli_real_escape_string($conn,$_POST['fecha_egreso']);
            $destino = mysqli_real_escape_string($conn,$_POST['destino']);
            $usuario_responsable = mysqli_real_escape_string($conn,$_POST['usuario_responsable']);
            $desc_egreso = mysqli_real_escape_string($conn,$_POST['desc_egreso']);
            
            if((id == '') ||
               ($fecha_egreso == '') ||
                    ($destino == '') ||
                            ($usuario_responsable == '') ||
                                ($desc_egreso == '')){
                                echo 3; // hay campos sin completar
            }else{
                $oneExp->updateEgresoExpediente($oneExp,$id,$fecha_egreso,$destino,$usuario_responsable,$desc_egreso,$conn,$dbase);
            }
        }else{
            echo 7; // sin conexion
        }







?>

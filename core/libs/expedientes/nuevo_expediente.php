<?php   session_start();
        include "../../../connection/connection.php";
        include "lib_expedientes.php";
        
        if($conn){
        
            $oneExp = new Expedientes();
            
            $nro_expediente = mysqli_real_escape_string($conn,$_POST['nro_expediente']);
            $fecha_ingreso = mysqli_real_escape_string($conn,$_POST['fecha_ingreso']);
            $asunto = mysqli_real_escape_string($conn,$_POST['asunto']);
            $procedencia = mysqli_real_escape_string($conn,$_POST['procedencia']);
            $usuario_responsable = mysqli_real_escape_string($conn,$_POST['usuario_responsable']);
            $desc_ingreso = mysqli_real_escape_string($conn,$_POST['desc_ingreso']);
            
            if(($nro_expediente == '') ||
                ($fecha_ingreso == '') ||
                    ($asunto == '') ||
                        ($procedencia == '') ||
                            ($usuario_responsable == '') ||
                                ($desc_ingreso == '')){
                                echo 3; // hay campos sin completar
            }else{
                $oneExp->addIngresoExpediente($oneExp,$nro_expediente,$fecha_ingreso,$asunto,$procedencia,$usuario_responsable,$desc_ingreso,$conn,$dbase);
            }
        }else{
            echo 7; // sin conexion
        }







?>

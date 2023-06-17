<?php   session_start();
        include "../../../connection/connection.php";
        include "lib_expedientes.php";
        
        if($conn){
        
            // $oneExp = new Expedientes();
            
            $archivo = basename($_GET['file_name']);

            //Si la variable archivo que pasamos por URL no esta 
        //establecida acabamos la ejecucion del script.
            if($archivo){
            //if (!isset($_GET['file_name']) || empty($_GET['file_name'])) {
       
               $path = '../files/'.$archivo;
              
              

                if (is_file($path))
                {
                   header('Content-Type: application/force-download');
                   header('Content-Disposition: attachment; filename='.$archivo);
                   header('Content-Transfer-Encoding: binary');
                   header('Content-Length: '.filesize($path));

                   readfile($path);
                }
            }

        }







?>

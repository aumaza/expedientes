<?php include "../../connection/connection.php";

	$archivo = basename($_GET['file_name']);
	$path = $_GET['path'];

	$filePath = $path.'/'.$archivo;

	if(($path != '') && ($archivo != '')){

    if(is_file($filePath)){
        
        header('Content-Type: application/force-download');
        header('Content-Disposition: attachment; filename='.$archivo);
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: '.filesize($filePath));
        readfile($filePath);
    
    }
}


?>
<?php session_start(); 
      ini_set('display_errors', 0);
      include "../../connection/connection.php";
      include "../libs/lib_core.php";
      include "../libs/lib_main.php";
      
      // LIBRERIAS DE APP
      include "../libs/usuarios/lib_usuarios.php";
      include "../libs/carteras/lib_carteras.php";
      include "../libs/expedientes/lib_expedientes.php";
      
        $varsession = $_SESSION['user'];
	
	$sql = "select nombre from exp_usuarios where user = '$varsession'";
	mysqli_select_db($conn,$dbase);
	$query = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($query)){
	      $nombre = $row['nombre'];
	}
	
	if($varsession == null || $varsession == ''){
  echo '<!DOCTYPE html>
        <html lang="es">
        <head>
        <title>Gestión Expedientes</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="../../icons/apps/accessories-dictionary.png" />';
        skeleton();
        echo '</head><body>';
        echo '<br><div class="container">
                <div class="alert alert-danger" role="alert">';
        echo '<p align="center"><img src="../../icons/status/task-attempt.png"  class="img-reponsive img-rounded"> Su sesión a caducado. Por favor, inicie sesión nuevamente</p>';
        echo '<a href="../../logout.php"><hr><button type="buton" class="btn btn-default btn-block"><img src="../../icons/status/dialog-password.png"  class="img-reponsive img-rounded"> Iniciar</button></a>';	
        echo "</div></div>";
        die();
        echo '</body></html>';
	}
	
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Gestion de Expedientes</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="../../icons/apps/accessories-dictionary.png" />
  <link rel="stylesheet" href="main.css" >
  <?php skeleton(); ?>
  
 
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50" onload="nobackbutton();" style = "background: #839192;">

<div class="panel-group">
    
        <!-- ENCABEZAD0  -->
    <?php encabezado(); ?>
    
        <!-- MAIN NAVBAR  -->
    <?php mainNavBar($nombre); ?>
        

        <!-- MAIN MENU -->
           
          
      <?php
   
      if($conn){
        // =================================================== SYSTEM OUT ========================================== //
        if(isset($_POST['logout'])){
            logOut($nombre);
        }
        
        // =================================================== SYSTEM HOME ========================================== //
        if(isset($_POST['home'])){
            mainFlyer();
        }
        
        // =================================================== ESPACIO USUARIOS ========================================== //
        // se crea el objeto
        $oneUsuario = new Usuarios();
        
        if(isset($_POST['usuarios'])){
            $oneUsuario->moduloUsuarios($oneUsuario,$conn,$dbase);
        }
        if(isset($_POST['usuario'])){
            $oneUsuario->loadUser($dbase,$conn,$nombre);
        }
        
        
        //modales para usuarios
        $oneUsuario->modalPermisos();
        $oneUsuario->modalChangePassword();
        
        // =================================================== FIN ESPACIO USUARIOS ========================================== //
        
        
        // =================================================== ESPACIO CARTERAS MINISTERIALES ========================================== //
        // se crea el objeto
        $oneCartera = new Carteras();
        
        if(isset($_POST['carteras'])){
            $oneCartera->listarCarteras($oneCartera,$conn,$dbase);
        }
        
        // =================================================== FIN ESPACIO CARTERAS MINISTERIALES ========================================== //
        
        // =================================================== ESPACIO EXPEDIENTES ========================================== //
        // creamos el objeto expediente
        $oneExp = new Expedientes();
        
        if((isset($_POST['expedientes'])) || (isset($_POST['search_by_nro_exp'])) || (isset($_POST['search_by_procedencia']))){
            $nro_exp = mysqli_real_escape_string($conn,$_POST['nro_exp']);
            $procedencia = mysqli_real_escape_string($conn,$_POST['procedencia']);
            $oneExp->listarExpedientes($oneExp,$nro_exp,$procedencia,$conn,$dbase);
        }
        if(isset($_POST['nuevo_ingreso'])){
            $oneExp->formIngresoExpediente($conn,$dbase);
        }
        if(isset($_POST['edit_exp'])){
            $id = mysqli_real_escape_string($conn,$_POST['id']);
            $oneExp->formEditarExpediente($oneExp,$id,$conn,$dbase);
        }
        if(isset($_POST['salida_exp'])){
            $id = mysqli_real_escape_string($conn,$_POST['id']);
            $oneExp->formEnviarExpediente($oneExp,$id,$conn,$dbase);
        }
        if(isset($_POST['edit_egreso'])){
            $id = mysqli_real_escape_string($conn,$_POST['id']);
            $oneExp->formEditarEgreso($oneExp,$id,$conn,$dbase);
        }
        if(isset($_POST['delete_expediente'])){
            $id = mysqli_real_escape_string($conn,$_POST['id']);
            $oneExp->formDeleteExpediente($id,$oneExp,$conn,$dbase);
        }
        if(isset($_POST['statistics'])){
            $oneExp->analytics($oneExp,$conn,$dbase);
        }
        if(isset($_POST['busquedas_avanzadas'])){
            $oneExp->advanceSearch();
        }
        if(isset($_POST['search_exp'])){
            $oneExp->searchByExp();
        }
        if(isset($_POST['search_procedencia'])){
            $oneExp->searchByProcedencia($conn,$dbase);
        }
        if(isset($_POST['search_responsable'])){
            $oneExp->searchByResponsable($conn,$dbase);
        }
        if(isset($_POST['search_fechas'])){
            $oneExp->searchByFecha($conn,$dbase);
        }
        if(isset($_POST['search_asunto'])){
            $oneExp->searchByAsunto($conn,$dbase);
        }
        
        
        // =================================================== FIN ESPACIO EXPEDIENTES ========================================== //
        
	}else{
	  mysqli_error($conn);
	}
	
      
   
   
   ?>
      
      
      
    
     
 
 
</div><br>

<!-- SECCION JAVASCRIPTS DE SISTEMA -->
<script type="text/javascript" src="../libs/usuarios/lib_usuarios.js"></script>
<script type="text/javascript" src="main.js"></script>
<script type="text/javascript" src="../libs/expedientes/lib_expedientes.js"></script>




</body>
</html>

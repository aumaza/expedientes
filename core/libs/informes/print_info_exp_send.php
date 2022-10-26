<?php session_start();

    include "../../../connection/connection.php";
            
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
  <title>Informe - Expedientes Ingresados en la Ultima Semana</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../../../icons/apps/kthesaurus.png" rel="icon">
  <link rel="stylesheet" href="informes.css" type="text/css">
   
  
</head>
<body>


<!-- primer bloque -->

<div>
   
   <div class="row">
       
    <p class="p-center"><img class="img-50" src="../../../img/escudo.png"></p>
    <p class="p-center">Ministerio de Economía de la Nación</p>
    <p class="p-center">Dirección de Presupuesto y Evaluación de Gastos en Personal</p>
    <hr>
    <h1 align="center">Informes</H1>
    <h3 align="center">Expedientes Enviados</h3>
    
   
   </div>
   
   
   
   <?php 
          
       if($conn){
        

        $sql = "select nro_exp, fecha_ingreso, asunto, procedencia, usuario_responsable, fecha_egreso, destino from exp_expedientes where fecha_ingreso is not null and fecha_egreso IS NOT NULL order by usuario_responsable and fecha_ingreso ASC";
        mysqli_select_db($conn,$dbase);
        $query = mysqli_query($conn,$sql);
        $count = 0;
        
            echo '<table id="expedientes">
                    <tr>
                        <th>Nro. Expediente</th>
                        <th>Fecha Ingreso</th>
                        <th>Asunto</th>
                        <th>Procedencia</th>
                        <th>Usuario Responsable</th>
                        <th>Fecha Egreso</th>
                        <th>Destino</th>
                    </tr>';
                      
        while($row = mysqli_fetch_array($query)){
            
                    echo "<tr>";
                    echo "<td class='large'>".$row['nro_exp']."</td>";
                    echo "<td>".$row['fecha_ingreso']."</td>";
                    echo "<td>".$row['asunto']."</td>";
                    echo "<td>".$row['procedencia']."</td>";
                    echo "<td>".$row['usuario_responsable']."</td>";
                    echo "<td>".$row['fecha_egreso']."</td>";
                    echo "<td>".$row['destino']."</td>";
                    echo "</tr>";
                    $count++;
        
        }
        echo '</table>';
         
         }else{
		  echo 'Connection Failure...' .mysqli_error($conn);
		}

    mysqli_close($conn);
      
    
   ?>  

</div>
 
<!-- end tercer bloque -->  



</body>
</html>

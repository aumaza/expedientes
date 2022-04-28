<?php

class Expedientes{

    // PROPIEDADES
    private $nro_expediente = '';
    private $fecha_ingreso = '';
    private $asunto = '';
    private $procedencia = '';
    private $usuario_responsable = '';
    private $fecha_egreso = '';
    private $destino = '';

    // CONSTRUCTOR DESPARAMETRIZADO
    private function __constructor(){
        $this->nro_expediente = '';
        $this->fecha_ingreso = '';
        $this->asunto = '';
        $this->procedencia = '';
        $this->usuario_responsable = '';
        $this->fecha_egreso = '';
        $this->destino = '';
    }
    
    // SETTERS
    private function setNroExpediente($var){
        $this->nro_expediente = $var;
    }
    
    private function setFechaIngreso($var){
        $this->fecha_ingreso = $var;
    }
    
    private function setAsunto($var){
        $this->asunto = $var;
    }
    
    private function setProcedencia($var){
        $this->procedencia = $var;
    }
    
    private function setUsuarioResponsable($var){
        $this->usuario_responsable = $var;
    }
    
    private function setFechaEgreso($var){
        $this->fecha_egreso = $var;
    }
    
    private function setDestino($var){
        $this->destino = $var;
    }
    
    //GETTERS
    private function getNroExpediente($var){
        return $this->nro_expediente = $var;
    }
    
    private function getFechaIngreso($var){
        return $this->fecha_ingreso = $var;
    }
    
    private function getAsunto($var){
        return $this->asunto = $var;
    }
    
    private function getProcedencia($var){
        return $this->procedencia = $var;
    }
    
    private function getUsuarioResponsable($var){
        return $this->usuario_responsable = $var;
    }
    
    private function getFechaEgreso($var){
        return $this->fecha_egreso = $var;
    }
    
    private function getDestino($var){
        return $this->destino = $var;
    }

    // METODOS
    
    public function listarExpedientes($oneExp,$conn,$dbase){

        if($conn){
        
            $sql = "SELECT * FROM exp_expedientes";
                mysqli_select_db($conn,$dbase);
                $resultado = mysqli_query($conn,$sql);
            //mostramos fila x fila
            $count = 0;
            echo '<div class="container-fluid" style="margin-top:70px">
                    <div class="panel panel-default" >
                <div class="panel-heading"><span class="pull-center "><img src="../../icons/mimetypes/application-epub+zip.png"  class="img-reponsive img-rounded"> Listado de Expedientes';
            
                
            echo '</div><br>';

                    echo "<table class='table table-condensed table-hover' style='width:100%' id='myTable'>";
                    echo "<thead>
                    <th class='text-nowrap text-center'>Nro. Expediente</th>
                    <th class='text-nowrap text-center'>Fecha Ingreso</th>
                    <th class='text-nowrap text-center'>Asunto</th>
                    <th class='text-nowrap text-center'>Procedencia</th>
                    <th class='text-nowrap text-center'>Usuario Responsable</th>
                    <th class='text-nowrap text-center'>Fecha Egreso</th>
                    <th class='text-nowrap text-center'>Destino</th>
                    <th class='text-nowrap text-center'>Acciones</th>
                    <th>&nbsp;</th>
                    </thead>";


            while($fila = mysqli_fetch_array($resultado)){
                    // Listado normal
                    echo "<tr>";
                    echo "<td align=center>".$oneExp->getNroExpediente($fila['nro_exp'])."</td>";
                    echo "<td align=center>".$oneExp->getFechaIngreso($fila['fecha_ingreso'])."</td>";
                    echo "<td align=center>".$oneExp->getAsunto($fila['asunto'])."</td>";
                    echo "<td align=center>".$oneExp->getProcedencia($fila['procedencia'])."</td>";
                    echo "<td align=center>".$oneExp->getUsuarioResponsable($fila['usuario_responsable'])."</td>";
                    echo "<td align=center>".$oneExp->getFechaEgreso($fila['fecha_egreso'])."</td>";
                    echo "<td align=center>".$oneExp->getDestino($fila['destino'])."</td>";
                    echo "<td class='text-nowrap'>";
                    
                    echo '<form action="#" id="fr_delete_expediente_ajax" method="POST">
                            <input type="hidden" name="id" value="'.$fila['id'].'">';
                        
                        if($oneExp->getFechaEgreso($fila['fecha_egreso']) == ''){
                           echo '<button type="submit" class="btn btn-info btn-sm" name="edit_exp" data-toggle="tooltip" data-placement="top" title="Editar Datos del Expediente">
                                <img src="../../icons/actions/document-edit.png"  class="img-reponsive img-rounded"> Editar</button>
                                
                           <button type="submit" class="btn btn-danger btn-sm" id="delete_expediente" data-toggle="tooltip" data-placement="top" title="Eliminar Registro">
                                <img src="../../icons/actions/trash-empty.png"  class="img-reponsive img-rounded"> Borrar</button>
                            
                            <button type="submit" class="btn btn-default btn-sm" name="salida_exp" data-toggle="tooltip" data-placement="top" title="Envió de Expediente">
                                <img src="../../icons/actions/mail-forward.png"  class="img-reponsive img-rounded"> Envío</button>';
                        }
                        
                            
                                        
              echo '</form>
                    </td>';
                    $count++;
                }

                echo "</table>";
                echo "<br>";
                
                echo '<form <action="main.php" method="POST">
                    <button type="submit" class="btn btn-default btn-sm" name="nuevo_ingreso" data-toggle="tooltip" data-placement="top" title="Agregar Ingreso Expediente">
                    <img src="../../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Nuevo Ingreso</button>
                    
                    <button type="submit" class="btn btn-default btn-sm" name="busqueda_avanzada" data-toggle="tooltip" data-placement="top" title="Búsqueda Avanzada de Expedientes">
                    <img src="../../icons/actions/system-search.png"  class="img-reponsive img-rounded"> Búsqueda Avanzada</button>
                    
              </form><br>';
                
                echo '<button type="button" class="btn btn-primary">Cantidad de Registros:  '.$count.' </button>';
                echo '</div></div>';
                }else{
                echo 'Connection Failure...' .mysqli_error($conn);
                }

            mysqli_close($conn);

    } // FIN DE LA FUNCION
    
    
/*
** FORMULARIO DE ALTA
*/
public function formIngresoExpediente($conn,$dbase){

      echo '<div class="container">
	    <div class="row">
	    <div class="col-sm-8">
	      <h2>Cargar Ingreso Expediente</h2><hr>
	        <form id="fr_nuevo_expediente_ajax" method="POST">
	        
	        <div class="form-group">
            <label for="nro_expediente">Número de Expediente</label>
            <input type="text" class="form-control" id="nro_expediente" name="nro_expediente"  placeholder="Ingrese el Número del expediente" required>
            </div>
	        
	        <div class="form-group">
            <label for="fecha_ingreso">Fecha Ingreso</label>
            <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" required>
            </div>
            
            <div class="form-group">
            <label for="asunto">Asunto</label>
            <input type="text" class="form-control" id="asunto" name="asunto" placeholder="Ingrese una breve descripción del tema que trata el expediente" required>
            </div>';
		
		
		echo '<div class="form-group">
                <label for="procedencia">Procedencia / Remitente</label>
                <select class="form-control" id="procedencia" name="procedencia" required>
                <option value="" disabled selected>Seleccionar</option>';
		    
		    if($conn){
		      $query = "SELECT apertura FROM exp_carteras_ministerial group by apertura";
		      mysqli_select_db($conn,$dbase);
		      $res = mysqli_query($conn,$query);

		      if($res){
				  while ($valores = mysqli_fetch_array($res)){
                    echo '<option value="'.$valores[apertura].'">'.$valores[apertura].'</option>';
			      }
              }
			}

			  
		 echo '</select>
            </div>
		
		 <div class="form-group">
		  <label for="usuario_responsable">Usuario Responsable</label>
		  <select class="form-control" id="usuario_responsable" name="usuario_responsable" required>
		  <option value="" disabled selected>Seleccionar</option>';
		    
		    if($conn){
		      $query = "SELECT nombre FROM exp_usuarios order by nombre ASC";
		      mysqli_select_db($conn,$dbase);
		      $res = mysqli_query($conn,$query);

		      if($res){
				  while ($valores = mysqli_fetch_array($res)){
                    if($valores['nombre'] != 'Administrador'){
                        echo '<option value="'.$valores[nombre].'">'.$valores[nombre].'</option>';
                    }    
                  }
              }
			}

			mysqli_close($conn);
		  
		 echo '</select>
		</div><hr>
		
		
		<button type="submit" class="btn btn-default btn-block" id="add_nuevo_expediente">
            <img src="../../icons/devices/media-floppy.png"  class="img-reponsive img-rounded"> Guardar</button>
	      </form> <hr>
	      
	    </div>
	    </div>
	</div>';

} // FIN DE LA FUNCION


/*
** FORMULARIO DE ALTA
*/
public function formEditarExpediente($oneExp,$id,$conn,$dbase){
        
      $sql = "select * from exp_expedientes where id = '$id'";
      mysqli_select_db($conn,$dbase);
      $query = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($query);

      echo '<div class="container">
	    <div class="row">
	    <div class="col-sm-8">
	      <h2>Editar Datos Expediente</h2><hr>
	        <form id="fr_update_expediente_ajax" method="POST">
	        <input type="hidden" id="id" name="id" value="'.$id.'">
	        
	        <div class="form-group">
            <label for="nro_expediente">Número de Expediente</label>
            <input type="text" class="form-control" id="nro_expediente" name="nro_expediente" value="'.$oneExp->getNroExpediente($row['nro_exp']).'" required>
            </div>
	        
	        <div class="form-group">
            <label for="fecha_ingreso">Fecha Ingreso</label>
            <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso"  value="'.$oneExp->getFechaIngreso($row['fecha_ingreso']).'" required>
            </div>
            
            <div class="form-group">
            <label for="asunto">Asunto</label>
            <input type="text" class="form-control" id="asunto" name="asunto"  value="'.$oneExp->getAsunto($row['asunto']).'" required>
            </div>';
		
		
		echo '<div class="form-group">
                <label for="procedencia">Procedencia / Remitente</label>
                <select class="form-control" id="procedencia" name="procedencia" required>
                <option value="" disabled selected>Seleccionar</option>';
		    
		    if($conn){
		      $query = "SELECT apertura FROM exp_carteras_ministerial group by apertura";
		      mysqli_select_db($conn,$dbase);
		      $res = mysqli_query($conn,$query);

		      if($res){
				  while ($valores = mysqli_fetch_array($res)){
                    echo '<option value="'.$valores[apertura].'" '.("'.$row[procedencia].'" == "'.$valores[apertura].'" ? "selected" : "").'>'.$valores[apertura].'</option>';
			      }
              }
			}

			  
		 echo '</select>
            </div>
		
		 <div class="form-group">
		  <label for="usuario_responsable">Usuario Responsable</label>
		  <select class="form-control" id="usuario_responsable" name="usuario_responsable"asunto required>
		  <option value="" disabled selected>Seleccionar</option>';
		    
		    if($conn){
		      $query = "SELECT nombre FROM exp_usuarios order by nombre ASC";
		      mysqli_select_db($conn,$dbase);
		      $res = mysqli_query($conn,$query);

		      if($res){
				  while ($valores = mysqli_fetch_array($res)){
                    if($valores['nombre'] != 'Administrador'){
                        echo '<option value="'.$valores[nombre].'" '.("'.$row[usuario_responsable].'" == "'.$valores[nombre].'" ? "selected" : "").'>'.$valores[nombre].'</option>';
                    }    
                  }
              }
			}

			mysqli_close($conn);
		  
		 echo '</select>
		</div><hr>
		
		
		<button type="submit" class="btn btn-default btn-block" id="update_expediente">
            <img src="../../icons/actions/view-refresh.png"  class="img-reponsive img-rounded"> Actualizar</button>
	      </form> <hr>
	      
	    </div>
	    </div>
	</div>';

} // FIN DE LA FUNCION


/*
** FORMULARIO DE ALTA
*/
public function formEnviarExpediente($oneExp,$id,$conn,$dbase){
        
      $sql = "select * from exp_expedientes where id = '$id'";
      mysqli_select_db($conn,$dbase);
      $query = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($query);

      echo '<div class="container">
            <div class="row">
            <div class="col-sm-8">
	      
	     
            <h2>Enviar Expediente</h2>
            <div class="list-group">
                <a href="#" class="list-group-item active"><strong>Expediente Nro.:</strong> '.$oneExp->getNroExpediente($row['nro_exp']).'</a>
                <a href="#" class="list-group-item"><strong>Fecha Ingreso:</strong> '.$oneExp->getFechaIngreso($row['fecha_ingreso']).'</a>
                <a href="#" class="list-group-item"><strong>Asunto:</strong> '.$oneExp->getAsunto($row['asunto']).'</a>
                <a href="#" class="list-group-item"><strong>Usuario Responsable:</strong> '.$oneExp->getUsuarioResponsable($row['usuario_responsable']).'</a>
            </div><hr>
                  
	      
	        <form id="fr_update_enviar_expediente_ajax" method="POST">
	        <input type="hidden" id="id" name="id" value="'.$id.'">
	        
	        <div class="form-group">
            <label for="fecha_egreso">Fecha Egreso</label>
            <input type="date" class="form-control" id="fecha_egreso" name="fecha_egreso" required>
            </div>';
		
		echo '<div class="form-group">
                <label for="destino">Destino / Receptor</label>
                <select class="form-control" id="destino" name="destino" required>
                <option value="" disabled selected>Seleccionar</option>';
		    
		    if($conn){
		      $query = "SELECT apertura FROM exp_carteras_ministerial group by apertura";
		      mysqli_select_db($conn,$dbase);
		      $res = mysqli_query($conn,$query);

		      if($res){
				  while ($valores = mysqli_fetch_array($res)){
                    echo '<option value="'.$valores[apertura].'" >'.$valores[apertura].'</option>';
			      }
              }
			}

			  
		 echo '</select>
            </div><hr>
		
		
		<button type="submit" class="btn btn-default btn-block" id="update_enviar_expediente">
            <img src="../../icons/actions/legalmoves.png"  class="img-reponsive img-rounded"> Enviar</button>
	      </form> <hr>
	      
	    </div>
	    </div>
	</div>';

} // FIN DE LA FUNCION




public function addIngresoExpediente($oneExp,$nro_expediente,$fecha_ingreso,$asunto,$procedencia,$usuario_responsable,$conn,$dbase){

    if($conn){

    $sql = "INSERT INTO exp_expedientes ".
                "(
                  nro_exp,
                  fecha_ingreso,
                  asunto,
                  procedencia,
                  usuario_responsable
                  )".
                "VALUES ".
                "(
                  $oneExp->setNroExpediente('$nro_expediente'),
                  $oneExp->setFechaIngreso('$fecha_ingreso'),
                  $oneExp->setAsunto('$asunto'),
                  $oneExp->setProcedencia('$procedencia'),
                  $oneExp->setUsuarioResponsable('$usuario_responsable')
                  )";
        
        mysqli_select_db($conn,$dbase);
        $query = mysqli_query($conn,$sql);
        
        if($query){
            echo 1;
        }else{
            echo -1;
        }
        }else{
            echo 9; // sin conexion
        }

} // FIN DE LA FUNCION


public function updateIngresoExpediente($oneExp,$id,$nro_expediente,$fecha_ingreso,$asunto,$procedencia,$usuario_responsable,$conn,$dbase){

    if($conn){
        
        $sql = "update exp_expedientes set
                nro_exp = $oneExp->setNroExpediente('$nro_expediente'),
                fecha_ingreso = $oneExp->setFechaIngreso('$fecha_ingreso'),
                asunto = $oneExp->setAsunto('$asunto'),
                procedencia = $oneExp->setProcedencia('$procedencia'),
                usuario_responsable = $oneExp->setUsuarioResponsable('$usuario_responsable')
                where id = '$id'";
        
        $query = mysqli_query($conn,$sql);
        mysqli_select_db($conn,$dbase);
        
        if($query){
            echo 1; // actualizacion exitosa
        }else{
            echo -1; // hubo un problema al intentar Actualizar el registro
        }
    
    }else{
        echo 9; // no hay conexion
    }

} // FIN DE LA FUNCION


public function deleteRegistroExpediente($id,$conn,$dbase){

    if($conn){
    
        $sql = "delete from exp_expedientes where id = '$id'";
        mysqli_select_db($conn,$dbase);
        $query = mysqli_query($conn,$sql);
        
        if($query){
            echo 1; // registro eliminado 
        }else{
            echo -1; // error al intentar eliminar registro
        }
        
    }else{
        echo 9; // no hay conexion
    }

} // FIN DE LA FUNCION


public function enviarExpediente($oneExp,$id,$fecha_egreso,$destino,$conn,$dbase){

    if($conn){
    
        $sql = "update exp_expedientes set
                fecha_egreso = $oneExp->setFechaEgreso('$fecha_egreso'),
                destino = $oneExp->setDestino('$destino')
                where id = '$id'";
        
        $query = mysqli_query($conn,$sql);
        mysqli_select_db($conn,$dbase);
        
        if($query){
            echo 1; // actualizacion exitosa
        }else{
            echo -1; // hubo un problema al intentar Actualizar el registro
        }
    
    
    
    }else{
        echo 9; // sin conexion
    }


}


} // FIN DE CLASE



?>

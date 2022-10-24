<?php

class Expedientes{

    // PROPIEDADES
    private $nro_expediente = '';
    private $fecha_ingreso = '';
    private $asunto = '';
    private $procedencia = '';
    private $desc_ingreso = '';
    private $usuario_responsable = '';
    private $fecha_egreso = '';
    private $destino = '';
    private $desc_egreso = '';

    // CONSTRUCTOR DESPARAMETRIZADO
    private function __constructor(){
        $this->nro_expediente = '';
        $this->fecha_ingreso = '';
        $this->asunto = '';
        $this->procedencia = '';
        $this->desc_ingreso = '';
        $this->usuario_responsable = '';
        $this->fecha_egreso = '';
        $this->destino = '';
        $this->desc_egreso = '';
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
    
    private function setDescIngreso($var){
        $this->desc_ingreso = $var;
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
    
    private function setDescEgreso($var){
        $this->desc_egreso = $var;
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
    
    private function getDescIngreso($var){
        return $this->desc_ingreso = $var;
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
    
    private function getDescEgreso($var){
        return $this->desc_egreso = $var;
    }

    // METODOS
    
    public function listarExpedientes($oneExp,$nro_exp,$procedencia,$usuario_responsable,$fecha,$tipo_fecha,$asunto,$conn,$dbase){

        if($conn){
            
            if(($nro_exp == '') || ($procedencia == '') || ($usuario_responsable == '') || ($fecha == '') || ($asunto == '')){

                $sql = "SELECT * FROM exp_expedientes";
                mysqli_select_db($conn,$dbase);
                $resultado = mysqli_query($conn,$sql);

            }
            if($nro_exp != ''){

                $sql = "SELECT * FROM exp_expedientes where nro_exp = '$nro_exp'";
                mysqli_select_db($conn,$dbase);
                $resultado = mysqli_query($conn,$sql);

            }
            if($procedencia != ''){

                $sql = "SELECT * FROM exp_expedientes where procedencia = '$procedencia'";
                mysqli_select_db($conn,$dbase);
                $resultado = mysqli_query($conn,$sql);
            }
            if($usuario_responsable != ''){

                $sql = "SELECT * FROM exp_expedientes where usuario_responsable = '$usuario_responsable'";
                mysqli_select_db($conn,$dbase);
                $resultado = mysqli_query($conn,$sql);
            }
            if(($fecha != '') && ($tipo_fecha == '1')){

                $sql = "SELECT * FROM exp_expedientes where fecha_ingreso = '$fecha'";
                mysqli_select_db($conn,$dbase);
                $resultado = mysqli_query($conn,$sql);
            }
            if(($fecha != '') && ($tipo_fecha == '2')){

                $sql = "SELECT * FROM exp_expedientes where fecha_egreso = '$fecha'";
                mysqli_select_db($conn,$dbase);
                $resultado = mysqli_query($conn,$sql);
            }
            if($asunto != ''){

                $sql = "SELECT * FROM exp_expedientes where asunto = '$asunto'";
                mysqli_select_db($conn,$dbase);
                $resultado = mysqli_query($conn,$sql);
            }
            //mostramos fila x fila
            $count = 0;
            echo '<div class="container-fluid">
                    <div class="jumbotron">
                    <h3><span class="pull-center "><span class="glyphicon glyphicon-list-alt"></span> Listado de Expedientes</h3><hr>';
            
                    echo "<table class='table table-condensed table-hover' style='width:100%' id='expTable'>";
                    echo "<thead>
                    <th class='text-nowrap text-center'>Nro. Expediente</th>
                    <th class='text-nowrap text-center'>Fecha Ingreso</th>
                    <th class='text-nowrap text-center'>Asunto</th>
                    <th class='text-nowrap text-center'>Procedencia</th>
                    <th class='text-nowrap text-center'>Descripción Ingreso</th>
                    <th class='text-nowrap text-center'>Usuario Responsable</th>
                    <th class='text-nowrap text-center'>Fecha Egreso</th>
                    <th class='text-nowrap text-center'>Destino</th>
                    <th class='text-nowrap text-center'>Descripción Egreso</th>
                    <th class='text-nowrap text-center'>Acciones</th>
                    </thead>";


            while($fila = mysqli_fetch_array($resultado)){
                    // Listado normal
                    echo "<tr>";
                    echo "<td align=center>".$oneExp->getNroExpediente($fila['nro_exp'])."</td>";
                    echo "<td align=center>".$oneExp->getFechaIngreso($fila['fecha_ingreso'])."</td>";
                    echo "<td align=center>".$oneExp->getAsunto($fila['asunto'])."</td>";
                    echo "<td align=center>".$oneExp->getProcedencia($fila['procedencia'])."</td>";
                    echo "<td align=center>".$oneExp->getDescIngreso($fila['desc_ingreso'])."</td>";
                    echo "<td align=center>".$oneExp->getUsuarioResponsable($fila['usuario_responsable'])."</td>";
                    echo "<td align=center>".$oneExp->getFechaEgreso($fila['fecha_egreso'])."</td>";
                    echo "<td align=center>".$oneExp->getDestino($fila['destino'])."</td>";
                    echo "<td align=center>".$oneExp->getDescEgreso($fila['desc_egreso'])."</td>";
                    echo "<td class='text-nowrap'>";
                    
                    echo '<form action="#" method="POST">
                            <input type="hidden" id="id" name="id" value="'.$fila['id'].'">';
                        
                        if($oneExp->getFechaEgreso($fila['fecha_egreso']) == ''){
                           echo '<button type="submit" class="btn btn-default btn-sm" name="edit_exp" data-toggle="tooltip" data-placement="left" title="Editar Datos del Expediente">
                                <img src="../../icons/actions/document-edit.png"  class="img-reponsive img-rounded"> Editar</button>
                                
                           <button type="submit" class="btn btn-default btn-sm" name="delete_expediente" data-toggle="tooltip" data-placement="left" title="Eliminar Registro">
                                <img src="../../icons/actions/trash-empty.png"  class="img-reponsive img-rounded"> Borrar</button>
                            
                            <button type="submit" class="btn btn-default btn-sm" name="salida_exp" data-toggle="tooltip" data-placement="left" title="Envió de Expediente">
                                <img src="../../icons/actions/mail-forward.png"  class="img-reponsive img-rounded"> Envío</button>';
                        }else{
                            echo '<button type="submit" class="btn btn-default btn-sm btn-block" name="edit_egreso" data-toggle="tooltip" data-placement="left" title="Editar Datos de Egreso">
                                <img src="../../icons/actions/document-edit.png"  class="img-reponsive img-rounded"> Editar Egreso</button>';                            
                        }
                        
                            
                                        
              echo '</form>
                    </td>';
                    $count++;
                }

                echo "</table>";
                echo "<hr>";
                
                echo '<form <action="main.php" method="POST">
                    <button type="submit" class="btn btn-default btn-sm" name="nuevo_ingreso" data-toggle="tooltip" data-placement="top" title="Agregar Ingreso Expediente">
                    <img src="../../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Nuevo Ingreso</button>
                    
                    <button type="submit" class="btn btn-default btn-sm" name="busquedas_avanzadas" data-toggle="tooltip" data-placement="top" title="Búsqueda Avanzada de Expedientes">
                    <img src="../../icons/actions/system-search.png"  class="img-reponsive img-rounded"> Búsqueda Avanzada</button>
                    
              </form><hr>';
                
                echo '<div class="alert alert-info"><span class="glyphicon glyphicon-option-vertical"></span> Cantidad de Registros:  '.$count.' </div><hr>';
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
	    <div class="jumbotron">
	    <div class="row">
	    <div class="col-sm-12">
	       <h2><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Cargar Ingreso Expediente</h2><hr>
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
            <input type="text" class="form-control" id="asunto" name="asunto"  placeholder="Ingrese el asunto del Expediente" required>
            </div>
            
            <div class="form-group">
            <label for="asunto">Procedencia / Remitente</label>
            <input type="text" class="form-control" id="procedencia" name="procedencia" placeholder="Ingrese la procedencia o el remitente del documento. Ej. Organismo - Area /  Dirección - Funcionario" required>
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
		</div>
		
		<div class="form-group">
            <label for="desc_ingreso">Descripción Ingreso:</label>
            <textarea class="form-control" rows="5" id="desc_ingreso" name="desc_ingreso" placeholder="Ingrese una breve descripción del o los motivos a tratar por el docuemnto"></textarea>
        </div>
		<hr>
		
		
		<button type="submit" class="btn btn-default btn-block" id="add_nuevo_expediente">
            <img src="../../icons/devices/media-floppy.png"  class="img-reponsive img-rounded"> Guardar</button>
	      </form> <hr>
	      
	      
	      <div id="messageNewExp"></div>
	      
	    </div>
	    </div>
	</div></div>';

} // FIN DE LA FUNCION


/*
** FORMULARIO DE EDICION DE INGRESO
*/
public function formEditarExpediente($oneExp,$id,$conn,$dbase){
        
      $sql = "select * from exp_expedientes where id = '$id'";
      mysqli_select_db($conn,$dbase);
      $query = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($query);

      echo '<div class="container">
        <div class="jumbotron">
	    <div class="row">
	    <div class="col-sm-12">
	      <h2><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar Datos Expediente</h2><hr>
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
            </div>
            
            
            <div class="form-group">
            <label for="asunto">Procedencia / Remitente</label>
            <input type="text" class="form-control" id="procedencia" name="procedencia"  value="'.$oneExp->getProcedencia($row['procedencia']).'" required>
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
		</div>
		
		<div class="form-group">
            <label for="desc_ingreso">Descripción Ingreso:</label>
            <textarea class="form-control" rows="5" id="desc_ingreso" name="desc_ingreso" placeholder="Ingrese una breve descripción del o los motivos a tratar por el docuemnto">'.$oneExp->getDescIngreso($row['desc_ingreso']).'</textarea>
        </div>
		<hr>
		
		
		<button type="submit" class="btn btn-default btn-block" id="update_expediente">
            <img src="../../icons/actions/view-refresh.png"  class="img-reponsive img-rounded"> Actualizar</button>
	      </form> <hr>
	      
	    </div>
	    </div>
	</div></div>';

} // FIN DE LA FUNCION


/*
** FORMULARIO DE EDICION DE EGRESO
*/
public function formEditarEgreso($oneExp,$id,$conn,$dbase){
        
      $sql = "select * from exp_expedientes where id = '$id'";
      mysqli_select_db($conn,$dbase);
      $query = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($query);

      echo '<div class="container">
        <div class="jumbotron">
	    <div class="row">
	    <div class="col-sm-12">
	      <h2><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar Datos de Egreso Expediente</h2><hr>
	        <form id="fr_update_expediente_egreso_ajax" method="POST">
	        <input type="hidden" id="id" name="id" value="'.$id.'">
	        
	        <div class="form-group">
            <label for="nro_expediente">Número de Expediente</label>
            <input type="text" class="form-control" id="nro_expediente" name="nro_expediente" value="'.$oneExp->getNroExpediente($row['nro_exp']).'" disabled required>
            </div>
	        
	        <div class="form-group">
            <label for="fecha_ingreso">Fecha Egreso</label>
            <input type="date" class="form-control" id="fecha_egreso" name="fecha_egreso"  value="'.$oneExp->getFechaEgreso($row['fecha_egreso']).'" required>
            </div>
            
            <div class="form-group">
            <label for="asunto">Asunto</label>
            <input type="text" class="form-control" id="asunto" name="asunto"  value="'.$oneExp->getAsunto($row['asunto']).'" disabled required>
            </div>
            
            
            <div class="form-group">
            <label for="destino">Destino</label>
            <input type="text" class="form-control" id="destino" name="destino"  value="'.$oneExp->getDestino($row['destino']).'" required>
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
		</div>
		
		<div class="form-group">
            <label for="desc_egreso">Descripción Egreso:</label>
            <textarea class="form-control" rows="5" id="desc_egreso" name="desc_egreso" placeholder="Ingrese una breve descripción del o los motivos a tratar por el documento">'.$oneExp->getDescEgreso($row['desc_egreso']).'</textarea>
        </div>
		<hr>
		
		
		<button type="submit" class="btn btn-default btn-block" id="update_egreso">
            <img src="../../icons/actions/view-refresh.png"  class="img-reponsive img-rounded"> Actualizar Egreso</button>
	      </form> <hr>
	      
	    </div>
	    </div>
	</div></div>';

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
            <div class="jumbotron">
            <div class="row">
            <div class="col-sm-12">
	      
	     
            <h2><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Enviar Expediente</h2>
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
            </div>
		
            <div class="form-group">
            <label for="destino">Destino / Receptor</label>
            <input type="text" class="form-control" id="destino" name="destino" placeholder="Ingrese el destino o el remitente del documento. Ej. Organismo - Area /  Dirección - Funcionario" required>
            </div>
            
            <div class="form-group">
            <label for="desc_egreso">Descripción Egreso:</label>
            <textarea class="form-control" rows="5" id="desc_egreso" name="desc_egreso" placeholder="Ingrese una breve descripción del o los motivos del envio del documento"></textarea>
            </div>
            <hr>
		
		
		<button type="submit" class="btn btn-default btn-block" id="update_enviar_expediente">
            <span class="glyphicon glyphicon-share" aria-hidden="true"></span> Enviar</button>
	      </form>
	      
	    </div>
	    </div>
        </div>
        </div>';

} // FIN DE LA FUNCION


public function formDeleteExpediente($id,$oneExp,$conn,$dbase){
    
    mysqli_select_db($conn,$dbase);
    $sql = "select * from exp_expedientes where id = '$id'";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($query);
    
    echo '<div class="container">
  
            <div class="jumbotron">
                <h3><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar Registro</h3><hr>     
                
                <div class="alert alert-danger">
                <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> <strong>Atención!</strong> Está por eliminar un registro con los siguientes datos. Si está seguro presione <strong>Aceptar</strong>, de lo contrario presione <strong>Volver a Expedientes</strong>.
                </div><hr>
                
            <form id="fr_delete_expediente_ajax" method="POST">
            <input type="hidden" id="id" name="id" value="'.$id.'">
            
            <div class="form-group">
                <label for="expediente">Expediente NRO.:</label>
                <input type="text" class="form-control" id="nro_exp" name="nro_exp" value="'.$oneExp->getNroExpediente($row['nro_exp']).'" readonly>
            </div>
            <div class="form-group">
                <label for="asunto">Asunto:</label>
                <input type="text" class="form-control" id="asunto" name="asunto" value="'.$oneExp->getAsunto($row['asunto']).'" readonly>
            </div>
            
            <button type="submit" class="btn btn-default btn-block" id="eliminar_exp"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Aceptar</button>
            </form>
            <form actino="#" method="POST">
            <button type="submit" class="btn btn-default btn-block" name="expedientes"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Volver a Expedientes</button>
            </form>
            <hr>
            
            <div id="messageDeleteExpediente"></div>
                
            </div>
                
        </div>';

}



public function addIngresoExpediente($oneExp,$nro_expediente,$fecha_ingreso,$asunto,$procedencia,$usuario_responsable,$desc_ingreso,$conn,$dbase){

    if($conn){

    $sql = "INSERT INTO exp_expedientes ".
                "(
                  nro_exp,
                  fecha_ingreso,
                  asunto,
                  procedencia,
                  usuario_responsable,
                  desc_ingreso
                  )".
                "VALUES ".
                "(
                  $oneExp->setNroExpediente('$nro_expediente'),
                  $oneExp->setFechaIngreso('$fecha_ingreso'),
                  $oneExp->setAsunto('$asunto'),
                  $oneExp->setProcedencia('$procedencia'),
                  $oneExp->setUsuarioResponsable('$usuario_responsable'),
                  $oneExp->setDescIngreso('$desc_ingreso')
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


public function updateIngresoExpediente($oneExp,$id,$nro_expediente,$fecha_ingreso,$asunto,$procedencia,$usuario_responsable,$desc_ingreso,$conn,$dbase){

    if($conn){
        
        $sql = "update exp_expedientes set
                nro_exp = $oneExp->setNroExpediente('$nro_expediente'),
                fecha_ingreso = $oneExp->setFechaIngreso('$fecha_ingreso'),
                asunto = $oneExp->setAsunto('$asunto'),
                procedencia = $oneExp->setProcedencia('$procedencia'),
                usuario_responsable = $oneExp->setUsuarioResponsable('$usuario_responsable'),
                desc_ingreso = $oneExp->setDescIngreso('$desc_ingreso')
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



public function updateEgresoExpediente($oneExp,$id,$fecha_egreso,$destino,$usuario_responsable,$desc_egreso,$conn,$dbase){

    if($conn){
        
        $sql = "update exp_expedientes set
                fecha_egreso = $oneExp->setFechaEgreso('$fecha_egreso'),
                destino = $oneExp->setDestino('$destino'),
                usuario_responsable = $oneExp->setUsuarioResponsable('$usuario_responsable'),
                desc_egreso = $oneExp->setDescEgreso('$desc_egreso')
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


public function enviarExpediente($oneExp,$id,$fecha_egreso,$destino,$desc_egreso,$conn,$dbase){

    if($conn){
       
        mysqli_select_db($conn,$dbase);
        $sql = "update exp_expedientes set
                fecha_egreso = $oneExp->setFechaEgreso('$fecha_egreso'),
                destino = $oneExp->setDestino('$destino'),
                desc_egreso = $oneExp->setDescEgreso('$desc_egreso')
                where id = '$id'";
        
        $query = mysqli_query($conn,$sql);
        
        
        if($query){
            echo 1; // actualizacion exitosa
        }else{
            echo -1; // hubo un problema al intentar Actualizar el registro
        }
    
    
    
    }else{
        echo 9; // sin conexion
    }


}


public function analytics($oneExp,$conn,$dbase){
    
    mysqli_select_db($conn,$dbase);
    // SE CALCULA LA TOTALIDAD DE EXPEDIENTES
    $sql = "select count(*) as cantidad from exp_expedientes";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query);
    // =============================================================== //
    
    //SE CALCULA LA CANTIDAD DE EXPEDIENTES INGRESADOS EN LA ULTIMO SEMANA
    $sql_1 = "select count(*) as cantidad from exp_expedientes where fecha_ingreso between date_sub(now(), interval 1 week) and now()";
    $query_1 = mysqli_query($conn,$sql_1);
    $row_1 = mysqli_fetch_assoc($query_1);
    // =============================================================== //
    
    //SE CALACULA LA CANTIDAD DE EXPEDIENTES INGRESADOS EN EL ULTIMO MES
    $sql_2 = "select count(*) as cantidad from exp_expedientes where fecha_ingreso between date_sub(now(), interval 1 month) and now()";
    $query_2 = mysqli_query($conn,$sql_2);
    $row_2 = mysqli_fetch_assoc($query_2);
    // =============================================================== //
    
    //SE CALACULA LA CANTIDAD DE EXPEDIENTES INGRESADOS EN EL ULTIMO AÑO
    $sql_3 = "select count(*) as cantidad from exp_expedientes where fecha_ingreso between date_sub(now(), interval 1 year) and now()";
    $query_3 = mysqli_query($conn,$sql_3);
    $row_3 = mysqli_fetch_assoc($query_3);
    // =============================================================== //
    
    //SE CALACULA LA CANTIDAD DE EXPEDIENTES AGRUPADOS POR USUARIO RESPONSABLE
    $sql_4 = "select usuario_responsable, count(*) as cantidad from exp_expedientes group by usuario_responsable ASC";
    $query_4 = mysqli_query($conn,$sql_4);
    // =============================================================== //
    
    //SE CALACULA LA CANTIDAD DE EXPEDIENTES EN EL AREA
    $sql_5 = "select count(*) as cantidad from exp_expedientes where fecha_ingreso IS NOT NULL and fecha_egreso IS NULL";
    $query_5 = mysqli_query($conn,$sql_5);
    $row_5 = mysqli_fetch_assoc($query_5);
    // =============================================================== //
    
    //SE CALACULA LA CANTIDAD DE EXPEDIENTES ENVIADOS
    $sql_6 = "select count(*) as cantidad from exp_expedientes where fecha_ingreso IS NOT NULL and fecha_egreso IS NOT NULL";
    $query_6 = mysqli_query($conn,$sql_6);
    $row_6 = mysqli_fetch_assoc($query_6);
    


    echo '<div class="container-fluid">
            <div class="jumbotron">
          
                
                    
                    <div class="alert alert-info">
                        <h4><span class="glyphicon glyphicon-equalizer" aria-hidden="true"></span> Estadísticas sobre Expedientes</h4><hr>
                    </div>
                    
                    <div class="row">
                        
                        <div class="col-sm-3">
                            <div class="well">
                                <h4><span class="glyphicon glyphicon-th" aria-hidden="true"></span> Total Expedientes</h4>
                                <p>Cantidad: <span class="label label-default">'.$row['cantidad'].'</span></p> 
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="well">
                                <h4><span class="glyphicon glyphicon-th" aria-hidden="true"></span> Expedientes ingresados en la última semana</h4>
                                <p>Cantidad: <span class="label label-default">'.$row_1['cantidad'].'</span></p> 
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="well">
                                <h4><span class="glyphicon glyphicon-th" aria-hidden="true"></span> Expedientes ingresados en el último mes</h4>
                                <p>Cantidad: <span class="label label-default">'.$row_2['cantidad'].'</span></p> 
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="well">
                                <h4><span class="glyphicon glyphicon-th" aria-hidden="true"></span> Expedientes ingresados el último Año</h4>
                                <p>Cantidad: <span class="label label-default">'.$row_3['cantidad'].'</span></p>  
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12">
                            
                            <div class="well">
                                <h2>Cantidad de Expedientes por Usuario Reponsable</h2>
                                
                                <table class="table table-condensed table-hover" style="width:100%" id="groupByUserTable">
                                    <thead>
                                    <tr>
                                        <th class="text-nowrap text-center">Usuario Responsable</th>
                                        <th class="text-nowrap text-center">Cantidad</th>
                                        </thead>
                                    </tr>
                                    </thead>
                                    <tbody>';
                                    
                                    while($fila = mysqli_fetch_array($query_4)){
                                    // Listado normal
                                    echo "<tr>";
                                    echo "<td align=center>".$oneExp->getUsuarioResponsable($fila['usuario_responsable'])."</td>";
                                    echo "<td align=center>".$fila['cantidad']."</td>";
                                    
                                    }
                                    
                                    echo '</tbody>
                                          </table>
                                          </div>
                            
                            
                        </div>
                    
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="well">
                                <h4><span class="glyphicon glyphicon-th" aria-hidden="true"></span> Expedientes enviados</h4>
                                <p>Cantidad: <span class="label label-default">'.$row_6['cantidad'].'</span></p>
                            </div>
                        </div>
                        
                        <div class="col-sm-4">
                            <div class="well">
                                <h4><span class="glyphicon glyphicon-th" aria-hidden="true"></span> Expedientes en el Area</h4>
                                <p>Cantidad: <span class="label label-default">'.$row_5['cantidad'].'</span></p>
                            </div>
                        </div>
                    </div>
                
                
            
            </div>
        </div>';

}


public function advanceSearch(){

    echo '<div class="container">

            <div class="jumbotron">
            <h1><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Búsquedas Avanzadas</h1>      
            <p>Seleccione el tipo de búsqueda que desea realizar</p><hr>
            
            <form action="#" method="POST">
            
            <div class="row">
                <button type="submit" class="btn btn-default" name="search_exp"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Búsqueda por Nro. Expediente / Documento</button>
                <button type="submit" class="btn btn-default" name="search_procedencia"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Búsqueda por Procedencia</button>
                <button type="submit" class="btn btn-default" name="search_responsable"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Búsqueda por Usuario Responsable</button>
            </div><hr>
            
            <div class="row">
                <button type="submit" class="btn btn-default" name="search_fechas"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Búsqueda por Fecha Ingreso o Fecha Egreso</button>
                <button type="submit" class="btn btn-default" name="search_asunto"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Búsqueda por Asunto</button>
            </div>
            
            </form>
            
            </div>
                
        </div>';
}



public function searchByExp(){

    echo '<div class="container">

            <div class="jumbotron">
            <h2><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Búsqueda por Nro. Expdiente / Documento</h2><hr>
            
            <div class="alert alert-info">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <strong>Importante!</strong> Ingrese el Nro. del expdiente exactamente igual a como se encuentra en el Sistema GDE
            </div>
                
            <form action="#" method="POST">
            
            <div class="row">
                
                <div class="form-group">
                    <label for="nro_exp">Nro. Expediente / Documento:</label>
                    <input type="text" class="form-control" id="nro_exp" name="nro_exp">
                </div>
                
                <button type="submit" class="btn btn-default btn-block" name="search_by_nro_exp"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar</button>
                <button type="submit" class="btn btn-default btn-block" name="expedientes"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Volver a Expedientes</button>
                
            </div>
            
            </form>
            
            </div>
                
        </div>';

}


public function searchByProcedencia($conn,$dbase){

    echo '<div class="container">

            <div class="jumbotron">
            <h2><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Búsqueda por Procedencia del Documento</h2><hr>
            
            <div class="alert alert-info">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <strong>Importante!</strong> Seleccione la dependencia proveniente del documento
            </div>
                
            <form action="#" method="POST">
            
            <div class="row">
            
            <div class="form-group">
            <label for="asunto">Procedencia / Remitente</label>
            <input type="text" class="form-control" id="procedencia" name="procedencia" placeholder="Ingrese la procedencia o el remitente del documento. Ej. Organismo - Area /  Dirección - Funcionario" >
            </div>
                
            <button type="submit" class="btn btn-default btn-block" name="search_by_procedencia"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar</button>
            <button type="submit" class="btn btn-default btn-block" name="expedientes"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Volver a Expedientes</button>
                
            </div>
            
            </form>
            
            </div>
                
        </div>';

}


public function searchByResponsable($conn,$dbase){

    echo '<div class="container">

            <div class="jumbotron">
            <h2><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Búsqueda por Usuario Responsable</h2><hr>
            
            <div class="alert alert-info">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <strong>Importante!</strong> Seleccione la dependencia proveniente del documento
            </div>
                
            <form action="#" method="POST">
            
            <div class="row">
                
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
                  </div><br>
                
                <button type="submit" class="btn btn-default btn-block" name="search_usuario_responsable"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar</button>
                <button type="submit" class="btn btn-default btn-block" name="expedientes"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Volver a Expedientes</button>
                
            </div>
            
            </form>
            
            </div>
                
        </div>';

}


public function searchByFecha(){

    echo '<div class="container">

            <div class="jumbotron">
            <h2><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Búsqueda por Fecha de Ingreso</h2><hr>
            
            <div class="alert alert-info">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <strong>Importante!</strong> Seleccione la fehca en la que ingresó el documento
            </div>
                
            <form action="#" method="POST">
            
            <div class="row">
            
            <div class="form-group">
            <label for="fecha_ingreso">Seleccione la Fecha</label>
            <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div><br>
            
            <div class="form-group">
            <label for="tipo_fecha">Tipo Fecha:</label>
            <select class="form-control" id="tipo_fecha" name="tipo_fecha">
                <option value="" selected disabled>Seleccionar</option>
                <option value="1">Fecha Ingreso</option>
                <option value="2">Fecha Egreso</option>
            </select>
            </div><br>
                
            <button type="submit" class="btn btn-default btn-block" name="search_by_fechas"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar</button>
            <button type="submit" class="btn btn-default btn-block" name="expedientes"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Volver a Expedientes</button>
                
            </div>
            
            </form>
            
            </div>
                
        </div>';

}


public function searchByAsunto(){

    echo '<div class="container">

            <div class="jumbotron">
            <h2><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Búsqueda por Fecha de Ingreso</h2><hr>
            
            <div class="alert alert-info">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <strong>Importante!</strong> Ingrese el asunto sobre el que trata el documento
            </div>
                
            <form action="#" method="POST">
            
            <div class="row">
            
            <div class="form-group">
            <label for="fecha_ingreso">Ingrese el asunto</label>
            <input type="text" class="form-control" id="asunto" name="asunto" placeholder="Ingrese el asunto sobre el que trata la documentación" required>
            </div>
                
            <button type="submit" class="btn btn-default btn-block" name="search_by_asunto"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar</button>
            <button type="submit" class="btn btn-default btn-block" name="expedientes"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Volver a Expedientes</button>
                
            </div>
            
            </form>
            
            </div>
                
        </div>';

}


} // FIN DE CLASE



?>

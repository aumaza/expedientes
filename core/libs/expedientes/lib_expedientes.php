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
            echo '<div class="container-fluid">
                    <div class="jumbotron">
                    <h3><span class="pull-center "><span class="glyphicon glyphicon-list-alt"></span> Listado de Expedientes</h3><hr>';
            
                    echo "<table class='table table-condensed table-hover' style='width:100%' id='expTable'>";
                    echo "<thead>
                    <th class='text-nowrap text-center'>Nro. Expediente</th>
                    <th class='text-nowrap text-center'>Fecha Ingreso</th>
                    <th class='text-nowrap text-center'>Asunto</th>
                    <th class='text-nowrap text-center'>Procedencia</th>
                    <th class='text-nowrap text-center'>Usuario Responsable</th>
                    <th class='text-nowrap text-center'>Fecha Egreso</th>
                    <th class='text-nowrap text-center'>Destino</th>
                    <th class='text-nowrap text-center'>Acciones</th>
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
                    
                    echo '<form action="#" method="POST">
                            <input type="hidden" id="id" name="id" value="'.$fila['id'].'">';
                        
                        if($oneExp->getFechaEgreso($fila['fecha_egreso']) == ''){
                           echo '<button type="submit" class="btn btn-info btn-sm" name="edit_exp" data-toggle="tooltip" data-placement="left" title="Editar Datos del Expediente">
                                <img src="../../icons/actions/document-edit.png"  class="img-reponsive img-rounded"> Editar</button>
                                
                           <button type="submit" class="btn btn-danger btn-sm" name="delete_expediente" data-toggle="tooltip" data-placement="left" title="Eliminar Registro">
                                <img src="../../icons/actions/trash-empty.png"  class="img-reponsive img-rounded"> Borrar</button>
                            
                            <button type="submit" class="btn btn-default btn-sm" name="salida_exp" data-toggle="tooltip" data-placement="left" title="Envió de Expediente">
                                <img src="../../icons/actions/mail-forward.png"  class="img-reponsive img-rounded"> Envío</button>';
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
                    
                    <button type="submit" class="btn btn-default btn-sm" name="busqueda_avanzada" data-toggle="tooltip" data-placement="top" title="Búsqueda Avanzada de Expedientes">
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
            <input type="text" class="form-control" id="asunto" name="asunto" placeholder="Ingrese una breve descripción del tema que trata el expediente" required>
            </div>';
		
		
		echo '<div class="form-group">
                <label for="procedencia">Procedencia / Remitente</label>
                <select class="form-control" id="procedencia" name="procedencia" required>
                <option value="" disabled selected>Seleccionar</option>';
		    
		    if($conn){
		      $query = "SELECT cartera, apertura FROM exp_carteras_ministerial group by apertura";
		      mysqli_select_db($conn,$dbase);
		      $res = mysqli_query($conn,$query);

		      if($res){
				  while ($valores = mysqli_fetch_array($res)){
                    echo '<option value="'.$valores[apertura].'">'.$valores[cartera].' - '.$valores[apertura].'</option>';
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
	      
	      
	      <div id="messageNewExp"></div>
	      
	    </div>
	    </div>
	</div></div>';

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
            <span class="glyphicon glyphicon-share" aria-hidden="true"></span> Enviar</button>
	      </form> <hr>
	      
	    </div>
	    </div>
	</div></div>';

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
                                <h4><span class="glyphicon glyphicon-th" aria-hidden="true"></span> Expedientes ingresados en la último semana</h4>
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


} // FIN DE CLASE



?>

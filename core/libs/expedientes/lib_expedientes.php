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
                    <th>&nbsp;</th>
                    </thead>";


            while($fila = mysqli_fetch_array($resultado)){
                    // Listado normal
                    echo "<tr>";
                    echo "<td align=center>".$oneExp->getNroExpediente($fila['nro_expediente'])."</td>";
                    echo "<td align=center>".$oneExp->getFechaIngreso($fila['fecha_ingreso'])."</td>";
                    echo "<td align=center>".$oneExp->getAsunto($fila['asunto'])."</td>";
                    echo "<td align=center>".$oneExp->getProcedencia($fila['procedencia'])."</td>";
                    echo "<td align=center>".$oneExp->getUsuarioResponsable($fila['usuario_responsable'])."</td>";
                    echo "<td align=center>".$oneExp->getFechaEgreso($fila['fecha_egreso'])."</td>";
                    echo "<td align=center>".$oneExp->getDestino($fila['destino'])."</td>";
                    echo "<td class='text-nowrap'>";
                    
                    echo '<form <action="main.php" method="POST">
                            <input type="hidden" name="id" value="'.$fila['id'].'">
                                            
                            <button type="submit" class="btn btn-info btn-sm" name="edit_exp" data-toggle="tooltip" data-placement="top" title="Editar Datos del Expediente">
                                <img src="../../icons/actions/document-edit.png"  class="img-reponsive img-rounded"> Editar</button>
                            
                            <button type="submit" class="btn btn-danger btn-sm" name="del_exp" data-toggle="tooltip" data-placement="top" title="Eliminar Registro">
                                <img src="../../icons/actions/edit-delete.png"  class="img-reponsive img-rounded"> Borrar</button>
                            
                            <button type="submit" class="btn btn-default btn-sm" name="salida_exp" data-toggle="tooltip" data-placement="top" title="Envió de Expediente">
                                <img src="../../icons/actions/help-about.png"  class="img-reponsive img-rounded"> Envío</button>
                                        
                    </form>
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

    }
    
} // FIN DE CLASE



?>

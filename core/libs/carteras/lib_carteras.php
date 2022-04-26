<?php

class Carteras{

    // PROPIEDADES
    private $cartera = '';
    private $subjurisdiccion = '';
    private $apertura = '';
    private $unidad = '';
    private $tipo_organismo = '';
    
    // CONSTRUTOR DESPRAMETRIZADO
    private function __constructor(){
        $this->cartera = '';
        $this->subjurisdiccion = '';
        $this->apertura = '';
        $this->unidad = '';
        $this->tipo_organismo = '';        
    }
    
    // SETTERS
    private function setCartera($var){
        $this->cartera = $var;
    }
    
    private function setSubjurisdiccion($var){
        $this->subjurisdiccion = $var;
    }
    
    private function setApertura($var){
        $this->apertura = $var;
    }
    
    private function setUnidad($var){
        $this->unidad = $var;
    }
    
    private function setTipoOrganismo($var){
        $this->tipo_organismo = $var;
    }
    
    // GETTERS
    private function getCartera($var){
        return $this->cartera = $var;
    }
    
    private function getSubjurisdiccion($var){
        return $this->subjurisdiccion = $var;
    }
    
    private function getApertura($var){
        return $this->apertura = $var;
    }
    
    private function getUnidad($var){
        return $this->unidad = $var;
    }
    
    private function getTipoOrganismo($var){
        return $this->tipo_organismo = $var;
    }

    // METODOS

    public function listarCarteras($oneCartera,$conn,$dbase){

        if($conn){
        
            $sql = "SELECT * FROM exp_carteras_ministerial group by apertura";
                mysqli_select_db($conn,$dbase);
                $resultado = mysqli_query($conn,$sql);
            //mostramos fila x fila
            $count = 0;
            echo '<div class="container-fluid" style="margin-top:70px">
                    <div class="panel panel-default" >
                <div class="panel-heading"><span class="pull-center "><img src="../../icons/actions/meeting-attending.png"  class="img-reponsive img-rounded"> Listado de Dependencias';
            
                
            echo '</div><br>';

                    echo "<table class='table table-condensed table-hover' style='width:100%' id='myTable'>";
                    echo "<thead>
                    <th class='text-nowrap text-center'>Cartera</th>
                    <th class='text-nowrap text-center'>Dependencia</th>
                    <th>&nbsp;</th>
                    </thead>";


            while($fila = mysqli_fetch_array($resultado)){
                    // Listado normal
                    echo "<tr>";
                    echo "<td align=center>".$oneCartera->getCartera($fila['cartera'])."</td>";
                    echo "<td align=center>".$oneCartera->getApertura($fila['apertura'])."</td>";
                    echo "<td class='text-nowrap'>";
                    echo "</td>";
                    $count++;
                }

                echo "</table>";
                echo "<br>";
                echo '<button type="button" class="btn btn-primary">Cantidad de Registros:  '.$count.' </button>';
                echo '</div></div>';
                }else{
                echo 'Connection Failure...' .mysqli_error($conn);
                }

            mysqli_close($conn);

}


} // FIN DE CLASE



?>

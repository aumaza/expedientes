<?php 

// ENCABEZADO
function encabezado(){
    
    echo '<div class="panel panel-default">
            <div class="panel-heading" align="center">
                <h4><img class="img-reponsive img-rounded" src="../../img/escudo32x32.png" />
                    <strong>Ministerio de Economía de la Nación - Dirección de Presupuesto y Evaluación de Gastos en Personal</strong>
                </h4>
            </div>
          </div>';
}


// BARRA DE NAVEGACION
function navBar($varsession,$nombre){

    echo '<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
            <div class="container-fluid">
                <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                </button>
                
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                
                <a href="main.php" data-toggle="tooltip" data-placement="bottom" title="Gestión de Expedientes">
                <button type="button" class="btn btn-default navbar-btn">
                <img class="img-reponsive img-rounded" src="../../icons/actions/go-home.png" /> Home</button></a>
                </ul>
                <ul class="nav navbar-nav">
                
                <form action="main.php" method="POST">
                
                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Editar Datos Personales">
                <button type="submit" name="usuario" class="btn btn-default navbar-btn">
                <img class="img-reponsive img-rounded" src="../../icons/actions/view-media-artist.png" /> '.$nombre.'</button></a>';
                
                if($varsession == 'root'){
                
                    echo '<a href="#" data-toggle="tooltip" data-placement="bottom" title="Editar Usuarios">
                    <button type="submit" name="usuarios" class="btn btn-default navbar-btn">
                    <img class="img-reponsive img-rounded" src="../../icons/actions/meeting-attending.png" /> Usuarios</button></a>';
                }
                
                
        echo '</form>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                
                <a href="../../logout.php" data-toggle="tooltip" data-placement="left" title="Cerrar Sesión"> 
                <button class="btn btn-danger navbar-btn">
                    <img class="img-reponsive img-rounded" src="../../icons/actions/go-previous-view.png" /> Salir</button></a>
                </ul>
                </div>
            </div>
            </nav>';

}


// LEFT PANEL
function leftPanel($varsession){

    echo '<div class="container-fluid">

            <div class="row content">
                <div class="col-sm-2 sidenav">
                <form action="#" method="POST">
                
                <div class="panel-group" id="accordion">
            
            
            <div class="panel panel-default" align="center">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Menú Principal</a>
                    </h4>
                </div>
                
                <div id="collapse2" class="panel-collapse collapse">
                    <div class="panel-body">
                
                        <button type="submit" class="btn btn-default btn-xs btn-block" name="expedientes" data-toggle="tooltip" data-placement="right" title="Listar Expedientes trabajados en la Dirección">
                                <img class="img-reponsive img-rounded" src="../../icons/places/folder-yellow.png" /> Expedientes</button><hr>
                        
                        
                
                    </div>
                </div>
            </div>
            </div>
            
            
                            
                            
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default" align="center">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                        Aperturas Organizativas</a>
                                    </h4>
                                </div>
                                
                                <div id="collapse4" class="panel-collapse collapse">
                                    <div class="panel-body">
                                
                                    <button type="submit" class="btn btn-default btn-xs btn-block" name="carteras" data-meeting-participanttoggle="tooltip" data-placement="right" title="Listar Dependencias Organizativas">
                                        <img class="img-reponsive img-rounded" src="../../icons/actions/code-class.png" /> Dependencias</button>
                                
                                    </div>
                                </div>
                            </div>
                        
                            
                            <div class="panel panel-default" align="center">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                                        Jurisdicciones</a>
                                    </h4>
                                </div>
                                
                                <div id="collapse5" class="panel-collapse collapse">
                                    <div class="panel-body">
                                
                                        <button type="submit" class="btn btn-default btn-xs btn-block" name="L" data-toggle="tooltip" data-placement="right" title="Listar Jurisdicciones">
                                            <img class="img-reponsive img-rounded" src="../../icons/actions/view-file-columns.png" /> Jurisdicciones</button>
                                
                                    </div>
                                </div>
                            </div>
                        </div>
                
                          
            
                    </form>
                  </div>';

}


// BOTONES INFORMATIVOS
function infoButttons(){

        echo '<button class="btn btn-default navbar-btn">
                <img class="img-reponsive img-rounded" src="../../icons/apps/clock.png" /><strong>Hora Actual:</strong>'.date("H:i").'</button>';
            setlocale(LC_ALL,"es_ES.UTF-8");
            
        echo '<button class="btn btn-default navbar-btn">
                <img class="img-reponsive img-rounded" src="../../icons/actions/view-calendar-day.png" /><strong>Fecha Actual:</strong>'.strftime("%d de %b de %Y").'</button>';
            
        echo '<button type="button" class="btn btn-default navbar-btn" data-toggle="modal" data-target="#myModal2">
                    <img class="img-reponsive img-rounded" src="../../icons/apps/accessories-dictionary.png" /> Acerca de Gestión de Expedientes</button><hr>';
                    
                

}



?>

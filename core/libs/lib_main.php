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

function mainNavBar($nombre){

    echo '<nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                
                <div class="btn-group">
                <button type="button" class="btn btn-default navbar-btn dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-flash" aria-hidden="true"></span> Inicio <span class="caret"></span></button>
                <ul class="dropdown-menu" role="menu">
                    
                    <form action="" method="POST">
                        
                        <li><button type="submit" class="btn btn-default btn-block" name="expedientes"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> Expedientes</button></li>
                        <li><button type="submit" class="btn btn-default btn-block" name="statistics"><span class="glyphicon glyphicon-equalizer" aria-hidden="true"></span> Estadísticas</button></li>
                        <li><button type="submit" class="btn btn-default btn-block" name="carteras"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Dependencias</button></li>';
                        
                        if($nombre == 'Administrador'){
                            echo '<li><button type="submit" class="btn btn-default btn-block" name="usuarios"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuarios</button></li>
                                  <li><button type="submit" class="btn btn-default btn-block" name="database_files"><span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span> Database Files</button></li>';
                        }
                echo '<li><button type="submit" class="btn btn-warning btn-block" name="usuario"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Cambiar Password</button></li>
                        <li class="divider"></li>
                        <li><button type="submit" class="btn btn-danger btn-block" name="logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Salir</button></li>
                        
                        
                    </form>
                    
                </ul>
                
                </div>
                
                </div>
                
                <ul class="nav navbar-nav navbar-right">
                    <form action="main.php" method="POST">
                        <button class="btn btn-default navbar-btn" name="home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</button>
                    </form>
                </ul>
                
            </div>
            </nav>';
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


/*
** SYSTEM LOGOUT
*/
function logOut($nombre){
    
    $img = file_get_contents('../../img/loading_1.gif');
    $img_64 = base64_encode($img);
    $image_source = 'data: image/gif;base64,' . $img_64;
    
    echo ' <div class="container">
            <div class="jumbotron">
                <h1 align="center">Hasta Luego '.$nombre.'</h1><hr>
                <p align="center"><img src="'.$image_source.'"  class="img-reponsive img-rounded" width="256" height="256"></p><hr>
                <meta http-equiv="refresh" content="5;URL=../../logout.php "/>
            </div>
            </div>';

}


function databaseFiles(){

    $path = '../../sqls/';

    if($filehandle = opendir($path)){

        $list = array();
        $count = 0;
    
        while($file = readdir($filehandle)){

            if($file != "." && $file != ".."){
            
                $list[] = $file;
                $count++;
            }
        }
    }

    echo '<div class="container">
          <div class="jumbotron">
            <h2><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Archivos backup de Base de datos</h2>      
            <p>Descarga de archivos SQL de Backup de base de datos</p><hr>

            <div class="panel panel-primary">
                <div class="panel-heading"><span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span> Archivos </div>
                <div class="panel-body">
                     <div class="list-group">';
                        
                        for($i = 0; $i < $count; $i++){
                            echo '<a class="list-group-item" href="download.php?file_name='.$list[$i].'&path='.$path.'" >'.($i+1). ' - ' .$list[$i].' <span class="badge">' .filesize($path.$list[$i]).'</span></a>';
                        }       
                        
          echo '</div>
                </div>
                <div class="panel-footer"><strong>Cantidad de Archivos:</strong> <span class="badge">'.$count.'</span></div>
             </div>

          </div>
         </div>';

}

?>

<?php

class Usuarios{

    // PROPIEDADES
    private $nombre = '';
    private $usuario = '';
    private $password = ''; 
    private $email = ''; 
    private $role = '';
    private $avatar = '';
    
    // CONSTRUCTOR DESPARAMETRIZADO
    private function __constructor(){
        $this->nombre = '';
        $this->usuario = '';
        $this->password = '';
        $this->email = '';
        $this->role = '';
        $this->avatar = '';    
    }
    
    // SETTERS
    private function setNombre($var){
        $this->nombre = $var;
    }
    
    private function setUsuario($var){
        $this->usuario = $var;
    }
    
    private function setPassword($var){
        $this->password = $var;
    }
    
    private function setEmail($var){
        $this->email = $var;
    }
    
    private function setRole($var){
        $this->role = $var;
    }
    
    private function setAvatar($var){
        $this->avatar = $var;
    }
    
    // GETTERS
    private function getNombre($var){
        return $this->nombre = $var;
    }
    
    private function getUsuario($var){
        return $this->usuario = $var;
    }
    
    private function getPassword($var){
        return $this->password = $var;
    }
    
    private function getEmail($var){
        return $this->email = $var;
    }
    
    private function getRole($var){
        return $this->role = $var;
    }
    
    private function getAvatar($var){
        return $this->avatar = $var;
    }

    // METODOS
    
    public function moduloUsuarios($oneUsuario,$conn,$dbase){
    
        echo '<div class="container-fluid">

                    <div class="jumbotron">
                    <h3><span class="pull-center "><span class="glyphicon glyphicon-user"></span> Administración de Usuarios</h3><hr>
                            <div class="panel-body"> 
                                <ul class="nav nav-tabs nav-justified">
                                    <li class="active"><a href="#usuarios" a data-toggle="tab"><img src="../../icons/actions/meeting-attending.png"  class="img-reponsive img-rounded"> Usuarios</a></li>
                                    <li><a href="#altas" a data-toggle="tab"><img src="../../icons/actions/user-group-new.png"  class="img-reponsive img-rounded"> Alta Usuarios</a></li>
                                </ul>
                                
                                <div class="tab-content">
                                    
                                    <div id="usuarios" class="tab-pane fade in active">';
                                       
                                       $oneUsuario->listarUsuarios($conn,$dbase);
                                        
                              echo '</div>
                                
                                    <div id="altas" class="tab-pane fade"><br><br>';
                                        
                                        $oneUsuario->formAltausuarios();
                                        
                                echo '</div>
                                
                                </div>
                                
                                
                            
                    </div>
                </div>

                
                </div>';    
    
    
    } // FIN METODO


    public function formAltausuarios(){
    
        
           
                
                echo '<form id="fr_nuevo_usuario_ajax" method="POST">
                    <div class="container" style="margin-left:100px">
                        <div class="row">
                            
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="nombre">Nombre y Apellido:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                                </div>
                                
                                
                            </div>
                            
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                
                            </div>
                                                                                        
                        </div>
                        
                        <div class="row">
                        <div class="col-sm-3">
                        <button type="submit" class="btn btn-success btn-block" id="add_nuevo_usuario">
                            <img class="img-reponsive img-rounded" src="../../icons/devices/media-floppy.png" /> Guardar</button>
                        </div>
                        </div>
                        
                   
                        </form>';
    
    } // FIN METODO

    
    public function listarUsuarios($conn,$dbase){

        if($conn){
        
            $sql = "SELECT * FROM exp_usuarios";
                mysqli_select_db($conn,$dbase);
                $resultado = mysqli_query($conn,$sql);
            //mostramos fila x fila
            $count = 0;
            echo '<div class="panel panel-default" >
                    <div class="panel-heading"><span class="pull-center ">
                        <img src="../../icons/actions/meeting-attending.png"  class="img-reponsive img-rounded"> Listado de Usuarios 
                    </div><br>';

                    echo "<table class='table table-condensed table-hover' style='width:100%' id='myTable'>";
                    echo "<thead>
                    <th class='text-nowrap text-center'>Nombre</th>
                    <th class='text-nowrap text-center'>Usuario</th>
                    <th class='text-nowrap text-center'>Email</th>
                    <th class='text-nowrap text-center'>Permisos</th>
                    <th>&nbsp;</th>
                    </thead>";


            while($fila = mysqli_fetch_array($resultado)){
                    // Listado normal
                    echo "<tr>";
                    echo "<td align=center>".$fila['nombre']."</td>";
                    echo "<td align=center>".$fila['user']."</td>";
                    echo "<td align=center>".$fila['email']."</td>";
                    echo "<td align=center>".$fila['role']."</td>";
                    echo "<td class='text-nowrap'>";
                    
                    if($fila['user'] != 'root'){
                        echo '<a data-toggle="modal" data-target="#modalUserAllow" href="#" data-id="'.$fila['id'].'" class="btn btn-default btn-sm">
                                <img src="../../icons/actions/system-switch-user.png"  class="img-reponsive img-rounded"> Cambiar Permisos</a>';
                    }
                    echo "</td>";
                    $count++;
                }

                echo "</table>";
                echo "<hr>";
                echo '<div class="alert alert-info"><span class="glyphicon glyphicon-option-vertical"></span> Cantidad de Usuarios:  '.$count.' </div><hr>';
                echo '</div><hr>';
                }else{
                echo 'Connection Failure...' .mysqli_error($conn);
                }

            mysqli_close($conn);

}

    public function loadUser($dbase,$conn,$nombre){

        if($conn){
            
            $sql = "SELECT * FROM exp_usuarios where nombre = '$nombre'";
                mysqli_select_db($conn,$dbase);
                $resultado = mysqli_query($conn,$sql);
            //mostramos fila x fila
            $count = 0;
            echo '<div class="container-fluid">

                    <div class="jumbotron">
                    <h3><span class="pull-center "><span class="glyphicon glyphicon-user"></span> Cambiar Password</h3><hr>';
                
                    echo "<table class='display compact' style='width:100%' id='myTable'>";
                    echo "<thead>
                            <th class='text-nowrap text-center'>Nombre</th>
                            <th class='text-nowrap text-center'>Usuario</th>
                            <th class='text-nowrap text-center'>Acciones</th>
                            <th>&nbsp;</th>
                            </thead>";


            while($fila = mysqli_fetch_array($resultado)){
                    // Listado normal
                    echo "<tr>";
                    echo "<td align=center>".$fila['nombre']."</td>";
                    echo "<td align=center>".$fila['user']."</td>";
                    echo "<td class='text-nowrap'>";
                    echo '<a data-toggle="modal" data-target="#modalChangePass" href="#" data-id="'.$fila['id'].'" class="btn btn-default btn-block">
                            <img src="../../icons/actions/view-refresh.png"  class="img-reponsive img-rounded"> Cambiar Password</a>';
                    
                    echo "</td>";
                    $count++;
                }

                echo "</table><hr></div>";
                
                }else{
                echo 'Connection Failure...';
                }

            mysqli_close($conn);

    } //FIN METODO
    
    
    public function agregarUser($oneUsuario,$nombre,$email,$conn,$dbase){
    
    $string_1 = $oneUsuario->nameValidator($nombre);
    $string_2 = $oneUsuario->emailValidator($email);
    
    if(($string_1 == 1) && ($string_2 == 1)){
    
    
        mysqli_select_db($conn,$dbase);
   
      // se genera password aleatoria
      $pass = $oneUsuario->generationPass();
     
      // se encripta el password generado
      $passHash = password_hash($pass, PASSWORD_BCRYPT);
      
      
      // se determina el permiso basico
      $role = 1;      
      
      // recortamos el email para generar el usuario "usuario@mecon.gov.ar"
      // el usuario deberá quedar con el siguiente formato "usuario_mecon" 
      $dominio = "_mecon";
      $user = substr($email,0,-13);
      $user = $user.$dominio;
      $oneUsuario->genFile($user,$pass);
        
        $sql = "INSERT INTO exp_usuarios ".
                     "(nombre,
                       user,
                       email,
                       password,
                       role)".
                    "VALUES ".
                    "($oneUsuario->setNombre('$nombre'),
                      $oneUsuario->setUsuario('$user'),
                      $oneUsuario->setEmail('$email'),
                      $oneUsuario->setPassword('$passHash'),
                      $oneUsuario->setRole('$role'))";
      
            $query = mysqli_query($conn,$sql);
    
	
            if($query){
                echo 1; // se realizó la inserción en la base                
            }else{
                echo -1; // no se realizó la inserción del dato en la base
            }
	  
	    }else{
	    
            echo 2; // alguna de las variables contiene caracteres inválidos
	    
	    }

}


/*
** Funcion para generar password aleatorio
*/

public function generationPass(){
    //Se define una cadena de caractares.
    //Os recomiendo desordenar las minúsculas, mayúsculas y números para mejorar la probabilidad.
    $string = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz1234567890@";
    //Obtenemos la longitud de la cadena de caracteres
    $stringLong = strlen($string);
 
    //Definimos la variable que va a contener la contraseña
    $pass = "";
    //Se define la longitud de la contraseña, puedes poner la longitud que necesites
    //Se debe tener en cuenta que cuanto más larga sea más segura será.
    $longPass = 15;
 
    //Creamos la contraseña recorriendo la cadena tantas veces como hayamos indicado
    for($i = 1; $i <= $longPass; $i++){
        //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
        $pos = rand(0,$stringLong-1);
 
        //Vamos formando la contraseña con cada carácter aleatorio.
        $pass .= substr($string,$pos,1);
        
    }
    return $pass;
}


/*
** Funcion que actualiza el password de un usuario
*/
public function updatePassword($id,$pass,$conn,$dbase){

    if((strlen($pass) < 15) || (strlen($pass) > 15)){
    
        echo '<div class="container">
                <div class="row">modalUserAllow
                    <div class="col-md-6">
                        <div class="alert alert-danger" role="alert">
                            <img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> El Password no puede contener menos o más de 15 caracteres!!
                        </div>
                    </div>
                </div>
              </div>';
    
    }elseif((strlen($pass)) == 0){
        
        echo '<div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="alert alert-danger" role="alert">
                            <img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> El Password no puede estar Vacio!!
                        </div>
                    </div>
                </div>
              </div>';
    
    }elseif((strlen($pass)) == 15){
    
        $passHash = password_hash($pass, PASSWORD_BCRYPT);
        
        mysqli_select_db($conn,$dbase);
        $sql = "update exp_usuarios set password = '$passHash' where id = '$id'";
        $query = mysqli_query($conn,$sql);
        
        if($query){
            echo 1;
        }else{
            echo 0;
        }
    
    }


}


/*
** Funcion para generar archivo de password
*/


public function genFile($usuario,$password){
  
  $fileName = "../../../registro/gen_pass/$usuario.pass.txt"; 
  //$mensaje = $password;
  
  if (file_exists($fileName)){
  
  //echo "Archivo Existente...";
  //echo "Se actualizaran los datos...";
  $file = fopen($fileName, 'w+') or die("Se produjo un error al crear el archivo");
  
  fwrite($file, $password) or die("No se pudo escribir en el archivo");
  
  fclose($file);
	 
  }else{
  
      //echo "Se Generará archivo de respaldo..."
      $file = fopen($fileName, 'w') or die("Se produjo un error al crear el archivo");
      fwrite($file, $password) or die("No se pudo escribir en el archivo");
      fclose($file);
	      
  }
  
  
}


                    
/*
** funcion que valida caracteres especiales
*/
public function nameValidator($var){

   $pattern_string = '/^[a-zA-Z0-9áéíóú ]+$/i';
$validate = -1;

if(preg_match($pattern_string,$var)){

    return $validate = 1;

}else{

    return $validate = 0;
}
    
}


/*
** funcion que valida email
*/
public function emailValidator($var){

    $pattern_string = '/^[a-zA-Z0-9*._@#]+$/i';

$validate = -1;

if(preg_match($pattern_string,$var)){

    return $validate = 1;

}else{

    return $validate = 0;
}


}


/*
** funcion que valida solo numeros positivos
*/
public function intValidator($var){

    $pattern_string = '/^[0-9.-]+$/';

$validate = -1;

if(preg_match($pattern_string,$var)){

    return $validate = 1;

}else{

    return $validate = 0;
}


}


/*
** funcion que valida solo numeros positivos
*/
public function passwordValidator($var){

     $pattern_string = '/^[a-zA-Z0-9*._@#!?¿]+$/';

$validate = -1;

if(preg_match($pattern_string,$var)){

    return $validate = 1;

}else{

    return $validate = 0;
}


}



// ============================================================= //
// PERMISOS
/*
* Funcion para cambiar los permisos de los usuarios al sistema
*/

public function cambiarPermisos($oneUsuario,$id,$role,$conn,$dbase){

  $sql = "UPDATE exp_usuarios set role = $oneUsuario->setRole('$role') where id = '$id'";
  mysqli_select_db($conn,$dbase);
  $retval = mysqli_query($conn,$sql);
  if($retval){    
    echo 1;
  }else{
    echo -1;
  }
 
}


/*
** persistencia en la actualizacion de pasword
*/
public function changePass($oneUsuario,$id,$password_1,$password_2,$conn,$dbase){

   $string_1 = $oneUsuario->passwordValidator($password_1);
   $string_2 = $oneUsuario->passwordValidator($password_2);
   
   if(($string_1 == 1) && ($string_2 == 1)){
   
    if((strlen($password_1) == 15) && (strlen($password_2) == 15)){
        
        if((strcmp($password_2,$password_1) == 0)){
        
            $passHash = password_hash($password_1, PASSWORD_BCRYPT); // se procede a encriptar el password
        
        $sql = "update exp_usuarios set password = $oneUsuario->setPassword('$passHash') where id = '$id'";
        mysqli_select_db($conn,$dbase);
        $query = mysqli_query($conn,$sql);
        
        if($query){
            echo 1; // password actualizada
        }else{
            echo -1; // error al actualizar el password
        }
        
        }else{
            echo 0; // los password no coinciden
        }
    }else{
        echo 2; // los password no pueden ser menores o mayores a 15 caracteres
    }
    }else{
        echo 3; // caracteres invalidos
    }
    

}

/*
** funcion que carga modal de permisos de usuario
*/
public function modalPermisos(){

    echo '<!-- Modal -->
            <div id="modalUserAllow" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">
                        <img src="../../icons/actions/system-switch-user.png"  class="img-reponsive img-rounded"> Cambiar Permisos de Usuario</h4>
                </div>
                <div class="modal-body">
                    
                    <form id="frm_user_allow" method="POST">
                    <input type="hidden" class="form-control" name="bookId" id="bookId" value="bookId">
                        <div class="form-group">
                            <label for="permisos">Permisos:</label>
                            <select class="form-control" id="permisos" name="permisos">
                                <option value="" selected disabled>Seleccionar</option>
                                <option value="0">Deshabilitar</option>
                                <option value="1">Habilitar</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default" id="cambiar_permiso">
                            <img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" /> Aceptar</button>
                    </form>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        <img class="img-reponsive img-rounded" src="../../icons/actions/dialog-close.png" /> Cerrar</button>
                </div>
                </div>

            </div>
            </div>';

}

/*
** funcion que carga modal para cambio de password
*/
public function modalChangePassword(){

    echo '<!-- Modal -->
            <div id="modalChangePass" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">
                        <img src="../../icons/actions/view-refresh.png"  class="img-reponsive img-rounded"> Cambiar Password</h4>
                </div>
                <div class="modal-body">
                    
                     <form id="frm_change_password" method="POST">
                     <input type="hidden" class="form-control" name="bookId" id="bookId" value="bookId">
                        <div class="form-group">
                            <label for="password_1">Password:</label>
                            <input type="password" class="form-control" id="password_1" name="password_1" required>
                        </div>
                        <div class="form-group">
                            <label for="password_2">Repita Password:</label>
                            <input type="password" class="form-control" id="password_2" name="password_2" requiered>
                        </div>
                        <button type="submit" class="btn btn-default" id="change_password">
                            <img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" /> Cambiar</button>
                        </form> 
                    
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        <img class="img-reponsive img-rounded" src="../../icons/actions/dialog-close.png" /> Cerrar</button>
                </div>
                </div>

            </div>
            </div>';

}





} //FIN DE CLASE





?>

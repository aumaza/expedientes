<?php

/*
** Funcion que carga el skeleto del sistema
*/

function skeleton(){

  echo '<link rel="stylesheet" href="/expedientes/skeleton/css/bootstrap.min.css" >
        <link rel="stylesheet" href="/expedientes/skeleton/css/bootstrap-theme.css" >
        <link rel="stylesheet" href="/expedientes/skeleton/css/bootstrap-theme.min.css" >
        <link rel="stylesheet" href="/expedientes/skeleton/css/scrolling-nav.css" >
        <link rel="stylesheet" href="/expedientes/skeleton/css/fontawesome.css">
        <link rel="stylesheet" href="/expedientes/skeleton/css/fontawesome.min.css" >
        <link rel="stylesheet" href="/expedientes/skeleton/css/jquery.dataTables.min.css" >
        <link rel="stylesheet" href="/expedientes/skeleton/Chart.js/Chart.min.css" >
        <link rel="stylesheet" href="/expedientes/skeleton/Chart.js/Chart.css" >
        
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="/expedientes/skeleton/js/jquery-3.4.1.min.js"></script>
        <script src="/expedientes/skeleton/js/bootstrap.min.js"></script>
        
        <script src="/expedientes/skeleton/js/jquery.dataTables.min.js"></script>
        <script src="/expedientes/skeleton/js/dataTables.editor.min.js"></script>
        <script src="/expedientes/skeleton/js/dataTables.select.min.js"></script>
        <script src="/expedientes/skeleton/js/dataTables.buttons.min.js"></script>
        
        <script src="/expedientes/js/scrolling-nav.js"></script>
        <script src="/expedientes/skeleton/Chart.js/Chart.min.js"></script>
        <script src="/expedientes/skeleton/Chart.js/Chart.bundle.min.js"></script>
        <script src="/expedientes/skeleton/Chart.js/Chart.bundle.js"></script>
        <script src="/expedientes/skeleton/Chart.js/Chart.js"></script>';
}


/*
** Funcion de validación de ingreso
*/
function logIn($user,$pass,$conn,$dbase){

    mysqli_select_db($conn,$dbase);
    
	$_SESSION['user'] = $user;
	$_SESSION['pass'] = $pass;
	
	$sql_1 = "select password from exp_usuarios where user = '$user'";
	$query_1 = mysqli_query($conn,$sql_1);
	while($row = mysqli_fetch_array($query_1)){
        $hash = $row['password'];
	}
	
    
    
	$sql = "SELECT * FROM exp_usuarios where user = '$user' and role = 1";
	$q = mysqli_query($conn,$sql);
	
	$query = "SELECT * FROM exp_usuarios where user = '$user' and role = 0";
	$retval = mysqli_query($conn,$query);
	
	
	
	if(!$q && !$retval){	
			echo '<div class="alert alert-danger" role="alert">';
			echo "Error de Conexion..." .mysqli_error($conn);
			echo "</div>";
			echo '<a href="#"><br><br>
                    <button type="submit" class="btn btn-primary">Aceptar</button></a>';	
			exit;			
			
			}
		
			if(($user = mysqli_fetch_assoc($retval)) && (password_verify($pass,$hash))){
				

				echo '<div class="alert alert-danger" role="alert">';
				echo "<strong>Atención!  </strong>" .$_SESSION["user"];
				echo "<br>";
				echo '<span class="pull-center ">
                        <img src="core/icons/status/security-low.png"  class="img-reponsive img-rounded"><strong> Usuario Bloqueado. Contacte al Administrador.</strong>';
				echo "</div>";
				exit;
			}

			else if(($user = mysqli_fetch_assoc($q)) && (password_verify($pass,$hash))){

				if(strcmp($_SESSION["user"], 'root') == 0){

				echo "<br>";
				echo '<div class="alert alert-success" role="alert">';
				echo '<button class="btn btn-success">
				      <span class="spinner-border spinner-border-sm"></span>
				      </button>';
				echo "<strong> Bienvenido!  </strong>" .$_SESSION["user"];
				echo "<strong> Aguarde un Instante...</strong>";
				echo "<br>";
				echo "</div>";
  				echo '<meta http-equiv="refresh" content="5;URL=core/main/main.php "/>';
				
			}else{
				echo '<div class="alert alert-success" role="alert">';
				echo '<button class="btn btn-success">
				      <span class="spinner-border spinner-border-sm"></span>
				      </button>';
				echo "<strong> Bienvenido!  </strong>" .$_SESSION["user"];
				echo "<strong> Aguarde un Instante...</strong>";
				echo "<br>";
				echo "</div>";
  				echo '<meta http-equiv="refresh" content="5;URL=core/main/main.php "/>';
				
			}
			}else{
				echo '<div class="alert alert-danger" role="alert">';
				echo '<span class="pull-center "><img src="icons/status/dialog-warning.png"  class="img-reponsive img-rounded"> Usuario o Contraseña Incorrecta. Reintente Por Favor....';
				echo "</div>";
				}
}




?>

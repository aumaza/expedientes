<?php

// DATOS DE CONEXION LOCALHOST

//$dbhost = 'slackzone.ddns.net';
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'slack142';
$dbase = 'gnu_expedientes';


// DATOS DE CONEXION PARA SERVER PRODUCCION
/*
$dbhost = 'localhost';
$dbuser = 'gnu_exp';
$dbpass = 'gnu_exp';
$dbase = 'gnu_expedientes';
*/

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbase);

?>

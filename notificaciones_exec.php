<?php
//Start session
session_start();

//Include database connection details
include('connection.php');
include('js/modals.js');

//Array to store validation errors
$errmsg_arr = array();
$success_arr = array();

//Validation error flag
$errflag = false;

//Function to sanitize values received from the form. Prevents SQL injection
function clean($str) {
  $str = @trim($str);
  if(get_magic_quotes_gpc()) {
    $str = stripslashes($str);
  }
  return mysql_real_escape_string($str);
}

//Sanitize the POST values
$expediente = clean($_POST['exp']);
$propietario = clean($_POST['propietario']);
$receptor = clean($_POST['receptor']);
$creacion = clean($_POST['creacion']);
$caducacion = clean($_POST['caducacion']);
$descripcion = clean($_POST['descripcion']);
$direccion = clean($_POST['direccion']);
$estado = clean($_POST['estado']);
$type = clean($_POST['tipo']);
$observaciones = $_POST['observaciones'];

//Input Validations
if($expediente == '') {
  $errmsg_arr[] = 'Debe escribir un número de expediente.';
  $errflag = true;
}
if($propietario == '') {
  $errmsg_arr[] = 'Debe escribir un nombre de propietario.';
  $errflag = true;
}
if($creacion == '') {
  $errmsg_arr[] = 'Debe escribir una fecha de creación';
  $errflag = true;
}
if($caducacion == '') {
  $errmsg_arr[] = 'Debe escribir una fecha de caducación';
  $errflag = true;
}
if($descripcion == '') {
  $errmsg_arr[] = 'Debe escribir una descripción del lugar.';
  $errflag = true;
}
if($direccion == '') {
  $errmsg_arr[] = 'Debe escribir una direccion del lugar.';
  $errflag = true;
}
if($type == '') {
  $errmsg_arr[] = 'Type missing';
  $errflag = true;
}

if(!$errflag){
  $succes = "¡Se han insertado los datos correctamente!";
  $success_arr[] = $succes;

  //Create query when administrator
  $qry = "INSERT INTO notificaciones (expediente, propietario, receptor, fechaCad, fechaCre, descripcion, direccion,
    estado, tipo, observaciones) VALUES ('$expediente','$propietario','$receptor',
      STR_TO_DATE('$caducacion', '%Y-%m-%d'),STR_TO_DATE('$creacion','%Y-%m-%d'),'$descripcion',
      '$direccion', $estado,$type,'$observaciones')";

  $sentencia = mysql_query($qry,$con);
  if($sentencia){
    $success_arr[] = $succes;
    $_SESSION['SUCCESS'] = $success_arr;
    session_write_close();
    header('Location: successNot.php');
    exit();
  } else{
    $errmsg_arr[] = 'Ya existe una notificación con ese número de expediente.';
    $errflag = true;
  }
}

//If there are input validations, redirect back to the login form
if($errflag) {
  $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
  session_write_close();
  header("location: index_notificaciones.php");
  exit();
}

?>

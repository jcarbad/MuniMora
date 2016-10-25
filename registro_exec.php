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
$nombre = clean($_POST['nombre']);
$apellido = clean($_POST['apellido']);
$username = clean($_POST['usuario']);
$contrasena = clean($_POST['contrasena']);
$contrasena2 = clean($_POST['contrasena2']);
$type = clean($_POST['tipo']);

	//Input Validations
if($nombre == '') {
	$errmsg_arr[] = 'Debe escribir un nombre.';
	$errflag = true;
}
if($apellido == '') {
	$errmsg_arr[] = 'Debe escribir un apellido.';
	$errflag = true;
}
if($username == '') {
	$errmsg_arr[] = 'Debe escribir un nombre de usuario.';
	$errflag = true;
}
if($contrasena == '') {
	$errmsg_arr[] = 'Debe escribir una contraseña.';
	$errflag = true;
}
if($contrasena2 == '') {
	$errmsg_arr[] = 'Debe confirmar la contraseña.';
	$errflag = true;
}
if($type == '') {
	$errmsg_arr[] = 'Type missing';
	$errflag = true;
}

if(!$errflag){
	if($_POST['contrasena']==$_POST['contrasena2']){
		$succes = "¡Se han insertado los datos correctamente!";
		$success_arr[] = $succes;

			//Create query when administrator
		$qry = "INSERT INTO usuarios (NAME, LASTNAME,ID, PASSWORD, TIPO) VALUES ('$_POST[nombre]','$_POST[apellido]','$_POST[usuario]','$_POST[contrasena]',$_POST[tipo])";
		$sentencia = mysql_query($qry,$con);
		if($sentencia){	
			$success_arr[] = $succes;
			$_SESSION['SUCCESS'] = $success_arr;
			session_write_close();	
			header('Location: succes.php');
			exit();
		} else{
			$errmsg_arr[] = 'El usuario digitado ya existe.';
			$errflag = true;
		}	
	}else {
		$errmsg_arr[] = 'Las contraseñas no coinciden!';
		$errflag = true;
	}
}

	//If there are input validations, redirect back to the login form
if($errflag) {
	$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
	session_write_close();
	header("location: admin_usuarios.php");
	exit();
}

?>

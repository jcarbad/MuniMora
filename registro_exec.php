<?php
	//Start session
	session_start();
	
	//Include database connection details
	include('connection.php');
	
	//Array to store validation errors
	$errmsg_arr = array();
	
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
	$username = clean($_POST['usuario']);
	$contrasena = clean($_POST['contrasena']);
	$contrasena2 = clean($_POST['contrasena2']);
	$type = clean($_POST['tipo']);
	
	//Input Validations
	if($username == '') {
		$errmsg_arr[] = 'Username missing';
		$errflag = true;
	}
	if($contrasena == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	if($contrasena2 == '') {
		$errmsg_arr[] = 'Confirm Password missing';
		$errflag = true;
	}
	if($type == '') {
		$errmsg_arr[] = 'Type missing';
		$errflag = true;
	}
	
	if($_POST['contrasena']==$_POST['contrasena2']){
		$succes = "¡Se han insertado los datos correctamente!";
		
			//Create query when administrator
			$qry = "INSERT INTO usuarios (ID, PASSWORD, TIPO) VALUES ('$_POST[usuario]','$_POST[contrasena]',$_POST[tipo])";
			$sentencia = mysql_query($qry,$con);
			if($sentencia){
				
			header('Location: admin_usuarios.php');

			} else{
				$errmsg_arr[] = 'El usuario digitado ya existe.';
				$errflag = true;
			}
		
	}else {
		$errmsg_arr[] = 'Las contraseñas no coinciden!';
		$errflag = true;
	}
	
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: registro.php");
		exit();
	}
?>
	
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

	
	if($_POST['contrasena']==$_POST['contrasena2']){
		$succes = "¡Se han insertado los datos correctamente!";
		if($type=="Administrador"){
			//Create query when administrator
			$qry = "INSERT INTO usuarios (ID, PASSWORD, TIPO) VALUES ('$_POST[usuario]','$_POST[contrasena]',$_POST[type])";
			$sentencia = mysql_query($qry,$con);
			if($sentencia){
				echo "<head>";
				echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
				echo "<title>Registro de usuarios</title>";
				echo "<link href='./css/warning.css' rel='stylesheet' type='text/css' media='all' />";
				echo "</head>";
				echo "<body>";
				echo "	<div id='wrapper'>";
				echo "		<div id='logo'>";
				echo "				<img src='./img/logo_login.png' width='200' height='200' />";
				echo "		</div>";
				echo "		<div aling'center'>";
				echo "			<h1 align='center'>Registro de usuario correcto!!!</h1>";
				echo $succes;
				echo "			<br>";
				echo "			<br>";
				echo "			<div aling'center'>";
				echo '			<button> <a href="registro.php">Registrar otro usuario</a></button>';
				echo '			<button> <a href="home_admin.php">Regreso a página de administración</a></button>';
				echo "		</div>";
				echo "		</div>";
				echo "	</div>";
				echo "</body>";
			} else{
				$errmsg_arr[] = 'El usuario digitado ya existe.';
				$errflag = true;
			}
		}
		if($type=="Inspector"){
			//Create query when administrator
			$qry = "INSERT INTO usuarios (ID, PASSWORD, TIPO) VALUES ('$_POST[username]','$_POST[password]',2)";
			$sentencia = mysql_query($qry,$con);
			if($sentencia){
				echo "<head>";
				echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
				echo "<title>Registro de usuarios</title>";
				echo "<link href='./css/warning.css' rel='stylesheet' type='text/css' media='all' />";
				echo "</head>";
				echo "<body>";
				echo "	<div id='wrapper'>";
				echo "		<div id='logo'>";
				echo "				<img src='./img/logo_login.png' width='200' height='200' />";
				echo "		</div>";
				echo "		<div aling'center'>";
				echo "			<h1 align='center'>Registro de usuario correcto!!!</h1>";
				echo $succes;
				echo "			<br>";
				echo "			<br>";
				echo "			<div aling'center'>";
				echo '			<button> <a href="registro.php">Registrar otro usuario</a></button>';
				echo '			<button> <a href="home_admin.php">Regreso a página de administración</a></button>';
				echo "		</div>";
				echo "		</div>";
				echo "	</div>";
				echo "</body>";
			} else{
				$errmsg_arr[] = 'El usuario digitado ya existe.';
				$errflag = true;
			}
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
	
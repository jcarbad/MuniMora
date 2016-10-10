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
	$username = clean($_POST['username']);
	$password = clean($_POST['password']);
	$password2 = clean($_POST['password2']);
	$type = clean($_POST['type']);
	
	//Input Validations
	if($username == '') {
		$errmsg_arr[] = 'Username missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	if($password2 == '') {
		$errmsg_arr[] = 'Confirm Password missing';
		$errflag = true;
	}
	if($type == '') {
		$errmsg_arr[] = 'Type missing';
		$errflag = true;
	}
	
	if($_POST['password']==$_POST['password2']){
		$succes = "¡Se han insertado los datos correctamente!";
		if($type=="Administrador"){
			//Create query when administrator
			$qry = "INSERT INTO usuarios (ID, PASSWORD, TIPO) VALUES ('$_POST[username]','$_POST[password]',1)";
			$sentencia = mysql_query($qry,$con);
			if($sentencia){
				echo "<table>";  
				echo "<tr>"; 
				echo "<td>";
				echo $succes;
				echo "</td>";
				echo "</tr>";
				echo "</table>";
				echo "<br>";
				echo '<button><a href="registro.php">Registrar otro usuario</a></button>';
				echo "<br>";
				echo '<button><a href="home_admin.php">Regreso a página de administración</a></button>';
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
				echo "<table>";  
				echo "<tr>"; 
				echo "<td>";
				echo $succes;
				echo "</td>";
				echo "</tr>";
				echo "</table>";
				echo "<br>";
				echo '<button><a href="registro.php">Registrar otro usuario</a></button>';
				echo "<br>";
				echo '<button><a href="home_admin.php">Regreso a página de administración</a></button>';
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
	
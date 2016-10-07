<?php
//session_start();
require_once('auth.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>SISGENOT - Home </title>
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700" rel="stylesheet" type="text/css" />
    <link href="./css/login.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
    <div id="wrapper">
        <div id="logo">
            <img src="./img/logo_login.png" width="200" height="200" />
        </div>
        <h1 align="center">
            <?php
                echo "Bienvenido   ";
                echo $_SESSION['SESS_ID'];
            ?>
        </h1>
		<form method="post" action="registroNotificacion_exec.php" accept-charset='UTF-8' name="loginform">
        <center>
				<table align="center">
					<tr>
						<td colspan="2"> <input type="submit" class="btn" id="btnNuevaNot" value="Agregar notificaci&oacute;n"/></td>
					</tr>
				</table>
				<h2><a href="index.php">LOG OUT</a></h2>
        </center>
		</form>
    </div>
</body>
</html>

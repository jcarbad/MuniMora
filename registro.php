<?php
	//Start session
	//session_start();
	//Unset the variables stored in session
	//unset($_SESSION['SESS_ID']);
	//unset($_SESSION['SESS_PASS']);
    //unset($_SESSION['SESS_TIPO']);
    require_once('auth.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Registro</title>
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700" rel="stylesheet" type="text/css" />
    <link href="./css/login.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
    <div id="wrapper">
        <div id="logo">
            <img src="./img/logo_login.png" width="200" height="200" />
        </div>
        <h1 align="center">Registro de usuarios</h1>
        <form method="post" action="registro_exec.php" accept-charset='UTF-8' name="loginform">
            <table align="center">
                <tr>
                    <td>
                        <!--the code bellow is used to display the message of the input validation-->
                        <?php
                        if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
                            echo '<ul class="err">';
                            foreach($_SESSION['ERRMSG_ARR'] as $msg) {
                                echo '<li>',$msg,'</li>';
                            }
                            echo '</ul>';
                            unset($_SESSION['ERRMSG_ARR']);
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                        <td align="right">Usuario</td>
                        <td> <input type="text" id="username" name="username" /></td>
                    </tr>
                    <tr>
                        <td align="right">Contraseña </td>
                        <td><input type="password" id="password" name="password" /></td>
                    </tr>
                    <tr>
                        <td align="right">Confirmar contraseña </td>
                        <td><input type="password" id="password2" name="password2" /></td>
                    </tr>
                    <tr>
                        <td align="right">Tipo de usuario </td>
                        <td align="right">
                            <input type="radio" id="type" name="type" value="Administrador" checked>Administrador</input>
                            <input type="radio" id="type" name="type" value="Inspector">Inspector</input>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" value="Registrar usuario" class="btn" /></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>

    </html>
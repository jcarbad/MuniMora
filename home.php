<?php
require_once('auth.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>SISGENOT - Home </title>
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700" rel="stylesheet" type="text/css" />
    <link href="./css/template/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="./css/template/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core CSS -->
    <link href="./css/template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div id="wrapper">
        <table id = "ordenar">
            <tr>
                <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">Sistema de Gesti&oacute;n de Notificaciones</a>
                        <ul align="left">
                            <?php
                            echo "Bienvenido   ", $_SESSION['SESS_ID'];
                            ?>
                        </ul>
                    </div>
                    <ul  align = "right">
                        <a  href="#"><img src="./img/logo_login.png" width="100" height="100" /></a>
                    </ul>
                </nav>
            </tr>
            <tr>
                <td width = "200">
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#">Crear Notificaci&oacute;n</a>
                        </li>
                    </ul>
                </td>
                <td>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#">Ver Notificaciones</a>
                        </li>
                    </ul>
                </td>
            </tr>
        </table>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">3</div>
                                    <div>Notificaciones nuevas</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Ver las nuevas notificaciones</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">4</div>
                                        <div>Expedientes</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">Ver todos los expedientes</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <center>
                <h2><a href="index.php">LOG OUT</a></h2>
            </center>
        </div>
    </div>
</body>
</html>

<?php

require_once('auth.php');
require_once('connection.php');
$qry = 'SELECT * FROM usuarios;';
$result = mysql_query($qry,$con);
?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sisgenot - Administraci&oacute;n</title>

  <!-- Bootstrap Core CSS -->
  <link href="./css/template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="./css/template/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="./css/template/dist/css/sb-admin-2.css" rel="stylesheet">

  <!-- Morris Charts CSS -->
  <link href="./css/template/vendor/morrisjs/morris.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="./css/template/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <script src="js/modals.js" type="text/javascript"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body  
  <?php  //******** CORRECCION PARA QUE CARGUE EL MODAL SI SE INTRODUCEN DATOS ERRÓNEOS ********
  if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ){
    echo 'onLoad=mostrarModal("myModalFormulario");';  // ***** MODAL DE ERROR ****
  } else{
    echo 'onLoad=""';
  }
?>>
<!-- modal para agregar usuarios -->

<!-- Modal para registro de usuarios -->
<div class="modal fade " id="myModalFormulario" action="registro_exec.php" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="myModalTitle">Agregar nuevos usuarios
        </div>
        <div class="modal-body " id="myModalMessage">

          <form method="post" action="registro_exec.php" accept-charset='UTF-8' name="formUsuario">
            <div class="form-group" id="groupUsuario">
              <label for="usuario">Usuario:</label>
              <input type="text" class="form-control" id="usuario" name="usuario" autofocus="true" placeholder="Usuario">
            </div>

            <div class="form-group" id="groupContrasena">
              <label for="contrasena">Contraseña:</label>
              <input type="password" class="form-control" id="contrasena"  name="contrasena" placeholder="Contrasena" maxlength="45" >
            </div>

            <div class="form-group" id="groupContrasena2">
              <label for="contrasena2">Contraseña:</label>
              <input type="password" class="form-control" id="contrasena2" name="contrasena2" placeholder="Contrasena" maxlength="45" >
            </div>

            <div class="form-group" id="groupTipo">
              <label for="tipo">Tipo de usuario:</label>
              <select id="tipo" name="tipo" class="form-control">
                <option value="1" selected>Administrador
                  <option value="2">Inspector
                  </select>
                </div>



                <div class="form-group">
                  <button type="submit" class="btn " id="enviar" name="enviar" onSubmit ="mostrarModal('myModalFormulario')">Guardar</button>
                  <button type="reset" class="btn btn-danger" id="cancelar" onClick ="ocultarModal('myModalFormulario')">Cancelar</button>
                </div>

                  <!--div class="form-group height25" >
                    <div class="alert alert-success hiddenDiv" id="mesajeResult">
                      <strong id="mesajeResultNeg">Info!</strong>
                      <span id="mesajeResultText">This alert box could indicate a neutral informative change or action.</span>
                    </div>
                  </div-->

                  <div class="form-group">
                    <!--the code bellow is used to display the message of the input validation-->
                    <?php
                    if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
                      echo '<div class="alert alert-danger hiddenDiv" id="mesajeResult">';
                      echo '<ul class="err">';
                      echo '<strong id="mesajeResultNeg">Error!</strong>';
                      foreach($_SESSION['ERRMSG_ARR'] as $msg) {
                        echo '<li id="mesajeResultText">',$msg,'</li>';
                      }
                      echo '</ul>';
                      echo '</div>';
                      unset($_SESSION['ERRMSG_ARR']);
                    }
                    ?>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>


        <div class="modal fade " id="myModalExito" action="registro_exec.php" role="dialog">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="myModalTitle">Agregar nuevos usuarios
                </div>
                <div class="modal-body " id="myModalMessage">
                  <div class="form-group height25" >
                    <div class="alert alert-success hiddenDiv" id="mesajeResult">
                      <strong id="mesajeResultNeg">Usuario ingresado con éxito!</strong>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">SISGENOT - Administraci&oacute;n del Sistema</a>
              </div>
              <!-- /.navbar-header -->
              <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> Perfil de Usuario</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Ajustes</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="index.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                  </ul>
                  <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
              </ul>
              <!-- /.navbar-top-links -->
              <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                  <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                      <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                          <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                          </button>
                        </span>
                      </div>
                      <!-- /input-group -->
                    </li>
                    <li>
                      <a href="home_admin.php"><i class="fa fa-dashboard fa-fw"></i> Inicio</a>
                    </li>
                    <li>
                      <a href="admin_usuarios.php"><i class="fa fa-table fa-fw"></i> Usuarios activos</a>
                    </li>
                    <li>
                      <a onClick=" mostrarModal('myModalFormulario');"><i></i>Registrar usuario</a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-wrench fa-fw"></i>Ajustes de sistema<span class="fa arrow"></span></a>
                      <ul class="nav nav-second-level">
                        <li>
                          <a href="panels-wells.html">Panels and Wells</a>
                        </li>
                        <li>
                          <a href="buttons.html">Buttons</a>
                        </li>
                        <li>
                          <a href="notifications.html">Notifications</a>
                        </li>
                        <li>
                          <a href="typography.html">Typography</a>
                        </li>
                        <li>
                          <a href="icons.html"> Icons</a>
                        </li>
                        <li>
                          <a href="grid.html">Grid</a>
                        </li>
                      </ul>
                      <!-- /.nav-second-level -->
                    </li>
                  </ul>
                </div>
                <!-- /.sidebar-collapse -->
              </div>
              <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">
              <div class="row">
                <div class="col-lg-12">
                  <h1 class="page-header">Administraci&oacute;n</h1>
                </div>
                <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
              <div class="row">
                <div class="col-lg-8" style="width: 880px">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <i class="fa fa-bar-chart-o fa-fw"></i> Usuarios registrados
                      <div class="pull-right">
                        <div class="btn-group">
                          <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            Acciones
                            <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu pull-right" role="menu">
                            <li><a href="#">Agregar usuario</a>
                            </li>
                            <li><a href="#">Editar usuario</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#">Eliminar usuario</a>
                            </li>
                          </ul>
                        </div>
                      </div>

                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                      <div class="row">
                        <div class="">


                          <table class="table table-responsive table-bordered table-striped">
                            <thead>
                              <tr>
                                <th>Usuario</th>
                                <th>Password</th>
                                <th>Tipo</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php while ($row = mysql_fetch_row($result)) {	?>
                                <tr>
                                  <td><?php echo $row[0]; ?></td>
                                  <td><?php echo $row[1]; ?></td>
                                  <td><?php echo ($row[2] == 1) ?"Administrador" : "Inspector" ; ?></td>
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table>


                            <!-- /.table-responsive -->
                          </div>
                          <!-- /.col-lg-4 (nested) -->
                        </div>
                        <!-- /.row -->
                      </div>
                      <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                  </div>
                  <!-- /.col-lg-8 -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /#page-wrapper -->

            </div>
            <!-- /#wrapper -->

            <!-- jQuery -->
            <script src="./css/template/vendor/jquery/jquery.min.js"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="./css/template/vendor/bootstrap/js/bootstrap.min.js"></script>

            <!-- Metis Menu Plugin JavaScript -->
            <script src="./css/template/vendor/metisMenu/metisMenu.min.js"></script>

            <!-- Morris Charts JavaScript -->
            <script src="./css/template/vendor/raphael/raphael.min.js"></script>
            <script src="./css/template/vendor/morrisjs/morris.min.js"></script>
            <script src="./css/template/data/morris-data.js"></script>

            <!-- Custom Theme JavaScript -->
            <script src="./css/template/dist/js/sb-admin-2.js"></script>

          </body>

          </html>

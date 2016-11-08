<?php

require_once('auth.php');
require_once('connection.php');
$qry = 'SELECT expediente, propietario, receptor, fechaCad, fechaCre, descripcion, direccion, estado, tipo, observaciones FROM notificaciones;';
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
    <title>SISGENOT- P&aacute;gina principal de inspectores</title>
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
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  </head>

  <body>
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
          <a class="navbar-brand" href="#">SISGENOT - P&aacute;gina principal de notificaciones</a>
        </div>
        <!-- /.navbar-header -->
        <ul class="nav navbar-top-links navbar-right">
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              <?php
            echo $_SESSION['SESS_ID'];
            ?>
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
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
                <a href="home.php"><i class="fa fa-dashboard fa-fw"></i> Inicio</a>
              </li>
              <li>
                <a href="index_notificaciones.php"><i class="fa fa-table fa-fw"></i>Registro de notificaciones</a>
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
            <h1 class="page-header">Editando Notificacion</h1>
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <i class="fa fa-edit fa-fw"></i> Editando
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                <div class="row">
                  <div class="">
                    <table class="table table-responsive table-bordered table-striped">
                      <h2>Datos de notificacion</h2>
                      <tbody>
                        <tr>
                          <?php
                        $id = $_REQUEST['value'];

                        $qry = "SELECT expediente, propietario, receptor, fechaCad, fechaCre, descripcion, direccion, estado, tipo, observaciones FROM notificaciones WHERE expediente = '$id'";
                        $sentencia = mysql_query($qry,$con);
                        $row = mysql_fetch_row($sentencia);
                        ?>
                            <form method="POST" action="modificarNotificacion_exec.php?id1=<?php echo $row[0];?>" accept-charset='UTF-8' onSubmit="return validarNotificacionEditar()"
                              name="formNotificacion">
                              <td>Expediente:
                                <div class="form-group" id="groupExp">
                                  <Input class="form-control" id="exp" name="exp" autofocus="true" type="text" readonly value="<?php echo $row[0];?>"></input>
                                </div>
                              </td>
                              <td>Propietario:
                                <div class="form-group" id="groupPropietario">
                                  <input class="form-control" id="propietario" name="propietario" autofocus="true" value="<?php echo $row[1];?>"></input>
                                </div>
                              </td>
                              <td>Receptor:
                                <div class="form-group" id="groupReceptor">
                                  <input class="form-control" id="receptor" name="receptor" autofocus="true" value="<?php echo $row[2];?>"></input>
                                  <div>
                              </td>
                              <td>Fecha Creacion:
                                <div class="form-group" id="groupCreacion">
                                  <input class="form-control" id="creacion" name="creacion" autofocus="true" type="date" value="<?php echo $row[4];?>"></input>
                                </div>
                              </td>
                              <td>Fecha Caducacion:
                                <div class="form-group" id="groupCaducacion">
                                  <input class="form-control" id="caducacion" name="caducacion" autofocus="true" type="date" min=<?php echo date("Y-m-d");?> value="<?php echo $row[3];?>"></input>
                                </div>
                              </td>
                              <td>Descripcion:
                                <div class="form-group" id="groupDescripcion">
                                  <input class="form-control" id="descripcion" name="descripcion" autofocus="true" value="<?php echo $row[5];?>"></input>
                                </div>
                              </td>
                              <td>Direccion:
                                <div class="form-group" id="groupDireccion">
                                  <input class="form-control" id="direccion" name="direccion" autofocus="true" value="<?php echo $row[6];?>"></input>
                                </div>
                              </td>
                              <td>Estado:
                                <select class="form-control" id="estado" name="estado">
                              <option <?php if($row[7]==1){ echo 'selected'; }else{} ?> value="1">Pendiente
                              <option <?php if($row[7]==2){ echo 'selected'; }else{} ?> value="2">Resuelta
                            </select>
                              </td>
                              <td>Tipo:
                                <select class="form-control" id="tipo" name="tipo">
                              <option <?php if($row[8]==1){ echo 'selected'; }else{} ?> value="1">Preventiva
                              <option <?php if($row[8]==2){ echo 'selected'; }else{} ?> value="2">Segunda Notificacion
                            </select>
                              </td>
                              </td>
                              <td>Observaciones:<input class="form-control" id="observaciones" name="observaciones" autofocus="true"
                                  value="<?php echo $row[9];?>"></input>
                              </td>
                        </tr>
                      </tbody>
                    </table>

                    <div class="form-group">
                    <div id="errores" style="display: none;" class="alert alert-danger hiddenDiv">
                      <ul id="listaErrores">
                      </ul>
                    </div>


                    


                    <button type="submit" class="btn btn-success" id="enviar" name="enviar">OK</button>
                    <button type="button" class="btn btn-danger" id="cancel" name="cancel" onclick="location.href='http://localhost/MuniMora/index_notificaciones.php'">Cancelar</button>
                    </form>
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
        <script src="js/modals.js" type="text/javascript"></script>
        <script src="js/enotificaciones.js" type="text/javascript"></script>
  </body>

  </html>
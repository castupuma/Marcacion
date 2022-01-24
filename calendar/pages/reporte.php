<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <title>La Marcacion</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="icon" type="image/png" href="../dist/img/icon.png" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css" />
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
  <!-- daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css" />
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" />
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" />
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css" />
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css" />
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css" />
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css" />
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css" />
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css" />
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables/jquery.dataTables.min.css">
  <!--<link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">-->

  <!-- <link rel="stylesheet" type="text/css" href="../plugins/datatables/datatables.min.css"/>
  <link rel="stylesheet"  type="text/css" href="../plugins/datatables/dataTables.bootstrap4.min.css"> -->

  <style>
    .padding-0 {
      padding: 0rem;
    }

    .color-1 {
      color: white;
      background-color: #50c6f1;
    }

    .color-2 {
      color: white;
      background-color: #93e069;
    }

    .color-3 {
      color: white;
      background-color: #fbd80b;
    }

    .color-4 {
      color: white;
      background-color: #e61101;
    }

    .color-5 {
      color: white;
      background-color: #fb8602;
    }

    .color-6 {
      color: white;
      background-color: #f72d72;
    }

    .color-7 {
      color: white;
      background-color: #775447;
    }

    .color-8 {
      color: white;
      background-color: #7347be;
    }

    .color-9 {
      color: white;
      background-color: #047ac1;
    }

    .color-10 {
      color: white;
      background-color: #ba0d69;
    }

    .color-11 {
      color: #d4710c;
      background-color: #f7e277;
    }

    .color-12 {
      color: white;
      background-color: #5f7c89;
    }

    .color-13 {
      color: white;
      background-color: #ccdc3a;
    }

    .color-14 {
      color: white;
      background-color: #01b4ff;
    }

    .color-15 {
      color: white;
      background-color: #f7b900;
    }

    .color-16 {
      color: white;
      background-color: #53cc01;
    }

    .color-17 {
      color: white;
      background-color: #1586ff;
    }

    .color-18 {
      color: white;
      background-color: #a0da92;
    }

    .badge-right {
      right: -1px;
      top: -1px;
    }

    .button-calendar {
      min-width: 0px;
      margin: 0%;
      font-size: 18px;
      background-color: #ffffff;
    }
  </style>
  <script>
    var g_url = localStorage.url;
    var g_idtransaccion = localStorage.idtransaccion;
    var g_avatar = localStorage.avatar;
    if (g_idtransaccion == undefined || g_idtransaccion == 0) {
      document.location.href = g_url + "calendar/";
    }
  </script>
</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button">
            <i class="fas fa-bars"></i>
            <div class="float-right d-none d-sm-block"><b> &nbsp; HOSPITAL NACIONAL DOCENTE MADRE NINO SAN BARTOLOME </b></div>
          </a>

        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #011933">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="../dist/img/icon.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8" />
        <span class="brand-text font-weight-light">La Marcacion</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img id="idimagenuser" src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" />
          </div>
          <div class="info">
            <a href="#" class="d-block" id="nombreuser">Jhon Iparraguirre</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" id="idmenu">

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- /.col -->
            <div class="col-md-12">

              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Reporte Programacion</h3> &nbsp; &nbsp;

                  <form id="reporte" class="form-inline ml-3" style="margin-left: 0rem !important">

                    <div class="input-group input-group-sm">
                        <label>Mes:</label>
                    </div>  
                    <div class="col-md-2 col-sm-12  form-group">
                      <select id="idmes" name="idmes" class="form-control select2" style="width: 100%" onchange="">
              <!-- <option selected="selected">Alabama</option> -->
                          <option value="01">Enero</option>
                          <option value="02">Febrero</option>
                          <option value="03">Marzo</option>
                          <option value="04">Abril</option>
                          <option value="05">Mayo</option>
                          <option value="06">Junio</option>
                          <option value="07">Julio</option>
                          <option value="08">Agosto</option>
                          <option value="09">Septiembre</option>
                          <option value="10">Octubre</option>
                          <option value="11">Noviembre</option>
                          <option value="12">Diciembre</option>
                      </select>
                    </div>


                    <div class="input-group input-group-sm">
                      <label>Dpto:</label>
                    </div>
                    <div class="col-md-4 col-sm-12  form-group">
                      <select class="select2" style="width: 100%" name="cmbdepartamento" id="cmbdepartamento" onchange="listadoServicios()">
                      </select>
                    </div>

                    <div class="input-group input-group-sm">
                      <label>Servicio:</label>
                    </div>
                    <div class="col-md-2 col-sm-12  form-group">
                     <select class="select2" style="width: 100%" name="cmbservicio" id="cmbservicio" onchange="listadoArea()">
                      </select>
                    </div>

                     <div class="input-group input-group-sm">
                      <label>Area:</label>
                    </div>  
                    <div class="col-md-2 col-sm-12  form-group">   
                      <select class="select2" style="width: 100%" name="cmbarea" id="cmbarea" onchange="" >
                      </select>
                    </div>

                  
                  </form>

                   <br>

                   <div style="align-items: center;" class="item form-group">
                      <div class="col-md-12 col-sm-12  offset-md-5" >
                        <button type="button" class="btn btn-success " onclick="consultaReporte()"><i class="fas fa-search"></i> Consultar</button>
                        <button type="button" class="btn btn-primary " onclick="limpiar()"><i class="fa fa-file"></i> Nuevo</button>
                      </div>
                    </div>


                  <!-- /.card-header -->

                  <div class="panel-body table-responsive" id="listasreporte">
                    <table id="example1" class="table table-striped table-bordered table-condensed table-hover">
                      <thead>
                        <tr>
                          <th style="width:50px">N° Documento</th>
                          <th>Personal</th>
                          <th>Departamento</th>
                          <th>Servicio</th>
                          <th>Area</th>
                          <th style="width:50px">N°Turnos</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>

                    </table>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

            </div>
            <!-- /.col -->
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



    <footer class="main-footer">
      <div class="float-right d-none d-sm-block"><b>Version</b> 1.0.0</div>
      <strong> Developed by
        <a href="#"> LG - JC</a>.</strong>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <!-- <script src="../plugins/jquery/jquery.min.js"></script> -->
  <!-- Bootstrap 4 -->
  <!-- <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
  <!-- AdminLTE App -->
  <!-- <script src="../dist/js/adminlte.min.js"></script> -->
  <!-- AdminLTE for demo purposes -->
  <!-- <script src="../dist/js/demo.js"></script>
    <script src="../dist/js/calendariorol.js"></script> -->
  <!-- date-range-picker -->
  <!-- <script src="../plugins/daterangepicker/daterangepicker.js"></script> -->

  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

  <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="../plugins/jszip/jszip.min.js"></script>
  <script src="../plugins/pdfmake/pdfmake.min.js"></script>
  <script src="../plugins/pdfmake/vfs_fonts.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- Select2 -->
  <script src="../plugins/select2/js/select2.full.min.js"></script>
  <!-- Bootstrap4 Duallistbox -->
  <script src="../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
  <!-- InputMask -->
  <script src="../plugins/moment/moment.min.js"></script>
  <script src="../plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
  <!-- date-range-picker -->
  <script src="../plugins/daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap color picker -->
  <script src="../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Bootstrap Switch -->
  <script src="../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>
  <!-- SweetAlert2  -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../dist/js/app.js"></script>
  <!-- <script src="../dist/js/bundle.b.js"></script> -->
  <script src="../dist/js/bundleReporte.js"></script>

  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <!-- <script src="../dist/js/demo.js"></script> -->


  <script src="../plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="../plugins/jquery-validation/additional-methods.min.js"></script>

  <!-- <script type="text/javascript" src="../plugins/datatables/datatables.min.js"></script> 
  <script src="../plugins/jquery/jquery-3.3.1.min.js"></script>
    <script src="../plugins/popper/popper.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.min.js"></script> -->

  <script>
    //Date range picker
    $("#reservationdate").datetimepicker({
      format: "DD/MM/YYYY HH:mm",
    });
    $("#timepicker").datetimepicker({
      format: "HH:mm",
    });

    $("#idimagenuser").prop('src', g_avatar);
    $("#idmenu").empty();
    $("#nombreuser").text(localStorage.nombres);
  </script>
  <script>
    

    $(function() {
    $.validator.setDefaults({
    submitHandler: function() {

      }
     });


   });
  </script>
</body>

</html>
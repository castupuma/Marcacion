<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>La Marcacion</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/png" href="../dist/img/icon.png" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css" />
    <!-- Tempusdominus Bbootstrap 4 -->
    <link
      rel="stylesheet"
      href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"
    />
    <!-- Ionicons -->
    <link
      rel="stylesheet"
      href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
    />
    <!-- daterange picker -->
    <link
      rel="stylesheet"
      href="../plugins/daterangepicker/daterangepicker.css"
    />
    <!-- iCheck for checkboxes and radio inputs -->
    <link
      rel="stylesheet"
      href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css"
    />
    <!-- Bootstrap Color Picker -->
    <link
      rel="stylesheet"
      href="../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css"
    />
    <!-- Tempusdominus Bbootstrap 4 -->
    <link
      rel="stylesheet"
      href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"
    />
    <!-- Select2 -->
    <link rel="stylesheet" href="../plugins/select2/css/select2.min.css" />
    <link
      rel="stylesheet"
      href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"
    />
    <!-- Bootstrap4 Duallistbox -->
    <link
      rel="stylesheet"
      href="../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css"
    />
    <!-- Select2 -->
    <link rel="stylesheet" href="../plugins/select2/css/select2.min.css" />
    <link
      rel="stylesheet"
      href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"
    />
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css" />
    <!-- Bootstrap4 Duallistbox -->
    <link
      rel="stylesheet"
      href="../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css"
    />
    <!-- Google Font: Source Sans Pro -->
    <link
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700"
      rel="stylesheet"
    />
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
      <link rel="stylesheet" href="../plugins/datatables/jquery.dataTables.min.css">
    <!--<link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">-->

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
      var g_avatar=localStorage.avatar;
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
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"
              >
              <i class="fas fa-bars"></i            >
              <div class="float-right d-none d-sm-block"><b> &nbsp; HOSPITAL NACIONAL DOCENTE MADRE NINO SAN BARTOLOME </b></div>
          </a>
                      
                  </li>
        </ul>        
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside
        class="main-sidebar sidebar-dark-primary elevation-4"
        style="background-color: #011933"
      >
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
          <img
            src="../dist/img/icon.png"
            alt="Logo"
            class="brand-image img-circle elevation-3"
            style="opacity: 0.8"
          />
          <span class="brand-text font-weight-light">La Marcacion</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img
                id="idimagenuser"
                src="../dist/img/user2-160x160.jpg"
                class="img-circle elevation-2"
                alt="User Image"
              />
            </div>
            <div class="info">
              <a href="#" class="d-block" id="nombreuser">Jhon Iparraguirre</a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul
              class="nav nav-pills nav-sidebar flex-column"
              data-widget="treeview"
              role="menu"
              data-accordion="false"
              id="idmenu"
            >
             
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
                      <h3 class="card-title">Relacion de planilla</h3> &nbsp; &nbsp;
                      <span class="btn  btn-primary btn-sm"  data-toggle="modal"    data-target="#exampleModalForm" onclick="limpiarModal()">Agregar Planilla</span>
                      
                    
                    </div>
                  <!-- /.card-header -->

                    <div class="panel-body table-responsive" id="listasplanilla">
                    <table id="example1" class="table table-striped table-bordered table-condensed table-hover">
                      <thead>
                        <tr>
                          <th style="width: 20px">Id</th>
                          <th style="width: 50px">Plaza</th>
                          <th style="text-align: center;">Nombres Completos</th>
                          <th style="text-align: center;">Servicio</th>
                          <th style="text-align: center;">Area</th>
                          <th style="text-align: center;">Estado</th>
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

      <!-- Form Modal registro -->
      <div
        class="modal fade"
        id="exampleModalForm"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalFormTitle"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header" style="padding: 0.2rem">
              <h5
                class="modal-title"
                id="exampleModalFormTitle"
                style="padding: 0.7rem"
              >Registro de planilla </h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true" style="font-size: 2rem">&times;</span>
              </button>
            </div>
            <div class="modal-body" >
              <form id="modalFormPlanilla">
              <div class="row">
                  <div class="col-md-2 col-sm-12  form-group ">
                      <label class="col-form-label  ">Nro planilla</label>
                    </div>
                    <div class="col-md-4 col-sm-12  form-group">
                    <input type="text" placeholder="" class="form-control" disabled id="idplanilla">
                    </div>
                    <div class="col-md-2 col-sm-12  form-group">
                      <label class="col-form-label  ">Estado</label>
                    </div>
                    <div class="col-md-4 col-sm-12  form-group">
                   <select id="estado" name="estado" style="width: 100%" class="custom-select">
                          <option value="0">Activo</option>
                          <option value="1">Inactivo</option>
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-12  form-group">
                      <label class="col-form-label  ">Personal</label>
                    </div>

                    <div class="col-md-10 col-sm-12  form-group">
               
                 <select class="select2" style="width: 100%" name="personal" id="personal" >
   
                      </select>
                  <!-- <input list="listapersonal" style="text-align: center; text-transform: uppercase;"  placeholder="" id="personal" name ="personal" class="form-control select2" onblur="obteneridpersonal()">

                      <datalist id="listapersonal">
                      </datalist> -->
                    </div>

                    <div class="col-md-2 col-sm-12  form-group">
                      <label class="col-form-label  ">Grupo de riesgo</label>
                    </div>
                    <div class="col-md-10 col-sm-12  form-group">
                  <select class="select2" style="width: 100%" name="grupo" id="grupo">
                      </select>
                      <!-- <input id="idgr" type="hidden"></input> 
                      <input list="listagruporiesgo" style="text-align: center; text-transform: uppercase;" placeholder="" id="gr" name ="gr" class="select2" onblur="obteneridgr()">
                      <datalist id="listagruporiesgo" >
                      </datalist> -->
                    </div>

                    <div class="col-md-2 col-sm-12  form-group">
                      <label class="col-form-label  ">Servicio</label>
                    </div>
                    <div class="col-md-4 col-sm-12  form-group">
              <select class="select2" style="width: 100%" name="servicio" id="servicio" onchange="getArea()">
                      </select>
                    <!-- <input id="id_servicio" type="hidden" ></input>
                    <input  list="listaservicio" style="text-align: center; text-transform: uppercase;" placeholder="" id="servicio" name ="servicio"  class="form-control" onblur="obteneridservicio()">
                    <datalist id="listaservicio" >
                    </datalist> -->
                    </div>

                    <div class="col-md-2 col-sm-12  form-group">
                      <label class="col-form-label  ">Area</label>
                    </div>
                    <div class="col-md-4 col-sm-12  form-group">
                 <select id="area" name="area" class="form-control select2" style="width: 100%"> </select>
                   <!--  <input id=id_area type="hidden" ></input>
                    <input list="listaarea" style="text-align: center; text-transform: uppercase;" placeholder=""  id="areaprestacion" name ="areaprestacion" class="form-control" onblur="obteneridarea()">
                    <datalist id="listaarea" >
                    </datalist> -->
                  </div>

                    <div class="col-md-2 col-sm-12  form-group">
                      <label class="col-form-label  ">Puesto de trabajo</label>
                    </div>
                    <div class="col-md-10 col-sm-12  form-group">
                   <select class="select2" name="puesto" id="puesto" style="width: 100%">
                      </select>
                    <!-- <input id=id_pt type="hidden" ></input>
                    <input list="listapuestotrabajo" style="text-align: center; text-transform: uppercase;" placeholder="" id="puestotrabajo" name ="puestotrabajo"  class="form-control" onblur="obteneridpuestotrabajo()">
                    <datalist id="listapuestotrabajo" >
                    </datalist>  -->
                    </div> 
                    
                      <div class="col-md-2 col-sm-12  form-group">
                      <label class="col-form-label  ">Observacion</label>
                    </div>
                    <div class="col-md-10 col-sm-12  form-group">
                    <input type="text" placeholder="" id="observacion" name ="observacion" class="form-control">
                    </div>
                    <div class="col-md-2 col-sm-12  form-group">
                      <label class="col-form-label  ">Fecha de inicio</label>
                    </div>
                    <div class="col-md-4 col-sm-12  form-group">
                      <input class="date-picker form-control" id="fecini" name ="fecini" placeholder="dd-mm-yyyy" type="text" required="required"
                        type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'"
                        onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                    </div>
                    <div class="col-md-2 col-sm-12  form-group">
                      <label class="col-form-label  ">Fecha de fin</label>
                    </div>
                    <div class="col-md-4 col-sm-12  form-group">
                      <input class="date-picker form-control" id="fecfin" name ="fecfin" placeholder="dd-mm-yyyy" type="text" required="required"
                        type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'"
                        onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                    </div>
                  </div>
                  <div class="ln_solid"></div>

                  <div class="item form-group">
                    <div class="col-md-12 col-sm-12  offset-md-5">
                    <button type="button" class="btn btn-primary " onclick="limpiarModal()"><i class="fa fa-file"></i> Nuevo</button>
                    <button type="submit" class="btn btn-success "><i class="fa fa-save"></i> Guardar</button>
                    </div>
                  </div>
              </form>
              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-danger btn-pill"
                  data-dismiss="modal">
                  Cerrar
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <footer class="main-footer">
        <div class="float-right d-none d-sm-block"><b>Version</b> 1.0.0</div>
        <strong
          > Developed by
          <a href="#"> LG - JC</a>.</strong
        >       
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
    <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>-->
     
     <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>-->
     <script src="../plugins/jszip/jszip.min.js"></script>-->
     <script src="../plugins/pdfmake/pdfmake.min.js"></script>-->
     <script src="../plugins/pdfmake/vfs_fonts.js"></script>-->
      <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>-->
        <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>-->
        <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>-->
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
    <script src="../dist/js/bundlePlanilla.js"></script>
  <!--   <script src="../dist/js/bundleListas.js"></script> -->
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="../dist/js/demo.js"></script> -->

    
    <script src="../plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="../plugins/jquery-validation/additional-methods.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
      $('.select2').select2();
      //Date range picker
      $("#reservationdate").datetimepicker({
        format: "DD/MM/YYYY HH:mm",
      });
      $("#timepicker").datetimepicker({
        format: "HH:mm",
      });
      
    $("#idimagenuser").prop('src',g_avatar);
    $("#idmenu").empty();
    $("#nombreuser").text(localStorage.nombres);
    </script>
    <script>
      $(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      registrarPlanilla();
    }
  });
  $('#modalFormPlanilla').validate({
    rules: {
      personal: {
        required: true
      },
      area: {
        required: true
      },
      servicio: {
        required: true
      },
      puesto: {
        required: true
      },
      grupo: {
        required: true
      },
    },
    messages: {
      personal: {
        required: "Ingrese el Personal"
      },
      area: {
        required: "Ingrese el area de prestacion de Servicio"
      },
      servicio: {
        required: "Ingrese el Servicio"
      },
      puesto: {
        required: "Ingrese el Puesto de Trabajo"
      },
      grupo: {
      required: "Ingrese el Grupo de Riesgo"
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});


  </script>
  </body>
</html>

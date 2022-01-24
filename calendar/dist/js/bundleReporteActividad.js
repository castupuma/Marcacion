var tabla;
var g_datares;
var g_periodo = 2021;
let dias = ["Dom", "Lun", "Mar", "Mie", "Juv", "Vie", "Sab"];
var date = new Date();
var primerDia = new Date(date.getFullYear(), date.getMonth(), 1);
var ultimoDia = new Date(date.getFullYear(), date.getMonth() + 1, 0);
$("#idmes").val(String(ultimoDia.getMonth() + 1).padStart(2, "0"));

function cargarMenu() {
  var dat = JSON.stringify({
    idtransaccion: g_idtransaccion,
    dcode: 1,
  });
  $("#idimagenuser").prop("src", g_avatar);
  $("#idmenu").empty();
  $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/menu.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) {
      if (r.success == true) {
        let _datares = r.dataResult;
        _datares.forEach((elemento, indice) => {
          $("#idmenu").append(elemento.etiqueta);
        });
      } else {
        alert("Ocurrio un error en el servidor .." + r.mensaje);
      }
    },
    error: function () {
      alert("Ocurrio un error en el servidor ..listaMenu");
    },
  });
}

function listadoReporteActividad() {
  var dat = JSON.stringify({
    proceso: 3,
    p1: 1,
    p2: 1,
    p3: 1,
    p4: 1,
    p5: 1,
  });
  $("#example2 tbody").empty();

  $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/reporte.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) {
      if (r.success == true) {
        if (r.dataResult.length >= 0) {
          let _datares = r.dataResult;
          _datares.forEach((elemento, indice) => {
            if (elemento.idestado == 0) {
            var boton= `<button type="button" class="btn btn-info" onclick="validar_conformidad(`+elemento.idrol+`)">Validar Conformidad</button>`;
            }else if (elemento.idestado == 1) {
             var boton= `<button type="button" class="btn btn-success">Conforme</button>`;
            }else if (elemento.idestado == 2) {
             var boton= `<button type="button" class="btn btn-danger">No conforme</button>`;
            }
            $("#example2 tbody").append(
              "<tr>" +
              "<td>" +
              elemento.nrodocumento +
              "</td>" +
              "<td>" +
              elemento.nombrecompleto +
              "</td>" +
              "<td>" +
              elemento.puesto +
              "</td>" +
              "<td>" +
              elemento.actividades +
              "</td>" +
              "<td>" +
              elemento.dia +
              "</td>" +
              "<td>" +
              elemento.mes +
              "</td>" +
              "<td>" +boton+
              "</td>" +
              "</tr>"
              );
          });
          listar();
        } else {
          alert("No hay registros encontrados");
        }
      } else {
        alert("Ocurrio un error en el servidor .." + r.mensaje);
      }
    },
    error: function () {
      alert("Ocurrio un error en el servidor. consultaReporte");
    },
  });
}

function validar_conformidad_empleado(id){
  Swal.fire({
    icon: 'info',
    title: 'Validar Trabajo',
    showDenyButton: true,
    showCancelButton: true,
    confirmButtonText: 'Terminado',
    denyButtonText: `No terminado`,
    cancelButtonText: `Cancelar`,
  }).then((result) => {
    if (result.isConfirmed) {
    var dat = JSON.stringify({
    proceso: 3,
    p1: id,
  });
  $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/validaciones.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) {  
      Swal.fire(r.mensaje, '', 'success')
       setTimeout(function(){ 
      //consultaReporteActividad();
       location.reload(); 
      }, 1000);
    },
    error: function () {
      alert("Ocurrio un error en el servidor");
    },
  });

    } 
    else if (result.isDenied) {
          var dat = JSON.stringify({
    proceso: 4,
    p1: id,
  });
  $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/validaciones.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) {  
      Swal.fire(r.mensaje, '', 'success')
       setTimeout(function(){
      //consultaReporteActividad(); 
      location.reload(); 
      }, 1000);
    },
    error: function () {
      alert("Ocurrio un error en el servidor");
    },
  });
    }
  })
}

function validar_conformidad(id){
  Swal.fire({
    icon: 'info',
    title: 'Validacion de Conformidad',
    showDenyButton: true,
    showCancelButton: true,
    confirmButtonText: 'Conforme',
    denyButtonText: `No conforme`,
    cancelButtonText: `Cancelar`,
  }).then((result) => {
    if (result.isConfirmed) {
    var dat = JSON.stringify({
    proceso: 1,
    p1: id,
  });
  $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/validaciones.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) {  
      Swal.fire(r.mensaje, '', 'success')
       setTimeout(function(){ 
      //consultaReporteActividad();
       location.reload(); 
      }, 1000);
    },
    error: function () {
      alert("Ocurrio un error en el servidor");
    },
  });

    } 
    else if (result.isDenied) {
          var dat = JSON.stringify({
    proceso: 2,
    p1: id,
  });
  $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/validaciones.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) {  
      Swal.fire(r.mensaje, '', 'success')
       setTimeout(function(){
      //consultaReporteActividad(); 
      location.reload(); 
      }, 1000);
    },
    error: function () {
      alert("Ocurrio un error en el servidor");
    },
  });
    }
  })
}


function listadoDepartamentos() {
  var dat = JSON.stringify({
    proceso: 1,
    p1: 1,
    p2: 2,
    p3: 1,
    p4: 1,
    p5: 1,
  });

  // $("#cmbdepartamento option").remove();

  $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/listascombo.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) {  
      console.log(r);

      $('#cmbdepartamento').prepend("<option value>Selecciona Departamento</option>");
      $.each(r.dataResult, function(index, item) {
        $('#cmbdepartamento').append($('<option />', {
          text: item.descripcion,
          value: item.id
        }));
      });
      listadoServicios();
      $(".select2").select2();

    },
    error: function () {
      alert("Ocurrio un error en el servidor ..getgrupo");
    },
  });
}

function listadoServicios() {
  var dat = JSON.stringify({
    proceso: 2,
    p1: $("#cmbdepartamento").val(),
    p2: 2,
    p3: 1,
    p4: 1,
    p5: 1,
  });

  $("#cmbservicio option").remove();

  $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/listascombo.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) {
      console.log(r);

      $('#cmbservicio').prepend("<option value>Selecciona Servicio</option>");
      $.each(r.dataResult, function(index, item) {
        $('#cmbservicio').append($('<option />', {
          text: item.descripcion,
          value: item.id
        }));
      });
      listadoArea();
      $(".select2").select2();

    },
    error: function () {
      alert("Ocurrio un error en el servidor ..getgrupo");
    },
  });
}


function listadoArea() {
  var dat = JSON.stringify({
    proceso: 6,
    p1: $("#cmbservicio").val(),
    p2: 2,
    p3: 1,
    p4: 1,
    p5: 1,
  });

  $("#cmbarea option").remove();

  $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/listascombo.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) { console.log(r);

      $('#cmbarea').prepend("<option value>Selecciona Area</option>");
      $.each(r.dataResult, function(index, item) {
        $('#cmbarea').append($('<option />', {
          text: item.descripcion,
          value: item.id
        }));
      });
      listaPersonalActividad();
      $(".select2").select2();

    },
    error: function () {
      alert("Ocurrio un error en el servidor ..getgrupo");
    },
  });
}

function listaPersonalActividad() {
  var dat = JSON.stringify({
    proceso: 10,
    p1: $("#cmbarea").val(),
    p2: 2,
    p3: 1,
    p4: 1,
    p5: 1,
  });

  $("#cmbpersonal option").remove();

  $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/listascombo.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) { console.log(r);

      $('#cmbpersonal').prepend("<option value>Selecciona Personal</option>");
      $.each(r.dataResult, function(index, item) {
        $('#cmbpersonal').append($('<option />', {
          text: item.nombrecompleto,
          value: item.id
        }));
      });
      $(".select2").select2();

    },
    error: function () {
      alert("Ocurrio un error en el servidor ..getgrupo");
    },
  });
}


function consultaReporteActividad() {
  var dat = JSON.stringify({
    proceso: 4,
    p1: $("#cmbdepartamento").val(),
    p2: $("#cmbservicio").val(),
    p3: $("#cmbarea").val(),
    p4: $("#cmbpersonal").val(),
    p5: $("#idmes").val(),
  });
  $("#example2 tbody").empty();

  console.log(dat);
  $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/reporte.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) {
      if (r.success == true) {
        console.log(r.dataResult.length);
        if (r.dataResult.length >= 1) {
          let _datares = r.dataResult;

          _datares.forEach((elemento, indice) => {


        
            if (elemento.idestado1 == 0) {
            var boton1= `<button type="button" class="btn btn-info" onclick="validar_conformidad_empleado(`+elemento.idrol+`)">Validar Trabajo</button>`;
            }else if (elemento.idestado1 == 1) {
             var boton1= `<button type="button" class="btn btn-success">Terminado</button>`;
            }else if (elemento.idestado1 == 2) {
             var boton1= `<button type="button" class="btn btn-danger">Incompleto</button>`;
            }
            

            if (elemento.idestado == 0) {
            var boton= `<button type="button" class="btn btn-info" onclick="validar_conformidad(`+elemento.idrol+`)">Validar Conformidad</button>`;
            }else if (elemento.idestado == 1) {
             var boton= `<button type="button" class="btn btn-success">Conforme</button>`;
            }else if (elemento.idestado == 2) {
             var boton= `<button type="button" class="btn btn-danger">No conforme</button>`;
            }

         
            $("#example2 tbody").append(
              "<tr>" +
              "<td>" +
              elemento.nrodocumento +
              "</td>" +
              "<td>" +
              elemento.nombrecompleto +
              "</td>" +
              "<td>" +
              elemento.puesto +
              "</td>" +
              "<td>" +
              elemento.actividades +
              "</td>" +
              "<td>" +
              elemento.dia +
              "</td>" +
              "<td>" +
              elemento.mes +
              "</td>" +
              "<td>" +boton1+
              "</td>" +
               "<td>" +boton+
              "</td>" +
              "</tr>"
              );
          });
          listar();

        } else {
          alert("No hay registros encontrados ");
        }
      } else {
        alert("Ocurrio un error en el servidor ." + r.mensaje);
      }
    },
    error: function () {
      alert("Ocurrio un error en el servidor. consultaReporte");
    },
  });
}

//listadoReporteActividad();
listadoDepartamentos();
cargarMenu();
//listar();
$(".select2").select2();

function limpiar(){

 location.reload();

}

var msgbox = (Titulo, Mensaje) => {
  Swal.fire({
    icon: "success",
    title: Titulo,
    text: Mensaje,
    showConfirmButton: false,
    timer: 1500,
  });
};

var msgboxerror = (Titulo, Mensaje) => {
  Swal.fire({
    icon: "error",
    title: Titulo,
    text: Mensaje,
    showConfirmButton: false,
    timer: 1500,
  });
};

function listar() {
  tabla = $('#example2').dataTable({
    language: {
      zeroRecords: "No se encontraron resultados",
      sSearch: "Buscar:",
      info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      oPaginate: {
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      
    },
        "aProcessing": true, //activamos el procedimiento del datatable
        "aServerSide": true, //paginacion y filrado realizados por el server
        dom: 'Bfrtip', //definimos los elementos del control de la tabla
       //buttons: ['copyHtml5', 'excelHtml5', 'pdf', 'print'],
       buttons: [{
        text: '<i class="fas fa-file-excel"></i> ',
        extend: 'excelHtml5',
        titleAttr: "Exportar a Excel",
        className: "btn btn-success",
      }, 
      {
        text: '<i class="fas fa-file-csv"></i>',
        extend:   'csvHtml5',
        titleAttr: "Exportar a CSV",
        className: "btn btn-secondary",

      },
      {
        text: '<i class="fas fa-file-pdf"></i>',
        extend: 'pdf',
        titleAttr: "Exportar a PDF",
        className: "btn btn-danger",

      },
      {
        text: '<i class="fa fa-print"></i> ',
        extend: 'print',
        titleAttr: "Imprimir",
        className: "btn btn-info",

      },      
      ],
      "bDestroy": true,
        "iDisplayLength": 5, //paginacion
        "order": [
        [0, "desc"]
        ] //ordenar (columna, orden)
      });
}

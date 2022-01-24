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

function listadoReporte() {
  var dat = JSON.stringify({
    proceso: 1,
    p1: 1,
    p2: 1,
    p3: 1,
    p4: 1,
    p5: 1,
  });
  $("#example1 tbody").empty();

  $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/reporte.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) {
      if (r.success == true) {
        let _datares = r.dataResult;
        // '<td><span class="badge bg-info text-dark">' + elemento.idplaza + "</span></td>" +
        _datares.forEach((elemento, indice) => {
          $("#example1 tbody").append(
            "<tr>" +
              "<td>" +
              elemento.nrodocumento +
              "</td>" +
              "<td>" +
              elemento.Personal +
              "</td>" +
              "<td>" +
              elemento.Departamento +
              "</td>" +
              "<td>" +
              elemento.Servicio +
              "</td>" +
              "<td>" +
              elemento.Area +
              "</td>" +
              "<td>" +
              elemento.CantidadHoras +
              "</td>" +
             
              "</tr>"
          );
        });
      listar();
      } else {
        alert("Ocurrio un error en el servidor .." + r.mensaje);
      }
    },
    error: function () {
      alert("Ocurrio un error en el servidor ..listadoReporte");
    },
  });
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
      $(".select2").select2();

},
error: function () {
alert("Ocurrio un error en el servidor ..getgrupo");
},
});
}


function consultaReporte() {
  var dat = JSON.stringify({
    proceso: 2,
    p1: $("#cmbdepartamento").val(),
    p2: $("#cmbservicio").val(),
    p3: $("#cmbarea").val(),
    p4: 1,
    p5: $("#idmes").val(),
  });
  $("#example1 tbody").empty();

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

          // '<td><span class="badge bg-info text-dark">' + elemento.idplaza + "</span></td>" +
          _datares.forEach((elemento, indice) => {
            $("#example1 tbody").append(
              "<tr>" +
                "<td>" +
                elemento.nrodocumento +
                "</td>" +
                "<td>" +
                elemento.Personal +
                "</td>" +
                "<td>" +
                elemento.Departamento +
                "</td>" +
                "<td>" +
                elemento.Servicio +
                "</td>" +
                "<td>" +
                elemento.Area +
                "</td>" +
                "<td>" +
                elemento.CantidadHoras +
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

function limpiar(){

 location.reload();

}

//listadoReporte();
listadoDepartamentos();
cargarMenu();
$(".select2").select2();

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
    tabla = $('#example1').dataTable({
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
        [1, "asc"]
        ] //ordenar (columna, orden)
      }).DataTable();
  }
  

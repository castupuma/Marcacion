
var g_datares;
var g_periodo = 2021;
let dias = ["Dom", "Lun", "Mar", "Mie", "Juv", "Vie", "Sab"];
var date = new Date();
var primerDia = new Date(date.getFullYear(), date.getMonth(), 1);
var ultimoDia = new Date(date.getFullYear(), date.getMonth() + 1, 0);
$("#idmes").val(String(ultimoDia.getMonth() + 1).padStart(2, "0"));


var dat = JSON.stringify({
  idtransaccion: g_idtransaccion,
  dcode: 1,
});
$("#idimagenuser").prop('src', g_avatar);
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

$("#idcheckin").click(function () {
  una();
});
$("#idcheckout").click(function () {
  dos();
  location.reload();
});


function listadoPersonal() {
  var dat = JSON.stringify({
    proceso: 4,
    turno: 1,
  });
  $("#tablaProgramadoServicio tbody").empty();

  $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/personal.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) {
      if (r.success == true) {
        let _datares = r.dataResult;
        _datares.forEach((elemento, indice) => {
          $("#tablaProgramadoServicio tbody").append(
            "<tr>" +
            "<td>" + elemento.idpersona + "</td>" +
            "<td>" + elemento.idplaza + "</td>" +
            "<td>" + elemento.nombrecompleto + "</td>" +
            "<td>" + elemento.gruporiesgo + "</td>" +
            "<td>" + elemento.estado + "</td>" +
            "</tr>"
          );
        });
      } else {
        alert("Ocurrio un error en el servidor .." + r.mensaje);
      }
    },
    error: function () {
      alert("Ocurrio un error en el servidor ..listadoProgramadosServicio");
    },
  });

  $("#tablaProgramadoServicio").DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
  }).buttons().container().appendTo('#tablaProgramadoServicio_wrapper .col-md-6:eq(0)');

}

listadoPersonal();

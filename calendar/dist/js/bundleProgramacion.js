var g_dia = 0;
var g_idusuario = 0;
var g_periodo = 2021;

cargarcalendar();
$(".select2").select2();
function cargarcalendar() {
 //// listadoProgramadosHora();

 //listadoPersonalServicio();
 
  $("#lstservicioprogramados").empty();
  $("#titleCalendario").empty();
  $("#tablacontenedor tbody").empty();
  let nromes = $("#idmes").val();
  let fechaini = "2021-" + nromes + "-02";
  date = new Date(fechaini);
  primerDia = new Date(date.getFullYear(), date.getMonth(), 1);
  ultimoDia = new Date(date.getFullYear(), date.getMonth() + 1, 0);
  let diainicio = date.getDay();
  let contadordias = 1;
  let datafecha = [];
  let columna = ""; 
  let fila = "";
  let colum = 0;

  var dat = JSON.stringify({
    proceso: 7,
    periodo: g_periodo,
    mes: $("#idmes").val(),
    dia: 1,
    turno: 1,
    servicio: 0,
  });
  let _datares;
  $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/horario.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) {
      _datares = r.dataResult;
      console.log("_datares");

      for (let i = 1; i <= ultimoDia.getDate(); i++) {
        fila = "";
        columna = "";
        columna = "<tr>"; 

        if (i == 1) {
          for (let j = 0; j < diainicio; j++) {
            fila +=
              '<td style="padding: 0rem" ><div class="btn btn-app col-12 button-calendar" ></div></td>';
          }
          for (let j = diainicio; j <= 6; j++) {
            fila +=
              '<td style="padding: 0rem"> <div class="btn btn-app col-12 button-calendar" data-toggle="modal"    data-target="#exampleModalForm" onclick="seleccionardia(' +
              Number(i).toFixed(0) +
              ')"> <span class="badge bg-danger" style="right: -1px; top: -1px">' +
              _datares[i].turno +
              "</span> " +
              Number(i).toFixed(0);
            if (_datares[i].clase != "") {
              fila +=
                '<div><div class="external-event ' +
                _datares[i].clase +
                '"></div>';
            }
            fila += "</div></div></td>";

            if (j < 6) {
              i += 1;
            }
          }
        } else {
          for (let j = 0; j <= 6; j++) {
            if (i <= ultimoDia.getDate()) {
              fila +=
                '<td style="padding: 0rem"> <div class="btn btn-app col-12 button-calendar" data-toggle="modal"     data-target="#exampleModalForm" onclick="seleccionardia(' +
                Number(i).toFixed(0) +
                ')"> <span class="badge bg-danger" style="right: -1px; top: -1px">' +
                _datares[i].turno +
                "</span> " +
                Number(i).toFixed(0);
              if (_datares[i].clase != "") {
                fila +=
                  '<div><div class="external-event ' +
                  _datares[i].clase +
                  '"></div>';
              }
              fila += "</div></div></td>";

              if (j < 6) {
                i += 1;
              }
            }
          }
        }

        columna += fila + "</tr>";
        fila = columna;
        $("#tablacontenedor tbody").append(fila);
      }
    },
    error: function () {
      alert("Ocurrio un error en el servidor ..");
    },
  });
}
function cargarcalendario(_idusuario, _title) {
  listadoProgramadosArea(_idusuario);
  listadoPersonalServicio(_idusuario);
  g_persoanlSeleccionado = _title;
  $("#titleCalendario").text(" de " + g_persoanlSeleccionado);
  $("#tablacontenedor tbody").empty();
  let nromes = $("#idmes").val();
  let fechaini = "2021-" + nromes + "-02";
  date = new Date(fechaini);
  primerDia = new Date(date.getFullYear(), date.getMonth(), 1);
  ultimoDia = new Date(date.getFullYear(), date.getMonth() + 1, 0);
  let diainicio = date.getDay();
  let contadordias = 1;
  let datafecha = [];
  let columna = "";
  let fila = "";
  let colum = 0;

  var dat = JSON.stringify({
    proceso: 7,
    periodo: g_periodo,
    mes: $("#idmes").val(),
    dia: g_dia,
    turno: 1,
    servicio: _idusuario,
  });
  let _datares;
  $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/horario.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) {
      _datares = r.dataResult;
      for (let i = 1; i <= ultimoDia.getDate(); i++) {
        fila = "";
        columna = "";
        columna = "<tr>";

        if (i == 1) {
          for (let j = 0; j < diainicio; j++) {
            fila +=
              '<td style="padding: 0rem" ><div class="btn btn-app col-12 button-calendar" ></div></td>';
          }
          for (let j = diainicio; j <= 6; j++) {
            fila +=
              '<td style="padding: 0rem"> <div class="btn btn-app col-12 button-calendar" data-toggle="modal"    data-target="#exampleModalForm" onclick="seleccionardia(' +
              Number(i).toFixed(0) +
              ')"> <span class="badge bg-danger" style="right: -1px; top: -1px">' +
              _datares[i].turno +
              "</span> " +
              Number(i).toFixed(0);
            if (_datares[i].clase != "") {
              fila +=
                '<div><div class="external-event ' +
                _datares[i].clase +
                '"></div>';
            }
            fila += "</div></div></td>";

            if (j < 6) {
              i += 1;
            }
          }
          
        } else {
          for (let j = 0; j <= 6; j++) {
            if (i <= ultimoDia.getDate()) {
              fila +=
                '<td style="padding: 0rem"> <div class="btn btn-app col-12 button-calendar" data-toggle="modal"     data-target="#exampleModalForm" onclick="seleccionardia(' +
                Number(i).toFixed(0) +
                ')"> <span class="badge bg-danger" style="right: -1px; top: -1px">' +
                _datares[i].turno +
                "</span> " +
                Number(i).toFixed(0);
              if (_datares[i].clase != "") {
                fila +=
                  '<div><div class="external-event ' +
                  _datares[i].clase +
                  '"></div>';
              }
              fila += "</div></div></td>";

              if (j < 6) {
                i += 1;
              }
            }
          }
        }

        columna += fila + "</tr>";
        fila = columna;
        $("#tablacontenedor tbody").append(fila);
      }
    },
    error: function () {
      alert("Ocurrio un error en el servidor ..");
    },
  });

  $("#cmbpersonal").val(_idusuario);
}
listadoDepartamentos();

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

function listadoPersonal() {
  var dat = JSON.stringify({
    proceso: 4,
    p1: 1,
    p2: $("#cmbservicio").val(),
    p3: g_periodo,
    p4: $("#idmes").val(),
    p5: 1,
  });

  $("#tablaProgramado tbody").empty();

  $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/listascombo.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) {
      
      if (r.success == true) {
        let _TcanHoras = 0;
        let _datares = r.dataResult;
        _datares.forEach((elemento, indice) => {
          $("#tablaProgramado tbody").append(
            "<tr>" +
              "<td>" +
              (indice + 1) +
              "</td>" +
              '<td> <a href="#focoservicio" style="text-decoration-line: underline;" onclick="' +
              "cargarcalendario('" +
              elemento.idplanilla +
              "','" +
              elemento.nombrecompleto +
              "')" +
              '">' +
              elemento.nombrecompleto +
              "</a></td>" +           
              "<td>" +
              elemento.horas +
              "</td>" +
              "</tr>"
          );
          _TcanHoras += elemento.Horas * 1;
          
        });
        
      } else {
        alert("Ocurrio un error en el servidor .." + r.mensaje);
      }
    },
    error: function () {
      alert("Ocurrio un error en el servidor ..");
    },
  });
}
function mostrarmodel() {
  $("#exampleModalForm2").modal("show");
}

function listadoPersonalServicio(_person) {
  var dat = JSON.stringify({
    proceso: 10,
    periodo: g_periodo,
    mes: $("#idmes").val(),
    dia: g_dia,
    turno: 1,
    servicio: $("#cmbservicio").val(),
  });

  $("#cmbpersonal option").remove();

  $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/horario.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) {
      if (r.success == true) {
        let _datares = r.dataResult;
        _datares.forEach((elemento, indice) => {
          $("#cmbpersonal").append(
            '<option value="' +
              elemento.nro +
              '" selected="selected">' +
              elemento.descripcion +
              "</option>"
          );
        });
        $("#cmbpersonal").val(_person);
      } else {
        alert("Ocurrio un error en el servidor .." + r.mensaje);
      }
    },
    error: function () {
      alert("Ocurrio un error en el servidor ..");
    },
  });
}
function seleccionardia(T_dia) {
  g_dia = T_dia;
  $("#exampleModalFormTitle").text("        DÍA " + T_dia);
  //listadoProgramadosServicio($("#cmbgrupo").val());
  //listadoProgramadosDia();
}

listadoTurno();

listadoModalidad();
function listadoTurno() {
  var dat = JSON.stringify({
    proceso: 1,
    periodo: g_periodo,
    mes: $("#idmes").val(),
    dia: g_dia,
    turno: 1,
    servicio: 1,
  });

  $("#cmbturnos option").remove();

  $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/horario.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) {
      if (r.success == true) {
        let _datares = r.dataResult;
        _datares.forEach((elemento, indice) => {
          if (indice == 0) {
            $("#cmbturnos").append(
              '<option value="' +
                elemento.nro +
                '" selected="selected">' +
                elemento.descripcion +
                "</option>"
            );
            listadoHoras($("#cmbturnos").val());
          } else {
            $("#cmbturnos").append(
              '<option value="' +
                elemento.nro +
                '" >' +
                elemento.descripcion +
                "</option>"
            );
          }
        });
      } else {
        alert("Ocurrio un error en el servidor .." + r.mensaje);
      }
    },
    error: function () {
      alert("Ocurrio un error en el servidor ..");
    },
  });
}

$("#cmbturnos").bind("change", function (event) {
  listadoHoras($("#cmbturnos").val());
});

function listadoHoras(_idturno) {
  var dat = JSON.stringify({
    proceso: 2,
    periodo: g_periodo,
    mes: $("#idmes").val(),
    dia: g_dia,
    turno: _idturno,
    servicio: 1,
  });

  $("#cmbHoras option").remove();

  $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/horario.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) {
      if (r.success == true) {
        let _datares = r.dataResult;
        _datares.forEach((elemento, indice) => {
          if (indice == 0) {
            $("#cmbHoras").append(
              '<option value="' +
                elemento.nro +
                '" selected="selected">' +
                elemento.descripcion +
                "</option>"
            );
          } else {
            $("#cmbHoras").append(
              '<option value="' +
                elemento.nro +
                '" >' +
                elemento.descripcion +
                "</option>"
            );
          }
        });
      } else {
        alert("Ocurrio un error en el servidor .." + r.mensaje);
      }
    },
    error: function () {
      alert("Ocurrio un error en el servidor ..");
    },
  });
}

function listadoAreaServicio() {
  var dat = JSON.stringify({
    proceso: 14,
    periodo: g_periodo,
    mes: $("#idmes").val(),
    dia: g_dia,
    turno: 1,
    servicio: $("#cmbservicio").val(),
  });

  $("#cmbarea").empty();


  $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/horario.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) {
      if (r.success == true) {
        let _datares = r.dataResult;
        _datares.forEach((elemento, indice) => {
          if (indice == 0) {
            $("#cmbarea").append(
              '<option value="' +
                elemento.id +
                '" selected="selected">' +
                elemento.descripcion +
                "</option>"
            );
            listadoHoras($("#cmbarea").val());
          } else {
            $("#cmbarea").append(
              '<option value="' +
                elemento.id +
                '" >' +
                elemento.descripcion +
                "</option>"
            );
          }
        });
        
      } else {
        alert("Ocurrio un error en el servidor .." + r.mensaje);
      }
    },
    error: function () {
      alert("Ocurrio un error en el servidor ..");
    },
  });
}

function listadoModalidad() {
  var dat = JSON.stringify({
    proceso: 15,
    periodo: g_periodo,
    mes: $("#idmes").val(),
    dia: g_dia,
    turno: 1,
    servicio: $("#cmbservicio").val(),
  });

  $("#cmbmodalidad option").remove();

  $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/horario.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) {
      if (r.success == true) {
        let _datares = r.dataResult;
        _datares.forEach((elemento, indice) => {
          if (indice == 0) {
            $("#cmbmodalidad").append(
              '<option value="' +
                elemento.id +
                '" selected="selected">' +
                elemento.descripcion +
                "</option>"
            );
            listadoHoras($("#cmbmodalidad").val());
          } else {
            $("#cmbmodalidad").append(
              '<option value="' +
                elemento.id +
                '" >' +
                elemento.descripcion +
                "</option>"
            );
          }
        });
      } else {
        alert("Ocurrio un error en el servidor .." + r.mensaje);
      }
    },
    error: function () {
      alert("Ocurrio un error en el servidor ..");
    },
  });
}


function RegistroHorarioProgramacion() {
  var dat = JSON.stringify({
    proceso: 1,
    cip: $("#cmbpersonal").val(),
    periodo: g_periodo,
    mes: $("#idmes").val(),
    dia: g_dia,
    turno: $("#cmbturnos").val(),
    hora: $("#cmbHoras").val(),
    area: $("#cmbarea").val(),
    modalidad: $("#cmbmodalidad").val(),
    cipAut: g_idtransaccion,
    rol: 1,
    actividades:1,
  });

  $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/registro.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) {
      if (r.success == true) {
        //listadoProgramadosServicio($("#cmbgrupo").val());
        //listadoProgramadosDia($("#cmbgrupo").val());
        //listadoProgramadosHora();
        listadoPersonal();
        cargarcalendario($("#cmbpersonal").val(), g_persoanlSeleccionado);
        msgbox(r.mensaje, "");
        $("#exampleModalForm").modal("hide");
        $("#exampleModalForm2").modal("hide");  
      } else {
        alert("Datos Incorrectossss " + r.mensaje);
      }
    },
    error: function () {
      alert("Ocurrio un error en el servidor ..");
    },
  });
}

var msgbox = (Titulo, Mensaje) => {
  Swal.fire({
    icon: "success",
    title: Titulo,
    text: Mensaje,
    showConfirmButton: false,
    timer: 1000,
  });
};

var msgboxIcono = (icono, Mensaje) => {
  Swal.fire({
    icon: icono,
    title: Mensaje,
    showConfirmButton: false,
    timer: 1500,
  });

};

function seleccionardia(T_dia) {
  g_dia = T_dia;
  $("#exampleModalFormTitle").text("        DÍA " + T_dia);
  listadoProgramadosServicio($("#cmbarea").val());
  listadoProgramadosDia($("#cmbservicio").val());
}

// $("#cmbarea").bind("change", function (event) {
//   listadoProgramadosServicio($("#cmbarea").val());
// });

function listadoProgramadosServicio(_Servicio) {
  var dat = JSON.stringify({
    proceso: 4,
    periodo: g_periodo,
    mes: $("#idmes").val(),
    dia: g_dia,
    turno: 1,
    servicio: _Servicio,
  });
  $("#tablaProgramadoServicio tbody").empty();

  $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/horario.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) {
      if (r.success == true) {
        let _datares = r.dataResult;
        _datares.forEach((elemento, indice) => {
          if (elemento.Autorizado == 0) {
            $("#tablaProgramadoServicio tbody").append(
              "<tr>" +
                '<td><span class="badge bg-light"><i class="far fa-calendar" aria-hidden="true"></i></span></td>' +
                "<td>" +
                elemento.Personal +
                "</td>" +
                "<td>" +
                '<span class="badge bg-Light">' +
                elemento.Horas +
                "</span>" +
                "</td>" +
                "</tr>"
            );
          } else {
            $("#tablaProgramadoServicio tbody").append(
              "<tr>" +
                '<td><span class="badge bg-success"><i class="far fa-calendar-check" aria-hidden="true"></i></span></td>' +
                "<td>" +
                elemento.Personal +
                "</td>" +
                "<td>" +
                '<span class="badge bg-Light">' +
                elemento.Horas +
                "</span>" +
                "</td>" +
                "</tr>"
            );
          }
        });
        listadoAreaServicio();
      } else {
        alert("Ocurrio un error en el servidor .." + r.mensaje);
      }
    },
    error: function () {
      alert("Ocurrio un error en el servidor ..");
    },
  });
}
function listadoProgramadosDia(_Servicio) {
  var dat = JSON.stringify({
    proceso: 5,
    periodo: g_periodo,
    mes: $("#idmes").val(),
    dia: g_dia,
    turno: 1,
    servicio:  _Servicio,
  });
  $("#tablaProgramadoDia tbody").empty();

  $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/horario.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) {
      if (r.success == true) {
        let _datares = r.dataResult;
        _datares.forEach((elemento, indice) => {
          if (elemento.Autorizado == 0) {
            $("#tablaProgramadoDia tbody").append(
              "<tr>" +
                '<td style="padding-left: 0.5rem"><i class="far fa-calendar" aria-hidden="true"  style="color:#3c8dbc;"></i></td>' +
                "<td>" +
                elemento.Personal +
                "</td>" +
                '<td style="padding: .1rem; padding-left:;">' +
                '<span class="badge bg-Light">' +
                elemento.Horas +
                "</span>" +
                "</td>" +
                '<td style="padding-right: 0rem">' +
                '<span class="external-event ' +
                elemento.clase +
                '" style="font-size:9px">' +
                elemento.area +
                "</span>" +
                "</td>" +
                '<td style="padding-right: 0.2rem;" onclick="eliminarProgramacion(' +
                elemento.nro +
                ')"><i class="fas fa-trash-alt" style="color: red;"></i></td>' +
                "</tr>"
            );
          } else {
            $("#tablaProgramadoDia tbody").append(
              "<tr>" +
                '<td style="padding-left: 0.5rem"><i class="fas fa-calendar-check" aria-hidden="true" style="color: green;"></i></td>' +
                "<td>" +
                elemento.Personal +
                "</td>" +
                '<td style="padding: .1rem;padding-left:;">' +
                '<span class="badge bg-Light">' +
                elemento.Horas +
                "</span>" +
                "</td>" +
                '<td style="padding-right: 0rem">' +
                '<span class="external-event ' +
                elemento.clase +
                '" style="font-size:9px">' +
                elemento.Grupo +
                "</span>" +
                "</td>" +
                '<td style="padding-right: 0.2rem;"></td>' +
                "</tr>"
            );
          }
        });
      } else {
        alert("Ocurrio un error en el servidor .." + r.mensaje);
      }
    },
    error: function () {
      alert("Ocurrio un error en el servidor ..");
    },
  });
}

function eliminarProgramacion(nro) {
  var dat = JSON.stringify({
    proceso: 2,
    p1: nro,
    p2: 2,
    p3: 1,
    p4: 1,
    p5: 1,

  });

var mensaje = confirm("¿Seguro que desea Eliminar la Programación?");
 //Verificamos si el usuario acepto el mensaje
if (mensaje) {

 $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/eliminar.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) {
      if (r.success == true) {

        let _datares = r.dataResult;
        console.log(r.dataResult);
        msgbox(r.mensaje, "");
        listadoPersonal();
        cargarcalendario($("#cmbpersonal").val(), g_persoanlSeleccionado);

        $("#exampleModalForm").modal("hide");

      } else {
        alert("Ocurrio un error en el servidor." + r.mensaje);
      }
    },

    error: function () {
      alert("Ocurrio un error en el servidor en eliminarregistro");
    },
  });
        
   }

//Verificamos si el usuario denegó el mensaje
 else {
$("#exampleModalForm").modal("hide");
}

}


function listadoProgramadosArea(_idplanilla) {
  var dat = JSON.stringify({
    proceso: 6,
    periodo: g_periodo,
    mes: $("#idmes").val(),
    dia: g_dia,
    turno: 1,
    servicio: _idplanilla,
  });
  $("#lstservicioprogramados").empty();

  $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/horario.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) {
      if (r.success == true) {
        let _datares = r.dataResult;
        $("#lstservicioprogramados").empty();
        _datares.forEach((elemento, indice) => {
          $("#lstservicioprogramados").append(
            '<div class="external-event ' +
              elemento.clase +
              '" onclick="validarcheck(1)">' +
              elemento.area +
              "</div>"
          );
        });
      } else {
        alert("Ocurrio un error en el servidor .." + r.mensaje);
      }
    },
    error: function () {
      alert("Ocurrio un error en el servidor ..");
    },
  });
}
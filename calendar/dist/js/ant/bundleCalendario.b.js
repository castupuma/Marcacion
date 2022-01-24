var dat = JSON.stringify({
  idtransaccion: g_idtransaccion,
  dcode: 2,
});
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


  //calendarioobject.js

  var g_dia = 0;
var g_periodo = 2021;
listadoGrupos();
function listadoGrupos() {
  var dat = JSON.stringify({
    proceso: 3,
    periodo: g_periodo,
    mes: $("#idmes").val(),
    dia: g_dia,
    turno: 1,
    servicio: 1,
  });

  $("#cmbgrupo option").remove();

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
            $("#cmbgrupo").append(
              '<option value="' +
                elemento.nro +
                '" selected="selected">' +
                elemento.descripcion +
                "</option>"
            );
          } else {
            $("#cmbgrupo").append(
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
      alert("Ocurrio un error en el servidor ..listadoGrupos");
    },
  });
}

listadoTurno();
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
      alert("Ocurrio un error en el servidor ..listadoTurno");
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
      alert("Ocurrio un error en el servidor ..listadoHoras");
    },
  });
}

function seleccionardia(T_dia) {
  g_dia = T_dia;
  $("#exampleModalFormTitle").text("        DÍA " + T_dia);
  listadoProgramadosServicio($("#cmbgrupo").val());
  listadoProgramadosDia();
}
$("#cmbgrupo").bind("change", function (event) {
  listadoProgramadosServicio($("#cmbgrupo").val());
});

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
                '<td style="padding-right: 0.2rem;" onclick="eliminarregistro(' +
                elemento.nro +
                ')" ><i class="fas fa-trash-alt" style="color: red;"></i></td>' +
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
      alert("Ocurrio un error en el servidor ..listadoProgramadosServicio");
    },
  });
}

function listadoProgramadosDia() {
  var dat = JSON.stringify({
    proceso: 5,
    periodo: g_periodo,
    mes: $("#idmes").val(),
    dia: g_dia,
    turno: 1,
    servicio: 1,
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
                '<td style="padding-left: 0.5rem"><span class="badge bg-light"><i class="far fa-calendar" aria-hidden="true"></i></span></td>' +
                "<td>" +
                elemento.Personal +
                "</td>" +
                '<td style="padding-left:">' +
                '<span class="badge bg-Light">' +
                elemento.Horas +
                "</span>" +
                "</td>" +
                "<td>" +
                '<span class="external-event ' +
                elemento.clase +
                '" style="font-size:9px">' +
                elemento.Grupo +
                "</span>" +
                "</td>" +
                "</tr>"
            );
          } else {
            $("#tablaProgramadoDia tbody").append(
              "<tr>" +
                '<td style="padding-left: 0.5rem"><span class="badge bg-success"><i class="fas fa-calendar-check" aria-hidden="true"></i></span></td>' +
                "<td>" +
                elemento.Personal +
                "</td>" +
                '<td style="padding-left:">' +
                '<span class="badge bg-Light">' +
                elemento.Horas +
                "</span>" +
                "</td>" +
                "<td>" +
                '<span class="external-event ' +
                elemento.clase +
                '" style="font-size:9px">' +
                elemento.Grupo +
                "</span>" +
                "</td>" +
                "</tr>"
            );
          }
        });
      } else {
        alert("Ocurrio un error en el servidor .." + r.mensaje);
      }
    },
    error: function () {
      alert("Ocurrio un error en el servidor ..listadoProgramadosServicio");
    },
  });
}

function listadoProgramadosGrupos() {
  var dat = JSON.stringify({
    proceso: 6,
    periodo: g_periodo,
    mes: $("#idmes").val(),
    dia: g_dia,
    turno: 1,
    servicio: g_idtransaccion,
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
              elemento.Grupo +
              "</div>"
          );
        });
      } else {
        alert("Ocurrio un error en el servidor .." + r.mensaje);
      }
    },
    error: function () {
      alert("Ocurrio un error en el servidor ..listadoProgramadosGrupos");
    },
  });
}

function listadoProgramadosHora() {
  var dat = JSON.stringify({
    proceso: 8,
    periodo: g_periodo,
    mes: $("#idmes").val(),
    dia: g_dia,
    turno: 1,
    servicio: g_idtransaccion,
  });
  $("#tablaProgramado tbody").empty();

  $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/horario.php",
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
              elemento.turno +
              "</td>" +
              "<td>" +
              elemento.cantidad +
              "</td>" +
              "<td>" +
              elemento.Horas +
              "</td>" +
              "</tr>"
          );
          _TcanHoras += elemento.Horas * 1;
        });
        $("#tablaProgramado tbody").append(
          "<tr>" +
            "<td>Total De Horas Programadas</td>" +
            "<td></td>" +
            "<td>" +
            _TcanHoras +
            "</td>" +
            "</tr>"
        );
      } else {
        alert("Ocurrio un error en el servidor .." + r.mensaje);
      }
    },
    error: function () {
      alert("Ocurrio un error en el servidor ..listadoProgramadosHora");
    },
  });
}



  //calendariorol.js

  $("#nombreuser").text(sessionStorage.nombres);

let dias = ["Dom", "Lun", "Mar", "Mie", "Juv", "Vie", "Sab"];
var date = new Date();
var primerDia = new Date(date.getFullYear(), date.getMonth(), 1);
var ultimoDia = new Date(date.getFullYear(), date.getMonth() + 1, 0);
$("#idmes").val(String(ultimoDia.getMonth() + 1).padStart(2, "0"));

cargarcalendar();

function cargarcalendar() {
  listadoProgramadosGrupos();
  listadoProgramadosHora();
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
    servicio: g_idtransaccion,
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
              '<td style="padding: 0rem" ><div class="btn btn-app col-12 button-calendar"  ></div></td>';
          }
          for (let j = diainicio; j <= 6; j++) {
            fila +=
              '<td style="padding: 0rem"> <div class="btn btn-app col-12 button-calendar" data-toggle="modal"    data-target="#exampleModalForm" onclick="seleccionardia(' +
              Number(i).toFixed(0) +
              ')"> <span class="badge bg-warning" style="right: -1px; top: -1px">' +
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
                ')"> <span class="badge bg-warning" style="right: -1px; top: -1px">' +
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
      alert("Ocurrio un error en el servidor ..cargarcalendar");
    },
  });
}

function validarcheck(nrochek) {
  for (let i = 1; i < 14; i++) {
    document.getElementById("rb" + i).checked = false;
  }
  document.getElementById("rb" + nrochek).checked = true;
}


//calendarioRegistro.js

function RegistroHorario() {
    var dat = JSON.stringify({
      proceso: 0,
      cip: g_idtransaccion,
      periodo: g_periodo,
      mes: $("#idmes").val(),
      dia: g_dia,
      turno: $("#cmbturnos").val(),
      hora: $("#cmbHoras").val(),
      servicio: $("#cmbgrupo").val(),
      cipAut: 0,
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
          listadoProgramadosServicio($("#cmbgrupo").val());
          listadoProgramadosDia();
          cargarcalendar();
          msgbox(r.mensaje, "");
          $("#exampleModalForm").modal("hide");
        } else {
          alert("Datos Incorrectossss " + r.mensaje);
        }
      },
      error: function () {
        alert("Ocurrio un error en el servidor ..");
      },
    });
  }
  
  function eliminarregistro(t_reg) {
    var dat = JSON.stringify({
      proceso: 12,
      periodo: g_periodo,
      mes: $("#idmes").val(),
      dia: g_idtransaccion,
      turno: 1,
      servicio: t_reg,
    });
  
    $.ajax({
      data: dat,
      url: g_url + "apicalendar/api/horario.php",
      type: "POST",
      dataType: "json",
      contentType: "application/json",
      processData: false,
      success: function (r) {
        if (r.success == true) {
          listadoProgramadosServicio($("#cmbgrupo").val());
          listadoProgramadosDia();
          cargarcalendar();
          msgbox(r.mensaje, "");
          $("#exampleModalForm").modal("hide");
        } else {
          alert("Datos Incorrectossss " + r.mensaje);
        }
      },
      error: function () {
        alert("Ocurrio un error en el servidor ..listadoGrupos");
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
  
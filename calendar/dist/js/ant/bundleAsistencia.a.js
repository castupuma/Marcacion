
var g_datares;
var g_periodo = 2021;
let dias = ["Dom", "Lun", "Mar", "Mie", "Juv", "Vie", "Sab"];
var date = new Date();
var primerDia = new Date(date.getFullYear(), date.getMonth(), 1);
var ultimoDia = new Date(date.getFullYear(), date.getMonth() + 1, 0);
$("#idmes").val(String(ultimoDia.getMonth() + 1).padStart(2, "0"));

cargarcalendar();

function cargarcalendar() {
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
  let _style = 'style="border: 0px"';
  date = new Date();

  for (let i = 1; i <= ultimoDia.getDate(); i++) {
    fila = "";
    columna = "";
    columna = "<tr>"; 

    if (i == 1) {
      for (let j = 0; j < diainicio; j++) {
        fila += '<td style="padding: 0rem" ></td>';
      }
      for (let j = diainicio; j <= 6; j++) {
        if (i == date.getDate()) {
          seleccionardia(i);
          _style =
            'style="border: 0px;background-color: #04d3ef;color: white;"';
        } else {
          _style = 'style="border: 0px"';
        }
        fila +=
          '<td style="padding: 0rem"> <div class="btn btn-app col-12 button-calendar" ' +
          _style +
          'onclick="seleccionardia(' +
          Number(i).toFixed(0) +
          ')">' +
          Number(i).toFixed(0);

        fila += "</div></td>";
        if (j < 6) {
          i += 1;
        }
      }
    } else {
      for (let j = 0; j <= 6; j++) {
        if (i <= ultimoDia.getDate()) {
          if (i == date.getDate()) {
            seleccionardia(i);
            _style =
              'style="border: 0px;background-color: #04d3ef;color: white;"';
          } else {
            _style = 'style="border: 0px"';
          }
          fila +=
            '<td style="padding: 0rem"> <div class="btn btn-app col-12 button-calendar" ' +
            _style +
            ' onclick="seleccionardia(' +
            Number(i).toFixed(0) +
            ')"> ' +
            Number(i).toFixed(0);

          fila += "</div></td>";
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
}

// function seleccionardia(T_dia) {
//   //g_dia = T_dia;
//   var dat = JSON.stringify({
//     proceso: 11,
//     periodo: g_periodo,
//     mes: $("#idmes").val(),
//     dia: T_dia,
//     turno: 1,
//     servicio: 0,
//   });
//   $("#iddiatitle").text("   DÍA " + T_dia);
//   $("#tablaProgramadoDia tbody").empty();

//   $.ajax({
//     data: dat,
//     url: g_url + "apicalendar/api/horario.php",
//     type: "POST",
//     dataType: "json",
//     contentType: "application/json",
//     processData: false,
//     success: function (r) {
//       if (r.success == true) {
//         let _datares = r.dataResult;
//         _datares.forEach((elemento, indice) => {
//           $("#tablaProgramadoDia tbody").append(
//             "<tr>" +
//               '<td style="padding: .33rem;">' +
//               (indice + 1) +
//               "</a></td>" +
//               '<td style="padding: .33rem;">' +
//               elemento.personal +
//               "</td>" +
//               '<td style="padding: .33rem;">' +
//               '<span class="external-event ' +
//               elemento.clase +
//               '" style="font-size:10px">' +
//               elemento.area +
//               "</span>" +
//               "</td>" +
//               '<td style="padding: .33rem;">' +
//               elemento.horaingreso +
//               "</td>" +
//               '<td style="padding: .33rem;">' +
//               elemento.hora +
//               "</td>"
//           );
//           g_datares = _datares;
//         });
//       } else {
//         alert("Ocurrio un error en el servidor .." + r.mensaje);
//       }
//     },
//     error: function () {
//       alert("Ocurrio un error en el servidor ..");
//     },
//   });
// }

function seleccionardia(T_dia) {
  //g_dia = T_dia;
  var dat = JSON.stringify({
    proceso: 11,
    periodo: g_periodo,
    mes: $("#idmes").val(),
    dia: T_dia,
    turno: 1,
    servicio: 0,
  });
  $("#iddiatitle").text("   DÍA " + T_dia +"/"+ $("#idmes").val()+'/'+g_periodo);
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
        let _arera_ ="";
        _datares.forEach((elemento, indice) => {
          if (_arera_ == elemento.area)
          {
            $("#tablaProgramadoDia tbody").append(
              "<tr>" +
                '<td style="padding: .33rem;">' +
                (indice + 1) +
                "</a></td>" +
                '<td style="padding: .33rem;">' +
                elemento.personal +
                "</td>" +               
                '<td style="padding: .33rem;">' +
                elemento.horaingreso +
                "</td>" +
                '<td style="padding: .33rem;">' +
                '<span class="' +
                elemento.tema +
                '" style="font-size:12px">' +
                 elemento.asistencia +
                "</span>" +
                "</td>" +     
                '<td style="padding: .33rem;">' +
                elemento.hora +
                "</td></tr>"
            );
          }
          else{
            _arera_ = elemento.area;
            $("#tablaProgramadoDia tbody").append(
              "<tr>" +                
                '<td style="padding: .33rem;" colspan="5">' +
                '<span class="external-event ' +
                elemento.clase +
                '" style="font-size:10px">' +
                elemento.area +
                "</span>" +                 
                "</td></tr>"
            );

            $("#tablaProgramadoDia tbody").append(
              "<tr>" +
                '<td style="padding: .33rem;">' +
                (indice + 1) +
                "</a></td>" +
                '<td style="padding: .33rem;">' +
                elemento.personal +
                "</td>" +
                '<td style="padding: .33rem;">' +
                elemento.horaingreso +
                "</td>" +
                '<td style="padding: .33rem;">' +
                '<span class="' +
                elemento.tema +
                '" style="font-size:12px">' +
                 elemento.asistencia +
                "</span>" +
                "</td>" +         
                '<td style="padding: .33rem;">' +
                elemento.hora +
                "</td></tr>"
            );
          }
         
          g_datares = _datares;
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



function asiste(t_valor) {
  var dat = JSON.stringify({
    idtransaccion: g_idtransaccion,
    dcode: t_valor,
  });
  $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/asistir.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) {
       if (r.success == true) {
        dos();
        msgbox(r.mensaje, "");       
        cargarcalendar();
        $("#exampleModalForm").modal("hide");    
        location.reload();            
      } else {
        msgboxerror(r.mensaje,"")        
      }
    },
    error: function () {
      alert("Ocurrio un error en el servidor ..listaMenu");
    },
  });
}


var dat = JSON.stringify({
    idtransaccion: g_idtransaccion,
    dcode: 1,
  });
  $("#idimagenuser").prop('src',g_avatar);
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

  $("#idcheckin").click(function() {
    una();
  });
  $("#idcheckout").click(function() {
    dos();
    location.reload();
  });

    var qr = new Instascan.Scanner({
      video: document.getElementById("qrcam"),
    });
    qr.addListener("scan", function (data) {
      asiste(data);      
    });

    function una() {
        Instascan.Camera.getCameras()
          .then(function (cameras) {
            if (cameras.length > 1) {
              qr.start(cameras[1]);
            } else {
              qr.start(cameras[0]);
              //console.error("No cameras found.");
            }
          })
          .catch(function (err) {
            console.log(err);
          });
      }
  
      function dos() {
        Instascan.Camera.getCameras()
          .then(function (cameras) {
            if (cameras.length > 1) {
              qr.stop(cameras[1]);
            } else {
              qr.stop(cameras[0]);
            }
          })
          .catch(function (err) {
            console.log(err);
          });
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
          icon: 'error',
          title: Titulo,
          text: Mensaje,
          showConfirmButton: false,
          timer: 1500  
        })
      };
     
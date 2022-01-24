var tabla;
var g_datares;
var g_periodo = 2021;
let dias = ["Dom", "Lun", "Mar", "Mie", "Juv", "Vie", "Sab"];
var date = new Date();
var primerDia = new Date(date.getFullYear(), date.getMonth(), 1);
var ultimoDia = new Date(date.getFullYear(), date.getMonth() + 1, 0);
$("#idmes").val(String(ultimoDia.getMonth() + 1).padStart(2, "0"));



function cargarMenu(){
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
    alert("Ocurrio un error en el servidor. listaMenu");
  },
});
}
function listadoPlanilla() {
  var dat = JSON.stringify({

    proceso:1,
    p1: 1,
    p2: 1,
    p3: 1,
    p4: 1,
    p5: 1,
  });
  $("#example1 tbody").empty();

  $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/planilla.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) {
      if (r.success == true) {
        let _datares = r.dataResult;
        // '<td><span class="badge bg-info text-dark">' + elemento.idplaza + "</span></td>" +
        _datares.forEach((elemento, indice) => {
          if(elemento.estado=="ACTIVO"){
            $("#example1 tbody").append(
              "<tr>" +
              '<td><span class="badge bg-secondary text-dark" style="width: 100%;">' + elemento.idplanilla + "</td>" +
              '<td><span class="badge bg-primary" style="width: 100%;" onclick="listadoPlanillaId('+ elemento.idplanilla+ ')">' + elemento.idplaza + "</span></td>" +
              "<td>" + elemento.nombrecompleto + "</td>" +
              "<td>" + elemento.servicio + "</td>" +
              "<td>" + elemento.area + "</td>" +
              '<td><span class="badge bg-success text-dark" style="width: 100%;">' + elemento.estado + "</td>" +
              "</tr>"
            );
          }else{
            $("#example1 tbody").append(
              "<tr>" +
              '<td><span class="badge bg-secondary text-dark" style="width: 100%;">' + elemento.idplanilla + "</td>" +
              '<td><span class="badge bg-primary" style="width: 100%;" onclick="listadoPlanillaId('+ elemento.idplanilla+ ')">' + elemento.idplaza + "</span></td>" +
              "<td>" + elemento.nombrecompleto + "</td>" +
              "<td>" + elemento.servicio + "</td>" +
              "<td>" + elemento.area + "</td>" +
              '<td><span class="badge bg-danger" style="width: 100%;">' + elemento.estado + "</td>" +
              "</tr>"
            );
          }
          
        });
        listar();
      } else {
        alert("Ocurrio un error en el servidor .." + r.mensaje);
      }
    },
    error: function () {
      alert("Ocurrio un error en el servidor. listadoPlanilla");
    },
  });

}

function listadoPlanillaId(idplanilla) {
  var dat = JSON.stringify({
    proceso: 2,
    p1: idplanilla,
    p2: 2,
    p3: 1,
    p4: 1,
    p5: 1,
  });

  $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/planilla.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) {
      if (r.success == true) {
        let _datares = r.dataResult;
        // '<td><span class="badge bg-info text-dark">' + elemento.idplaza + "</span></td>" +
        $("#exampleModalForm").modal("show");
        _datares.forEach((elemento, indice) => {

          $("#idplanilla").val(elemento.idplanilla);
          $("#estado").val(elemento.estado);
          $("#personal").val(elemento.idpersona);
          $("#grupo").val(elemento.idgruporiesgo);
          //$("#gr").val(elemento.gruporiesgo);
          $("#servicio").val(elemento.idservicio);
          //$("#servicio").val(elemento.servicio);
          var dat1 = JSON.stringify({
          proceso: 6,
          p1: elemento.idservicio,
          p2: 2,
          p3: 3,
          p4: 4,
          p5: 5,
          });
          $("#area option").remove();
          $.ajax({
            data: dat1,
            url: g_url + "apicalendar/api/listascombo.php",
            type: "POST",
            dataType: "json",
            contentType: "application/json",
            processData: false,
            success: function (r) {
            $('#area').prepend("<option value>Selecciona Area</option>");
            $.each(r.dataResult, function(index, item) {
              $('#area').append($('<option />', {
                          text: item.descripcion,
                          value: item.id
                      }));
                  });
            if (elemento.idarea) {
               $("#area").val(elemento.idarea);
            }
                
            
            },
            error: function () {
            alert("Ocurrio un error en el servidor ..Getarea");
            },
            });
   
          console.log(elemento.idarea);
          //$("#areaprestacion").val(elemento.area);
          $("#puesto").val(elemento.idpuesto);
          //$("#puestotrabajo").val(elemento.puestotrabajo);
          $("#observacion").val(elemento.observacion);
          $("#fecini").val(elemento.fechainicio);
          $("#fecfin").val(elemento.fechafin);
          $(".select2").select2();
        });
      
        
      } else {
        alert("Ocurrio un error en el servidor .." + r.mensaje);
      }
    },
    error: function () {
      alert("Ocurrio un error en el servidor. listadoPlanillaId");
    },
  });
}



function limpiarModal(){

  $("#idplanilla").val("");
  $("#estado").val("0");
  $("#idplaza").val("");

  $("#personal").val('').trigger('change');
  $("#grupo").val('').trigger('change');
  //$("#gr").val("");
  $("#servicio").val('').trigger('change');
  //$("#servicio").val("");
  $("#area").val('').trigger('change');
  //$("#areaprestacion").val("");
  $("#puesto").val('').trigger('change');
  //$("#puestotrabajo").val("");
  $("#observacion").val("");
  $("#fecini").val("");
  $("#fecfin").val("");
}


function getPersonal(){
        var dat = JSON.stringify({
    proceso: 1,
    p1: 1,
    p2: 2,
    p3: 3,
    p4: 4,
    p5: 5,
  });
    $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/personal.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) {
                console.log(r);

          $('#personal').prepend("<option value>Selecciona Personal</option>");
            $.each(r.dataResult, function(index, item) {
                $('#personal').append($('<option />', {
                    text: item.nombrecompleto,
                    value: item.idpersona
                }));
            });
            $(".select2").select2();

    },
    error: function () {
      alert("Ocurrio un error en el servidor. getPersonal");
    },
  });
    }

// function obteneridpersonal() {
//   var dat = JSON.stringify({
//     nombrepersonal: $("#personal").val(),
//   });

//   $.ajax({
//     data: dat,
//     url: g_url + "apicalendar/api/listasid.php",
//     type: "POST",
//     dataType: "json",
//     contentType: "application/json",
//     processData: false,
//     success: function (r) {
//       if (r.success == true) {
//         console.log(r.dataResult);
//         console.log(r.dataResult[0].idplaza);
//         let _datares = r.dataResult[0].idplaza;      
//         $("#idplaza").val(_datares);
        
//       } else {
//         alert("Ocurrio un error en el servidor .." + r.mensaje);
//       }
//     },
//     error: function () {
//       alert("Ocurrio un error en el servidor ..listadoProgramadosServicio");
//     },
//   }); 
// }


function getGrupo(){
  var dat = JSON.stringify({
proceso: 7,
p1: 1,
p2: 2,
p3: 3,
p4: 4,
p5: 5,
});
$.ajax({
data: dat,
url: g_url + "apicalendar/api/listascombo.php",
type: "POST",
dataType: "json",
contentType: "application/json",
processData: false,
success: function (r) {
          console.log(r);

    $('#grupo').prepend("<option value>Selecciona Grupo Riesgo</option>");
      $.each(r.dataResult, function(index, item) {
          $('#grupo').append($('<option />', {
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

function getServicio(){
  var dat = JSON.stringify({
    proceso: 5,
    p1: 1,
    p2: 2,
    p3: 1,
    p4: 1,
    p5: 1,
  });

  $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/listascombo.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) {
              console.log(r);
    
        $('#servicio').prepend("<option value>Selecciona Servicio</option>");
          $.each(r.dataResult, function(index, item) {
              $('#servicio').append($('<option />', {
                  text: item.descripcion,
                  value: item.id
              }));
          });
          
          $(".select2").select2();

       
    },
    error: function () {
    alert("Ocurrio un error en el servidor ..getServicio");
    },
    });
}

function getArea(){
  var dat = JSON.stringify({
proceso: 6,
p1: $("#servicio").val(),
p2: 2,
p3: 3,
p4: 4,
p5: 5,
});
$("#area option").remove();
$.ajax({
  data: dat,
  url: g_url + "apicalendar/api/listascombo.php",
  type: "POST",
  dataType: "json",
  contentType: "application/json",
  processData: false,
  success: function (r) {
            console.log(r);
  
      $('#area').prepend("<option value>Selecciona Area</option>");
        $.each(r.dataResult, function(index, item) {
            $('#area').append($('<option />', {
                text: item.descripcion,
                value: item.id
            }));
        });
        $(".select2").select2();
  
  },
  error: function () {
  alert("Ocurrio un error en el servidor ..getArea");
  },
  });
}

function getPuesto(){
  var dat = JSON.stringify({
proceso: 8,
p1: 1,
p2: 2,
p3: 3,
p4: 4,
p5: 5,
});
$.ajax({
data: dat,
url: g_url + "apicalendar/api/listascombo.php",
type: "POST",
dataType: "json",
contentType: "application/json",
processData: false,
success: function (r) {
          console.log(r);

    $('#puesto').prepend("<option value>Selecciona Puesto</option>");
      $.each(r.dataResult, function(index, item) {
          $('#puesto').append($('<option />', {
              text: item.descripcion,
              value: item.id
          }));
      });
      $(".select2").select2();

},
error: function () {
alert("Ocurrio un error en el servidor ..getPuesto");
},
});
}

listadoPlanilla();
cargarMenu();
getPersonal();
getGrupo();
getServicio();
getPuesto();
//getArea();


function registrarPlanilla(){

  
    var dat = JSON.stringify({

      id: $("#idplanilla").val(),
      ip: $("#personal").val(),
      igr: $("#grupo").val(),
      is: $("#servicio").val(),
      iap: $("#area").val(),
      ipt: $("#puesto").val(),
      ob: $("#observacion").val(),
      fi: $("#fecini").val(),
      ff: $("#fecfin").val(),
      es: $("#estado").val(), 
    });
  
    $.ajax({
      data: dat,
      url: g_url + "apicalendar/api/registroplanilla.php",
      type: "POST",
      dataType: "json",
      contentType: "application/json",
      processData: false,
      success: function (r) {
        if (r.success == true) {     
          msgbox(r.mensaje);
          listadoPlanilla();
          location.reload();
          $("#exampleModalForm").modal("hide");
        } else {
          msgboxerror("Datos Incorrectossss " + r.mensaje);
        }
        
      },
      
      error: function () {
        msgboxerror("Ocurrio un error en el servidor. registrarPlanilla");
      },
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
        "iDisplayLength": 8, //paginacion
        "order": [
        [0, "desc"]
        ] //ordenar (columna, orden)
      }).DataTable();
  }
  
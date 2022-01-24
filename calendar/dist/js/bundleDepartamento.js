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
    alert("Ocurrio un error en el servidor ..listaMenu");
  },

});
}
function listadoDepartamento() {
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
    url: g_url + "apicalendar/api/departamento.php",
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
              '<td><span class="badge bg-primary" style="width: 100%;" onclick="listadoDepartamentoId('+ elemento.id+ ')">' + elemento.id + "</span></td>" +
              "<td>" + elemento.descripcion + 
              '<td><span class="badge bg-light text-dark" style="width: 100%;">' + elemento.tipo + "</td>" +
              '<td><span class="badge bg-success text-dark" style="width: 100%;">' + elemento.estado + "</td>" +
              "</tr>"
            );
          }else{
        
            $("#example1 tbody").append(
              "<tr>" +
              '<td><span class="badge bg-primary" style="width: 100%;" onclick="listadoDepartamentoId('+ elemento.id+ ')">' + elemento.id + "</span></td>" +
              "<td>" + elemento.descripcion + 
              '<td><span class="badge bg-light text-dark" style="width: 100%;">' + elemento.tipo + "</td>" +
              '<td><span class="badge bg-danger text-dark" style="width: 100%;">' + elemento.estado + "</td>" +
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
      alert("Ocurrio un error en el servidor ..listadoProgramadosServicio");
    },
  });

}



function listadoDepartamentoId(idundorganizacional){
  var dat = JSON.stringify({
    proceso: 2,
    p1: idundorganizacional,
    p2: 1,
    p3: 1,
    p4: 1,
    p5: 1,
  });

  $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/departamento.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) {
      if (r.success == true) {
        let _datares = r.dataResult;
        // '<td><span class="badge bg-info text-dark">' + elemento.idplaza + "</span></td>" +
        console.log(r.dataResult);
        $("#exampleModalForm").modal("show");
        _datares.forEach((elemento, indice) => {
         
          $("#idundorganizacional").val(elemento.id);
          $("#descripcion").val(elemento.descripcion);
          $("#tipo").val(elemento.tipo);
          $("#estado").val(elemento.estado);
          
        });
       
      } else {
        alert("Ocurrio un error en el servidor .." + r.mensaje);
      }
    },
    error: function () {
      alert("Ocurrio un error en el servidor ..listadoPersonal 2");
    },
  });
}

function limpiarModal(){
  $("#idundorganizacional").val("");
  $("#descripcion").val("");
  $("#tipo").val("0");
  $("#estado").val("0");
 
}

listadoDepartamento();
cargarMenu();


function registrarDepartamento()
{
 
  var dat = JSON.stringify({
    proceso :3,
    p1: $("#idundorganizacional").val(), 
    p2: $("#descripcion").val(), 
    p3: $("#tipo").val(), 
    p4: $("#estado").val(), 
    p5: 0,
  });

    $.ajax({
      data: dat,
      url: g_url + "apicalendar/api/departamento.php",
      type: "POST",
      dataType: "json",
      contentType: "application/json",
      processData: false,
      success: function (r) {
        if (r.success == true) {     
          msgbox(r.mensaje);
          listadoDepartamento();
          location.reload();
          $("#exampleModalForm").modal("hide");
        } else {
          msgboxerror("Datos Incorrectossss " + r.mensaje);
        }
        
      },
      
      error: function () {
        msgboxerror("Ocurrio un error en el servidor ..");
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
  
function listadoGrupoRiesgo() {
  var dat = JSON.stringify({
    proceso: 1,
    servicio: 1,
  });
  $("#listagruporiesgo tbody").empty();

  $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/listas.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) {
      if (r.success == true) {
        let _datares = r.dataResult;       
        _datares.forEach((elemento) => {
          option = document.createElement("option");
          option.value =elemento.descripcion ;                 
          listagruporiesgo.append(option);  
        });
      } else {
        alert("Ocurrio un error en el servidor .." + r.mensaje);
      }
    },
    error: function () {
      alert("Ocurrio un error en el servidor ..listadoGrupoRiesgo");
    },
  });
}

function listadoServicio() {
  var dat = JSON.stringify({
    proceso: 2,
    servicio: 1,
  });
  $("#listaservicio tbody").empty();

  $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/listas.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) {
      if (r.success == true) {
  
        let _datares = r.dataResult;       
        _datares.forEach((elemento) => {
          option = document.createElement("option");
          option.value =elemento.descripcion ;                 
          listaservicio.append(option);  

        });
      } else {
        alert("Ocurrio un error en el servidor .." + r.mensaje);
      }
    },
    error: function () {
      alert("Ocurrio un error en el servidor ..listadoServicio");
    },
  });
}
function obteneridservicio() {
  var dat = JSON.stringify({
    servicio: $("#servicio").val(),
  });

  $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/listasservicio.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) {
      if (r.success == true) {
        
        let _datares = r.dataResult[0].id;      
        $("#id_servicio").val(_datares);
        listadoArea();
      } else {
        alert("Ocurrio un error en el servidor .." + r.mensaje);
      }
    },
    error: function () {
      alert("Ocurrio un error en el servidor ..listado servicio");
    },
  });
}
function listadoArea() {
  var dat = JSON.stringify({
    proceso: 3,
    servicio: $("#id_servicio").val(),
  });
  $("#listaarea tbody").empty();

  $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/listas.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) {
      if (r.success == true) {
        let _datares = r.dataResult;       
        _datares.forEach((elemento) => {
          option = document.createElement("option");
          option.value =elemento.descripcion ;                 
          listaarea.append(option);  
        });
      } else {
        alert("Ocurrio un error en el servidor .." + r.mensaje);
      }
    },
    error: function () {
      alert("Ocurrio un error en el servidor ..listadoServicio");
    },
  });
}

function listadoPuestoTrabajo() {
  var dat = JSON.stringify({
    proceso: 4,
    servicio: 1,
  });
  $("#listapuestotrabajo tbody").empty();

  $.ajax({
    data: dat,
    url: g_url + "apicalendar/api/listas.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) {
      if (r.success == true) {
        let _datares = r.dataResult;       
        _datares.forEach((elemento) => {
          option = document.createElement("option");
          option.value =elemento.descripcion ;                 
          listapuestotrabajo.append(option);  
        });
      } else {
        alert("Ocurrio un error en el servidor .." + r.mensaje);
      }
    },
    error: function () {
      alert("Ocurrio un error en el servidor ..listadoServicio");
    },
  });
}


listadoGrupoRiesgo();
listadoServicio();
//listadoArea();
listadoPuestoTrabajo();

$("#btnlogin").click(function () {
  goin();
});

var g_idtransaccion = localStorage.idtransaccion;
if (!(g_idtransaccion == undefined || g_idtransaccion == 0)) {
  document.location.href = localStorage.url + "calendar/pages/principal.php";
}
else {
  localStorage.idtransaccion = 0;
  localStorage.url = _doma;
}
function goin() {
  ///para sacar cuantos se atendieron y los rechazados
  var dat = JSON.stringify({
    email: $("#txtdni").val(),
    password: $("#txtclave").val(),
  });
  $.ajax({
    data: dat,
    url: localStorage.url + "apicalendar/api/login.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    processData: false,
    success: function (r) {
      if (r.success == true) {
        localStorage.idtransaccion = r.idtransaccion;
        localStorage.nombres = r.nombres;
        localStorage.avatar = r.avatar;
        document.location.href =
          localStorage.url + "calendar/pages/principal.php";
      } else {
        alert("Datos Incorrectossss" + r.mensaje);
      }
    },
    error: function () {
      alert("Ocurrio un error en el servidor ..");
    },
  });
}
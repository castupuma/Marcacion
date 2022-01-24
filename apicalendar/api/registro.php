<?php

header("Content-Type: application/json; charset=utf-8");
//header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);


include_once '../util/funciones.php';

$data = json_decode(file_get_contents('php://input'), true);

$response = [];
$response['success'] = false;
$response['mensaje'] = 'Parámetros inválidos';

if (is_array($data)) {

    require_once '../dao/registroDAO.php';
    $RegistroDAO = new RegistroDAO();

    $tipoproceso = $data['proceso'];
    $dniusuario = $data['cip']; //persona programada
    $periodo = $data['periodo'];
    $mes = $data['mes'];
    $dia = $data['dia'];
    $turno = $data['turno'];
    $hora = $data['hora'];
    $area = $data['area'];
    $modalidad = $data['modalidad'];
    $dniusuarioAuto = $data['cipAut']; //persona que autoriza
    $rol = $data['rol'];
    $actividad = $data['actividades'];



    // 0 = proceso de registro
    // 1 = proceso de registro por administrador

       switch ($tipoproceso) {
        case 0:
            $respuestaregisto = $RegistroDAO->registrarHorario($dniusuario, $periodo, $mes, $dia, $turno, $hora, $servicio);
            $response['success'] = true;
            $response['codigo'] =  $respuestaregisto[0]['codigo'];
            $response['mensaje'] = $respuestaregisto[0]['mensaje'];
            break;
        case 1:
            $respuestaregisto = $RegistroDAO->registrarHorarioAdmin($dniusuario, $periodo, $mes, $dia, $turno, $hora, $area, $modalidad, $dniusuarioAuto);
            $response['success'] = true;
            $response['codigo'] =  $respuestaregisto[0]['codigo'];
            $response['mensaje'] = $respuestaregisto[0]['mensaje'];
            break;
        case 2:

            $respuestaregisto = $RegistroDAO->registrarActividades($rol, $actividad);
            $response['success'] = true;
            $response['mensaje'] = "Actividad Registrada Correctamente";
            break;


            // case 2:
            //     echo "i es igual a 2";
            //     break;
    }



    // if ($tipoproceso == 0) {

    //     $respuestaregisto= $RegistroDAO->registrarHorario($dniusuario, $periodo, $mes, $dia, $turno, $hora, $servicio);
    //     $tokenSesion = generateRandomString(40);

    //     $response['success'] = true;
    //     $response['codigo'] =  $respuestaregisto[0]['codigo'];
    //     $response['mensaje'] = $respuestaregisto[0]['mensaje'];
    //     // $response['tokenSesion'] = $respuestaregisto[0]['codusuario'];
    // } else {
    //     $response['mensaje'] = 'El email ya está siendo utilizado por otra persona.';
    // }
}

echo json_encode($response);

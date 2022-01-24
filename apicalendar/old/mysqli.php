<?php

header("Content-Type: application/json; charset=utf-8");
include_once '../util/funciones.php';

$data = json_decode(file_get_contents('php://input'), true);

$response = [];
$response['success'] = false;
$response['mensaje'] = 'Parámetros inválidos';

if (is_array($data)) {

    //require_once '../dao/mysqliDAO.php';
    require_once '../dao/mysqliDAO.php';
    $horarioDAO = new HorarioDAO();

    $tipoproceso = $data['proceso'];
    $periodo = $data['periodo'];
    $mes = $data['mes'];
    $dia = $data['dia'];
    $turno = $data['turno'];
    $servicio = $data['servicio'];

    // 1 = proceso de ListaTurnos
    // 9 = proceso de listaProgramadosGlobal


    switch ($tipoproceso) {
        case 1:
            $respuestaregisto = $horarioDAO->ListaTurnos();
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;
            break;
        case 2:
            $respuestaregisto = $horarioDAO->listaProgramadosGlobal($periodo, $mes, $servicio);
            // $servicio = tipo servicio
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;
            break;
        case 3:
            $respuestaregisto = $horarioDAO->ListaAsistencia($periodo, $mes, $dia);
            // $servicio = tipo servicio
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;
            break;
    }
}

echo json_encode($response);

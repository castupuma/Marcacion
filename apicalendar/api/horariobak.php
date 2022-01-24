<?php

header("Content-Type: application/json; charset=utf-8");
include_once '../util/funciones.php';

$data = json_decode(file_get_contents('php://input'), true);

$response = [];
$response['success'] = false;
$response['mensaje'] = 'Parámetros inválidos';

if (is_array($data)) {

    require_once '../dao/horarioDAO.php';
    $horarioDAO = new HorarioDAO();

    $tipoproceso = $data['proceso'];
    $periodo = $data['periodo'];
    $mes = $data['mes'];
    $dia = $data['dia'];
    $turno = $data['turno'];
    $servicio = $data['servicio'];
    $persona = $data['persona'];


    // 1 = proceso de ListaTurnos
    // 2 = proceso de ListaHoraIngreso
    // 3 = proceso de ListaServicios
    // 4 = proceso de listaProgramadosDiaServicio
    // 5 = proceso de listaProgramadosDia
    // 6 = proceso de listaProgramadosServicio
    // 7 = proceso de listaProgramado
    // 8 = proceso de listaProgramadoHoras
    // administrador
    // 9 = proceso de listaProgramadosGlobal


    switch ($tipoproceso) {
        case 1:
            $respuestaregisto = $horarioDAO->ListaTurnos();
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;
            break;
        case 2:
            $respuestaregisto = $horarioDAO->ListaHoraIngreso($turno);
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;
            break;
        case 3:
            $respuestaregisto = $horarioDAO->ListaServicios();
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;
            break;
        case 4:
            $respuestaregisto = $horarioDAO->listaProgramadosDiaServicio($periodo, $mes, $dia, $servicio);
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;
            break;
        case 5:
            $respuestaregisto = $horarioDAO->listaProgramadosDia($periodo, $mes, $dia, $servicio);
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;
            break;
        case 6:
            $respuestaregisto = $horarioDAO->listaProgramadosServicio($periodo, $mes, $servicio);
            // $servicio = idusuario
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;
            break;
        case 7:
            $respuestaregisto = $horarioDAO->listaProgramado($periodo, $mes, $servicio);
            // $servicio = idusuario
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;
            break;
        case 8:
            $respuestaregisto = $horarioDAO->listaProgramadoHoras($periodo, $mes, $servicio);
            // $servicio = idusuario
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;
            break;
        case 9:
            $respuestaregisto = $horarioDAO->listaProgramadosGlobal($periodo, $mes, $servicio);
            // $servicio = tipo servicio
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;
            break;
        case 10:
            $respuestaregisto = $horarioDAO->listaPersonal($periodo, $mes, $servicio);
            // $servicio = tipo servicio
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;
            break;
        case 11:
            $respuestaregisto = $horarioDAO->ListaAsistencia($periodo, $mes, $dia);
            // $servicio = tipo servicio
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;
            break;
        case 12:
            $respuestaregisto = $horarioDAO->eliminarturnoPersonal($dia, $servicio);
            // $servicio = tipo servicio
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;
            break;
        case 13:
            $respuestaregisto = $horarioDAO->eliminarturnoAdmin($dia, $servicio);
            // $servicio = tipo servicio
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;
            break;
        case 14:
            $respuestaregisto = $horarioDAO->listarArea($servicio);
            // $servicio = tipo servicio
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;
            break;
        case 15:
            $respuestaregisto = $horarioDAO->listarModalidad();
            // $servicio = tipo servicio
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;
            break;
        case 16:
            $respuestaregisto = $horarioDAO->listarServicio($persona);
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;
            break;
    }
}

echo json_encode($response);

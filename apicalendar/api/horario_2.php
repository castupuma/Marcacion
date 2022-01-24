<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With');
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
      
         case 16:
            $respuestaregisto = $horarioDAO->listarServicio($persona);
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;
            break;
    }
}

echo json_encode($response);

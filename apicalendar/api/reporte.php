<?php

header("Content-Type: application/json; charset=utf-8");
include_once '../util/funciones.php';

$data = json_decode(file_get_contents('php://input'), true);

$response = [];
$response['success'] = false;
$response['mensaje'] = 'Parámetros inválidos';

if (is_array($data)) {

    require_once '../dao/reporteDAO.php';
    $reporteDAO = new reporteDAO();

    $tipoproceso = $data['proceso'];

    $param1 = $data['p1'];
    $param2 = $data['p2'];
    $param3 = $data['p3'];
    $param4 = $data['p4'];
    $param5 = $data['p5'];

    switch ($tipoproceso) {
        case 1:
            $respuestaregisto = $reporteDAO->obtenerReporte();
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;
            break;
        case 2:
            $respuestaregisto = $reporteDAO->consultaReporte($param1, $param2, $param3,$param5);
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;
            break;
        case 3:
            $respuestaregisto = $reporteDAO->obtenerReporteActividad();
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;
            break;
        case 4:
            $respuestaregisto = $reporteDAO->consultaReporteActividad($param1, $param2, $param3, $param4,$param5);
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;
            break;
    }
}

echo json_encode($response);

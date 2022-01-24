<?php

header("Content-Type: application/json; charset=utf-8");
include_once '../util/funciones.php';

$data = json_decode(file_get_contents('php://input'), true);

$response = [];
$response['success'] = false;
$response['mensaje'] = 'Parámetros inválidos';

if (is_array($data)) {

    require_once '../dao/grupoRiesgoDAO.php';
    $grupoRiesgoDAO = new grupoRiesgoDAO();


    $tipoproceso = $data['proceso'];
    $param1 = $data['p1']; //filtro de busqueda
    $param2 = $data['p2']; //id 
    $param3 = $data['p3']; //descripcion
    $param4 = $data['p4']; //estado
    $param5 = $data['p5'];


    switch ($tipoproceso) {
        case 1:
            $respuestaregisto = $grupoRiesgoDAO->obtenerGrupoRiesgo();
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;
            break;
        case 2:
            $respuestaregisto = $grupoRiesgoDAO->obtenerGrupoRiesgoId($param1);
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;
            break;
        case 3:
            $respuestaregisto = $grupoRiesgoDAO->registrarGrupoRiesgo($param1, $param2, $param3);
            $response['success'] = true;
            $response['codigo'] =  $respuestaregisto[0]['codigo'];
            $response['mensaje'] = $respuestaregisto[0]['mensaje'];
            break;
    }
}

echo json_encode($response);

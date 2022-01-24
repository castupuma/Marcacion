<?php

header("Content-Type: application/json; charset=utf-8");
include_once '../util/funciones.php';

$data = json_decode(file_get_contents('php://input'), true);

$response = [];
$response['success'] = false;
$response['mensaje'] = 'Parámetros inválidos';

if (is_array($data)) {

    require_once '../dao/validacionesDAO.php';
    $validacionesDAO = new validacionDAO();

    $tipoproceso = $data['proceso'];
    $param1 = $data['p1'];



    switch ($tipoproceso) {
        case 1:
            $respuestaregisto = $validacionesDAO->Asignarestadodeconformidad($param1,1);
            $response['success'] = true;
            $response['mensaje'] = 'Registro de Conformida registrado Correctamente';
            $response['dataResult'] = $respuestaregisto;
            break;
        case 2:
            $respuestaregisto = $validacionesDAO->Asignarestadodeconformidad($param1,2);
            $response['success'] = true;
            $response['mensaje'] = 'Registro de Inconformida registrado Correctamente';
            $response['dataResult'] = $respuestaregisto;
            break;
        case 3:
            $respuestaregisto = $validacionesDAO->AsignarestadodeconformidadEmpleado($param1,1);
            $response['success'] = true;
            $response['mensaje'] = 'Registro de Trabajo Terminado Conforme';
            $response['dataResult'] = $respuestaregisto;
            break;
        case 4:
            $respuestaregisto = $validacionesDAO->AsignarestadodeconformidadEmpleado($param1,2);
            $response['success'] = true;
            $response['mensaje'] = 'Registro de Trabajo Imcompleto Conforme';
            $response['dataResult'] = $respuestaregisto;
            break;
    }
}

echo json_encode($response);

<?php

header("Content-Type: application/json; charset=utf-8");
include_once '../util/funciones.php';

$data = json_decode(file_get_contents('php://input'), true);

$response = [];
$response['success'] = false;
$response['mensaje'] = 'Parámetros inválidos';

if (is_array($data)) {

    require_once '../dao/actividadesDAO.php';
    $actividadesDAO = new actividadesDAO();
  

    $tipoproceso = $data['proceso'];
    $param1 = $data['p1']; //filtro de busqueda
    $param2 = $data['p2']; //id 
    $param3 = $data['p3']; //descripcion
    $param4 = $data['p4']; //estado
    $param5 = $data['p5'];

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
            $respuestaregisto = $actividadesDAO->obtenerActividades();
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;   
            break;
        case 2:
            $respuestaregisto = $actividadesDAO->obtenerActividadesId($param1);
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;   
            break;
        case 3:
            $respuestaregisto = $actividadesDAO->registrarActividades($param1,$param2,$param3,$param4);
            $response['success'] = true;
            $response['codigo'] =  $respuestaregisto[0]['codigo'];
            $response['mensaje'] = $respuestaregisto[0]['mensaje'];
            break;
          }
}

echo json_encode($response);



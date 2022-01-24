<?php

header("Content-Type: application/json; charset=utf-8");
include_once '../util/funciones.php';

$data = json_decode(file_get_contents('php://input'), true);

$response = [];
$response['success'] = false;
$response['mensaje'] = 'Parámetros inválidos';

if (is_array($data)) {

    require_once '../dao/listasDAO.php';
    $listasDAO = new listasDAO();

    $tipoproceso = $data['proceso'];
    $param1 = $data['p1'];
    $param2 = $data['p2'];
    $param3 = $data['p3'];
    $param4 = $data['p4'];
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
            $respuestaregisto = $listasDAO->ListaDepartamentos();
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;
            break;
        case 2:
            $respuestaregisto = $listasDAO->ListaServiciosDpto($param1); //  p1 = id departamento
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;
            break;
        case 3:
            $respuestaregisto = $listasDAO->ListaPlanilla($param2); // p2= id servicio 
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;
            break;   
        case 4:
            $respuestaregisto = $listasDAO->ListaPlanillaN($param2,$param3,$param4); // p1= id servicio , p2 = anio , p3 = mes
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;
            break;   
        case 5:
            $respuestaregisto = $listasDAO->ListadoServicio();
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;
            break;
        case 6:
            $respuestaregisto = $listasDAO->ListaAreaServicio($param1); //  p1 = id servicio
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;
            break;
        case 7:
            $respuestaregisto = $listasDAO->ListaGrupoRiesgo(); 
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;
            break;
        case 8:
            $respuestaregisto = $listasDAO->ListaPuestoTrabajo();
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;
            break;  
        case 9:
            $respuestaregisto = $listasDAO->ListaActividad($param1);
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;
            break; 
         case 10:
            $respuestaregisto = $listasDAO->listaPersonalActividad($param1);
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;
            break;
         case 11:
            $respuestaregisto = $listasDAO->ListaPerfil();
            $response['success'] = true;
            $response['mensaje'] = 'Consulta Exitosa';
            $response['dataResult'] = $respuestaregisto;
            break; 

    }
}

echo json_encode($response);

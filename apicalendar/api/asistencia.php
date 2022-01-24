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

    $usuario = $data['p1'];
    $hora = $data['hora'];
    $fecha = $data['fecha'];
    $foto = $data['p2'];
    $ip = get_client_ip();

    $respuestaregisto = $horarioDAO->insertarasistencia($usuario, $hora, $fecha, $foto, $ip);
    $response['success'] = true;
    $response['mensaje'] = 'Consulta Exitosa';
    $response['dataResult'] = $respuestaregisto;
}

echo json_encode($response);

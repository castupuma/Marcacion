<?php

header('Access-Control-Allow-Origin: *');
//header('Access-Control-Allow-Origin', 'http://localhost/calendar/');
//aquí agregamos solo los metodos que necesitemos
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

header("Content-Type: application/json; charset=utf-8");
include_once '../util/funciones.php';

$data = json_decode(file_get_contents('php://input'), true);

$response = [];
$response['success'] = false;
$response['mensaje'] = 'Parámetros inválidos';
//$response['ubicac'] = gethostname();

if (is_array($data)) {

    require_once '../dao/seguridaDAO.php';
    $seguridaDAO = new seguridaDAO();
    $response['ip'] = $seguridaDAO->get_client_ip();
    $response['ubicac'] = gethostname();
    $email = $data['email'];
    $password = $data['password'];


    $Usuario = $seguridaDAO->buscarUsuarioPorEmail($email);
    if ($Usuario) {

        if ($Usuario[0]['clave'] === $password) {
            $tokenSesion = generateRandomString(40);
          //  $seguridaDAO->registrarSESSION($Usuario[0]['idusuario'], $response['ip'], $response['ubicac']);
            $response['success'] = true;
            $response['idtransaccion'] = $Usuario[0]['idusuario'];
            $response['nombres'] = $Usuario[0]['nombreusuario'];
            $response['avatar'] =  $Usuario[0]['avatar'];
            $response['tokenSesion'] = $tokenSesion;
            $response['mensaje'] = 'Bienvenid@ de nuevo';
        } else {
            $response['mensaje'] = 'El password ingresado es inválido';
        }
    } else {
        $response['mensaje'] = 'El email ingresado no se encuentra registrado.';
    }
}

echo json_encode($response);

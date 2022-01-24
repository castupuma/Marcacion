<?php

header("Content-Type: application/json; charset=utf-8");
$data = json_decode(file_get_contents('php://input'), true);

$response = [];
$response['success'] = false;
$response['mensaje'] = 'Parámetros inválidos';


  if (is_array($data)) {
        require_once '../dao/personalDAO.php';
        $personalDAO = new personalDAO();
 
        $puestotrabajo = $data['puestotrabajo'];

        $response['success'] = false;
        $response['mensaje'] = 'Error en el json';

        $respuestaregisto = $personalDAO->obtenerpt($puestotrabajo);
        $response['success'] = true;
        $response['mensaje'] = 'Consulta Exitosa';
        $response['dataResult'] = $respuestaregisto;   
    
    }
    
echo json_encode($response);

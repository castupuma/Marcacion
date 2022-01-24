<?php

header("Content-Type: application/json; charset=utf-8");

include_once '../util/funciones.php';
$data = json_decode(file_get_contents('php://input'), true);

$response = [];
$response['success'] = false;
$response['mensaje'] = 'Parámetros inválidos';


  if (is_array($data)) {
        require_once '../dao/planillaDAO.php';
        $planillaDAO = new planillaDAO();
        if($data['id']==""){
          $id =0 ;
        }else {
          $id = $data['id'];
        };       
        $idpersona = $data['ip'];
        $idgruporiesgo = $data['igr']; 
        $idservicio = $data['is'];
        $idareaprestservicio = $data['iap'];
        $idpuestotrabajo = $data['ipt'];
        $observacion = $data['ob'];
        $fechainicio = $data['fi'];
        $fechafin = $data['ff'];
        $estado = $data['es'];
        

        $respuestaregisto = $planillaDAO->registrarPlanilla($id,$idpersona, $idgruporiesgo, $idservicio, $idareaprestservicio, $idpuestotrabajo, $observacion, $fechainicio, $fechafin,$estado);
        $response['success'] = true;
        $response['codigo'] =  $respuestaregisto[0]['codigo'];
        $response['mensaje'] = $respuestaregisto[0]['mensaje'];
    
    }
    

echo json_encode($response);

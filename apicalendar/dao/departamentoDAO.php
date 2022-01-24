<?php

require_once '../database/database.php';

class departamentoDAO
{

    public function obtenerDepartamento()
    {
        try {

            $database = new ConexionBD();

            $sql = "SELECT idundorganizacional as id , descripcion,tipo,estado ,CASE WHEN p.tipo=0 THEN 'UNIDAD ORGANICA' ELSE 'UNIDAD FUNCIONAL' END as tipo, CASE WHEN p.estado=0 THEN 'ACTIVO' ELSE 'INACTIVO' END as estado FROM p_unidadorganizacional p
                order by 1 asc;";

            // $filtro = "%".$filtro."%";   
            $database->query($sql);
            //$database->bind(':filtro',$filtro);
            $database->execute();

            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function obtenerDepartamentoId($idundorganizacional)
    {
        try {

            $database = new ConexionBD();

            $sql = "SELECT idundorganizacional as id ,descripcion,tipo, estado FROM p_unidadorganizacional p
            where idundorganizacional = :idundorganizacional 
            limit 1;";

            $database->query($sql);
            $database->bind(':idundorganizacional', $idundorganizacional);
            $database->execute();

            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function registrarDepartamento($idundorganizacional, $descripcion, $tipo, $estado)
    {
        try {
            $database = new ConexionBD();

            if ($idundorganizacional == '') {
                $idundorganizacional = 0;
            }

            $sql = "CALL p_spRegistrarDepartamento($idundorganizacional,'$descripcion',$tipo,$estado)";

            return  $database->queryStoredProcedures($sql);
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}

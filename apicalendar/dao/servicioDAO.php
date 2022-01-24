<?php

require_once '../database/database.php';

class servicioDAO
{

    public function obtenerServicio()
    {
        try {

            $database = new ConexionBD();
            
                $sql = "SELECT pa.idservicio as id, pa.descripcion as descripcion, p.idundorganizacional as iddpto, p.descripcion as Dpto, pa.estado as estado, CASE WHEN pa.estado=0 THEN 'ACTIVO' ELSE 'INACTIVO' END as estado
                FROM p_servicio pa
                left join p_unidadorganizacional p on p.idundorganizacional=pa.idundorganizacional
                order by 1 desc";
            
            
            // $filtro = "%".$filtro."%";   
            $database->query($sql);
            // $database->bind(':filtro',$filtro);
            $database->execute();

            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function obtenerServicioId($idservicio)
    {
        try {

            $database = new ConexionBD();

            $sql = "SELECT pa.idservicio as id ,pa.descripcion, p.idundorganizacional as iddpto, pa.estado FROM p_servicio pa
            left join p_unidadorganizacional p on p.idundorganizacional=pa.idundorganizacional
            where idservicio = :idservicio
            limit 1;";

            $database->query($sql);
            $database->bind(':idservicio', $idservicio);
            $database->execute();

            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }



    public function registrarServicio($idservicio, $idundorganizacional, $descripcion, $estado)
    {
        try {
            $database = new ConexionBD();

            if ($idservicio == '') {
                $idservicio = 0;
            }

            $sql = "CALL p_spRegistrarServicio($idservicio,$idundorganizacional,'$descripcion',$estado)";

            return  $database->queryStoredProcedures($sql);
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}

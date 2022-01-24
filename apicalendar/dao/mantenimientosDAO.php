<?php

require_once '../database/database.php';

class mantenimientosDAO
{

    public function obtenerPuestoTrabajo()
    {
        try {

            $database = new ConexionBD();

            $sql = "SELECT idpuesto as id , descripcion,estado ,CASE WHEN p.estado=0 THEN 'ACTIVO' ELSE 'INACTIVO' END as estado FROM p_puestotrabajo p
                order by 1 desc ;";

           

            // $filtro = "%".$filtro."%";   
            $database->query($sql);
            //$database->bind(':filtro',$filtro);
            $database->execute();

            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function obtenerPuestoTrabajoid($idpuesto)
    {
        try {

            $database = new ConexionBD();

            $sql = "SELECT idpuesto as id ,descripcion, estado FROM p_puestotrabajo p
            where idpuesto = :idpuesto 
            limit 1;";

            $database->query($sql);
            $database->bind(':idpuesto', $idpuesto);
            $database->execute();

            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function registrarPuesto($idpuesto, $descripcion, $estado)
    {
        try {
            $database = new ConexionBD();

            if ($idpuesto == '') {
                $idpuesto = 0;
            }

            $sql = "CALL p_spRegistrarPuestoTrabajo($idpuesto,'$descripcion',$estado)";

            return  $database->queryStoredProcedures($sql);
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}

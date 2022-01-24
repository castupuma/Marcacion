<?php

require_once '../database/database.php';

class actividadesDAO
{

    public function obtenerActividades()
    {
        try {

            $database = new ConexionBD();
            
                $sql = "SELECT pa.idactividades as id, pa.descripcion as descripcion, ser.idservicio as idservicio, ser.descripcion as servicio, pa.estado as estado, CASE WHEN pa.estado=0 THEN 'ACTIVO' ELSE 'INACTIVO' END as estado
                FROM p_actividades pa
                left join p_servicio ser on ser.idservicio=pa.idservicio
                order by 1 desc;";
            
            // $filtro = "%".$filtro."%";   
            $database->query($sql);
            // $database->bind(':filtro',$filtro);
            $database->execute();

            return $database->resultSet();

        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function obtenerActividadesId($idactividades)
    {
        try {

            $database = new ConexionBD();

            $sql = "SELECT pa.idactividades as id ,pa.descripcion, ser.idservicio as servicio, pa.estado FROM p_actividades pa
            left join p_servicio ser on ser.idservicio=pa.idservicio
            where idactividades = :idactividades
            limit 1;";

            $database->query($sql);
            $database->bind(':idactividades', $idactividades);
            $database->execute();

            return $database->resultSet();

        } catch (Exception $ex) {
            throw $ex;
        }
    }
  
    public function registrarActividades($idactividades,$idservicio,$descripcion,$estado)
    {
        try {
            $database = new ConexionBD();
            
            if ($idactividades==''){
                $idactividades =0;
            }
           
            $sql = "CALL p_spRegistrarActividades($idactividades,$idservicio,'$descripcion',$estado)";
           
            return  $database->queryStoredProcedures($sql);
        } catch (Exception $ex) {          
            throw $ex;
        }
    }



}
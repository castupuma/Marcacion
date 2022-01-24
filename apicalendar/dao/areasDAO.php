<?php

require_once '../database/database.php';

class areasDAO
{

    public function obtenerArea()
    {
        try {

            $database = new ConexionBD();
            
                $sql = "SELECT pa.idarea as id, pa.descripcion as descripcion, p.idservicio as idservicio, p.descripcion as servicio, pa.estado as estado, CASE WHEN pa.estado=0 THEN 'ACTIVO' ELSE 'INACTIVO' END as estado
                FROM p_area pa
                left join p_servicio p on p.idservicio=pa.idservicio
                order by 1 desc ;";
               
              //  $filtro = "%".$filtro."%";   
                
           
            // $filtro = "%".$filtro."%";   
            $database->query($sql);
            // $database->bind(':filtro',$filtro);
            $database->execute();

            return $database->resultSet();

        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function obtenerAreaId($idarea)
    {
        try {

            $database = new ConexionBD();

            $sql = "SELECT pa.idarea as id ,pa.descripcion, p.idservicio as idservicio, pa.estado FROM p_area pa
            left join p_servicio p on p.idservicio=pa.idservicio
            where idarea = :idarea
            limit 1;";

            $database->query($sql);
            $database->bind(':idarea', $idarea);
            $database->execute();

            return $database->resultSet();

        } catch (Exception $ex) {
            throw $ex;
        }
    }
  
    public function registrarArea($idarea,$idservicio,$descripcion,$estado)
    {
        try {
            $database = new ConexionBD();
            
            if ($idarea==''){
                $idarea =0;
            }
           
            $sql = "CALL p_spRegistrarArea($idarea,$idservicio,'$descripcion',$estado)";
           
            return  $database->queryStoredProcedures($sql);
        } catch (Exception $ex) {          
            throw $ex;
        }
    }



}
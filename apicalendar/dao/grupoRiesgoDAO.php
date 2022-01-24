<?php

require_once '../database/database.php';

class grupoRiesgoDAO
{

    public function obtenerGrupoRiesgo()
    {
        try {

            $database = new ConexionBD();

            $sql = "SELECT idgruporiesgo as id , descripcion,estado ,CASE WHEN p.estado=0 THEN 'ACTIVO' ELSE 'INACTIVO' END as estado FROM p_gruporiesgo p
                order by 1 desc limit 10;";

            // $filtro = "%".$filtro."%";   
            $database->query($sql);
            // $database->bind(':filtro',$filtro);
            $database->execute();

            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function obtenerGrupoRiesgoId($idgruporiesgo)
    {
        try {

            $database = new ConexionBD();

            $sql = "SELECT idgruporiesgo as id ,descripcion, estado FROM p_gruporiesgo p
            where idgruporiesgo = :idgruporiesgo
            limit 1;";

            $database->query($sql);
            $database->bind(':idgruporiesgo', $idgruporiesgo);
            $database->execute();

            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    // public function registrarPuestoTrabajo($id,$descripcion, $estado)
    // {
    //     try {
    //         $database = new ConexionBD();

    //         $sql = "INSERT INTO p_gruporiesgo  (idgruporiesgo,idtipogruporiesgo,descripcion,estado )
    //         VALUES(:idgruporiesgo,:idtipogruporiesgo,:descripcion, :estado);";

    //         $database->query($sql);
    //         $database->bind(':descripcion', $descripcion);
    //         $database->bind(':idgruporiesgo', null);

    //         $database->bind(':estado', $estado);
    //         $database->bind(':idtipogruporiesgo', '3');

    //         $database->execute();

    //         return $database->lastInsertId();

    //     } catch (Exception $ex) {          
    //         throw $ex;
    //     }
    // }

    public function registrarGrupoRiesgo($idgruporiesgo, $descripcion, $estado)
    {
        try {
            $database = new ConexionBD();

            if ($idgruporiesgo == '') {
                $idgruporiesgo = 0;
            }

            $sql = "CALL p_spRegistrarGrupoRiesgo($idgruporiesgo,'$descripcion',$estado)";

            return  $database->queryStoredProcedures($sql);
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}

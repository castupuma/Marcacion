<?php

require_once '../database/database.php';

class personalDAO
{

    public function obtenerPersonal()
    {
        try {

            $database = new ConexionBD();

            $sql = "SELECT p.idpersona,p.idplaza,p.nombrecompleto,COALESCE(UPPER(g.descripcion),' ')as gruporiesgo,CASE WHEN p.estado=0 THEN 'ACTIVO' ELSE 'INACTIVO' END as estado
            FROM p_personal p
            LEFT JOIN p_planilla pa ON pa.idpersona = p.idpersona and pa.estado=0
            LEFT JOIN p_gruporiesgo g ON g.idgruporiesgo = pa.idgruporiesgo
            order by 1 asc;";

            $database->query($sql);
            $database->execute();

            return $database->resultSet();

        } catch (Exception $ex) {
            throw $ex;
        }
    }

    //  public function obtenerPersonal2()
    // {
    //     try {

    //         $database = new ConexionBD();

    //         $sql = "SELECT p.idpersona,p.idplaza,p.nombrecompleto,COALESCE(UPPER(g.descripcion),' ')as gruporiesgo
    //         FROM p_personal p
    //         LEFT JOIN p_planilla pa ON pa.idpersona = p.idpersona and pa.estado=0
    //         LEFT JOIN p_gruporiesgo g ON g.idgruporiesgo = pa.idgruporiesgo
    //         WHERE G.descripcion IS NULL
    //         order by 1 desc";

    //         $database->query($sql);
    //         $database->execute();

    //         return $database->resultSet();

    //     } catch (Exception $ex) {
    //         throw $ex;
    //     }
    // }
    
    public function obtenerPersonalId($idpersonal)
    {
        try {

            $database = new ConexionBD();

            $sql = "SELECT p.idpersona,p.idplaza,p.tipoplaza,p.apellidopaterno,p.apellidomaterno,p.primernombre,p.segundonombre,
            p.tipodocumento,p.nrodocumento,cast(fechanacimiento as date)as fechanacimiento,p.idsexo,p.idestadocivil,p.ruc,p.direccion,CASE WHEN p.estado=0 THEN 'ACTIVO' ELSE 'INACTIVO' END as estado
            FROM p_personal p
            WHERE p.idplaza=:idpersonal";

            $database->query($sql);
            $database->bind(':idpersonal', $idpersonal);
            $database->execute();

            return $database->resultSet();

        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function obteneridplaza($nombrepersonal)
    {
        try {
            $database = new ConexionBD();

            $sql = "SELECT idpersona as idplaza FROM p_personal p
            where nombrecompleto =:nombrecompleto LIMIT 1 ;";

            $database->query($sql);
            $database->bind(':nombrecompleto', $nombrepersonal);
            $database->execute();

            return $database->resultSet();

        } catch (Exception $ex) {          
            throw $ex;
        }
    }
    public function obteneridgr($gruporiesgo)
    {
        try {
            $database = new ConexionBD();

            $sql = "SELECT idgruporiesgo as idgr ,descripcion as descricion 
            FROM p_gruporiesgo p where estado = 0 and descripcion = :gruporiesgo LIMIT 1 ;";

            $database->query($sql);
            $database->bind(':gruporiesgo', $gruporiesgo);
            $database->execute();

            return $database->resultSet();

        } catch (Exception $ex) {          
            throw $ex;
        }
    }

    public function obtenerservicio($servicio)
    {
        try {
            $database = new ConexionBD();

            $sql = "SELECT idservicio as id, descripcion  FROM p_servicio p
            where estado = 0 and descripcion = :servicio LIMIT 1 ;";

            $database->query($sql);
            $database->bind(':servicio', $servicio);
            $database->execute();

            return $database->resultSet();

        } catch (Exception $ex) {          
            throw $ex;
        }
    }
    public function obtenerarea($area)
    {
        try {
            $database = new ConexionBD();

            $sql = "SELECT idarea as id , descripcion FROM p_area
             where estado = 0 and descripcion = :area LIMIT 1 ;";

            $database->query($sql);
            $database->bind(':area', $area);
            $database->execute();

            return $database->resultSet();

        } catch (Exception $ex) {          
            throw $ex;
        }
    }

    public function obtenerpt($puestotrabajo){
        try {
            $database = new ConexionBD();

            $sql = "SELECT idpuesto as id , descripcion FROM p_puestotrabajo p
             where estado = 0 and descripcion = :puestotrabajo LIMIT 1 ;";

            $database->query($sql);
            $database->bind(':puestotrabajo', $puestotrabajo);
            $database->execute();

            return $database->resultSet();

        } catch (Exception $ex) {          
            throw $ex;
        }
    } 

    public function registrarPersonal($idplaza, $tipoplaza, $apellidopaterno, $apellidomaterno, $primernombre, $segundonombre, $nombrecompleto, $tipodocumento, $nrodocumento, $fechanacimiento, $idsexo, $idestadocivil, $direccion, $ruc)
    {
        try {

            $database = new ConexionBD();
            $sql = "CALL p_spRegistrarPersonal($idplaza, $tipoplaza, '$apellidopaterno', '$apellidomaterno', '$primernombre', '$segundonombre','$nombrecompleto', $tipodocumento, '$nrodocumento', '$fechanacimiento', $idsexo, $idestadocivil, '$direccion', '$ruc')";
            
         
            return  $database->queryStoredProcedures($sql);
        } catch (Exception $ex) {          
            throw $ex;
        }
    }
  
}
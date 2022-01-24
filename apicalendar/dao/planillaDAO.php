<?php

require_once '../database/database.php';

class planillaDAO
{
    public function obtenerPlanilla()
    {
        try {
            $database = new ConexionBD();
           
                $sql = "SELECT pa.idplanilla as idplanilla, p.idplaza as idplaza,p.nombrecompleto as nombrecompleto,s.descripcion as servicio,a.descripcion as area  , CASE WHEN pa.estado=0 THEN 'ACTIVO' ELSE 'INACTIVO' END as estado 
                FROM p_planilla pa
                left join p_personal p on p.idpersona=pa.idpersona
                left join p_servicio s on s.idservicio = pa.idservicio
                left join p_area a on a.idarea= pa.idarea 
                order by 1 desc limit 10;";
            
            //$sql_="'%"+$filtro+"%'";
            $database->query($sql);
            $database->execute();

            return $database->resultSet();

        } catch (Exception $ex) {
            throw $ex;
        }
    }
    // public function obtenerPlanilla($filtro)
    // {
    //     try {
    //         $database = new ConexionBD();
    //         if (empty($filtro)){
    //             $sql = "SELECT pa.idplanilla as idplanilla, p.idplaza as idplaza,p.nombrecompleto as nombrecompleto,s.descripcion as servicio,a.descripcion as area  , CASE WHEN pa.estado=0 THEN 'ACTIVO' ELSE 'INACTIVO' END as estado 
    //             FROM p_planilla pa
    //             left join p_personal p on p.idpersona=pa.idpersona
    //             left join p_servicio s on s.idservicio = pa.idservicio
    //             left join p_area a on a.idarea= pa.idarea 
    //             order by 1 desc limit 10;";
    //             }else{
    //             $filtro = "%".$filtro."%";   
    //             $sql = "SELECT pa.idplanilla as idplanilla, p.idplaza as idplaza,p.nombrecompleto as nombrecompleto,s.descripcion as servicio,a.descripcion as area  ,CASE WHEN pa.estado=0 THEN 'ACTIVO' ELSE 'INACTIVO' END as estado 
    //             FROM p_planilla pa
    //             left join p_personal p on p.idpersona=pa.idpersona
    //             left join p_servicio s on s.idservicio = pa.idservicio
    //             left join p_area a on a.idarea= pa.idarea 
    //             WHERE p.nombrecompleto like :filtro
    //             order by 1 desc limit 10;";
    //         }
    //         //$sql_="'%"+$filtro+"%'";
    //         $database->query($sql);
    //         $database->bind(':filtro',$filtro);
    //         $database->execute();

    //         return $database->resultSet();

    //     } catch (Exception $ex) {
    //         throw $ex;
    //     }
    // }
    public function obtenerPlanillaId($idplanilla)
    {
        try {

            $database = new ConexionBD();

            $sql = "SELECT pa.idplanilla as idplanilla, p.idplaza as idplaza,p.idpersona,p.nombrecompleto as nombrecompleto,s.idservicio ,s.descripcion as servicio,a.idarea,a.descripcion as area  , pa.estado as estado,
            gr.idgruporiesgo,gr.descripcion as gruporiesgo,pt.idpuesto,pt.descripcion as puestotrabajo,pa.observacion,cast(pa.fechainicio as date) as fechainicio,cast(pa.fechafin as date) as fechafin
                     FROM p_planilla pa
                        left join p_personal p on p.idpersona=pa.idpersona
                        left join p_gruporiesgo gr on gr.idgruporiesgo = pa.idgruporiesgo
                        left join p_puestotrabajo pt on pt.idpuesto = pa.idpuestotrabajo
                        left join p_servicio s on s.idservicio = pa.idservicio
                        left join p_area a on a.idarea= pa.idarea
                        where idplanilla = :idplanilla
                        limit 1;";

            $database->query($sql);
            $database->bind(':idplanilla', $idplanilla);
            $database->execute();

            return $database->resultSet();

        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function registrarPlanilla($id,$idpersona, $idgruporiesgo, $idservicio, $idareaprestservicio, $idpuestotrabajo, $observacion, $fechainicio, $fechafin,$estado)
    {
        try {
            $database = new ConexionBD();
            if ($idgruporiesgo==''){
                $idgruporiesgo =0;
            }

            $sql = "CALL p_spRegistrarPlanilla($id,$idpersona, $idgruporiesgo, $idservicio, $idareaprestservicio, $idpuestotrabajo,'$observacion', '$fechainicio', '$fechafin',$estado)";
            // $sql = "INSERT INTO p_planilla   (idpersona,idgruporiesgo, idservicio, idarea, idpuestotrabajo, observacion, fechainicio, fechafin )
            // VALUES(:idpersona, :idgruporiesgo, :idservicio, :idarea, :idpuestotrabajo, :observacion, :fechainicio, :fechafin);";

            // $database->query($sql);
            // $database->bind(':idpersona', $idpersona);
            // $database->bind(':idgruporiesgo', $idgruporiesgo);
            // $database->bind(':idservicio', $idservicio);
            // $database->bind(':idarea', $idareaprestservicio);
            // $database->bind(':idpuestotrabajo', $idpuestotrabajo);
            // $database->bind(':observacion', $observacion);
            // $database->bind(':fechainicio', $fechainicio);
            // $database->bind(':fechafin', $fechafin);
            // $database->execute();

            //return $database->lastInsertId();
            return  $database->queryStoredProcedures($sql);
        } catch (Exception $ex) {          
            throw $ex;
        }
    }

}
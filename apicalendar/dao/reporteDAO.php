<?php

require_once '../database/database.php';

class reporteDAO
{
    public function obtenerReporte()
    {
        try {
            $database = new ConexionBD();

            $sql = "SELECT per.nrodocumento,per.nombrecompleto as Personal ,dep.descripcion as 
                Departamento ,ser.descripcion as Servicio ,are.descripcion as Area,count(p.idturno) as CantidadHoras
                FROM p_rolprogramacion p
                INNER JOIN p_planilla pla on pla.idplanilla = p.idplanilla
                INNER JOIN p_personal per on per.idpersona = pla.idpersona
                INNER JOIN p_area are on are.idarea = p.idarea
                INNER JOIN p_servicio ser on ser.idservicio=pla.idservicio
                INNER JOIN p_unidadorganizacional dep on dep.idundorganizacional=ser.idundorganizacional
                GROUP BY per.nombrecompleto;";

            //$sql_="'%"+$filtro+"%'";
            $database->query($sql);
            $database->execute();

            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function consultaReporte($undorganizacional, $servicio, $area,$mes)
    {
        try {
            $database = new ConexionBD();

            $sql = "SELECT per.nrodocumento,per.nombrecompleto as Personal ,dep.idundorganizacional as iddpto,dep.descripcion as
                Departamento ,ser.idservicio as idservicio,ser.descripcion as Servicio ,are.idarea as idarea,are.descripcion as Area,count(p.idturno) as CantidadHoras
                FROM p_rolprogramacion p
                INNER JOIN p_planilla pla on pla.idplanilla = p.idplanilla
                INNER JOIN p_personal per on per.idpersona = pla.idpersona
                INNER JOIN p_area are on are.idarea = p.idarea
                INNER JOIN p_servicio ser on ser.idservicio=pla.idservicio
                INNER JOIN p_unidadorganizacional dep on 
                dep.idundorganizacional=ser.idundorganizacional
                WHERE dep.idundorganizacional=:undorganizacional and ser.idservicio=:servicio and are.idarea=:area and p.mes =:mes
                GROUP BY per.nrodocumento,per.nombrecompleto;";

            //$sql_="'%"+$filtro+"%'";
            $database->query($sql);
            $database->bind(':undorganizacional', $undorganizacional);
            $database->bind(':servicio', $servicio);
            $database->bind(':area', $area);
            $database->bind(':mes', $mes);
            $database->execute();

            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

     public function obtenerReporteActividad()
    {
        try {
            $database = new ConexionBD();

            $sql = "SELECT per.nrodocumento, per.nombrecompleto,puesto.descripcion as puesto, GROUP_CONCAT( act.descripcion SEPARATOR',' )as actividades, rol.dia,rol.mes,rol.idestado,rol.idrol
                    FROM p_actividad p
                    INNER JOIN p_actividades act on act.idactividades = p.id_actividades
                    INNER JOIN p_rolprogramacion rol on rol.idrol = p.idrol
                    INNER JOIN p_planilla pla on pla.idplanilla = rol.idplanilla
                    INNER JOIN p_personal per on per.idpersona = pla.idpersona
                    INNER JOIN p_area are on are.idarea = pla.idarea
                    INNER JOIN p_puestotrabajo puesto on puesto.idpuesto = pla.idpuestotrabajo
                    INNER JOIN p_servicio ser on ser.idservicio = pla.idservicio
                    INNER JOIN p_unidadorganizacional dep on dep.idundorganizacional = ser.idundorganizacional
                    ;";

            //$sql_="'%"+$filtro+"%'";
            $database->query($sql);
            $database->execute();

            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

     public function consultaReporteActividad($undorganizacional, $servicio, $area, $nombrecompleto,$mes)
    {
        try {
            $database = new ConexionBD();

            $sql = "SELECT per.nrodocumento, per.nombrecompleto,puesto.descripcion as puesto, GROUP_CONCAT( act.descripcion SEPARATOR',' )as actividades, rol.dia,rol.mes,rol.idestado1,rol.idestado,rol.idrol
                    FROM p_actividad p
                    INNER JOIN p_actividades act on act.idactividades = p.id_actividades
                    INNER JOIN p_rolprogramacion rol on rol.idrol = p.idrol
                    INNER JOIN p_planilla pla on pla.idplanilla = rol.idplanilla
                    INNER JOIN p_personal per on per.idpersona = pla.idpersona
                    INNER JOIN p_area are on are.idarea = pla.idarea
                    INNER JOIN p_puestotrabajo puesto on puesto.idpuesto = pla.idpuestotrabajo
                    INNER JOIN p_servicio ser on ser.idservicio = pla.idservicio
                    INNER JOIN p_unidadorganizacional dep on dep.idundorganizacional = ser.idundorganizacional
                    WHERE dep.idundorganizacional=:undorganizacional and ser.idservicio=:servicio and are.idarea=:area
                    and per.idpersona =:nombrecompleto and rol.mes=:mes
                    group by rol.dia";

            //$sql_="'%"+$filtro+"%'";
            $database->query($sql);
            $database->bind(':undorganizacional', $undorganizacional);
            $database->bind(':servicio', $servicio);
            $database->bind(':area', $area);
            $database->bind(':nombrecompleto', $nombrecompleto);
            $database->bind(':mes', $mes);
            $database->execute();

            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}



//sql antiguo
// SELECT per.nrodocumento, per.nombrecompleto,puesto.descripcion as puesto,act.descripcion as actividades,rol.dia,rol.mes
//                     FROM p_actividad p
//                     INNER JOIN p_actividades act on act.idactividades = p.idactividad
//                     INNER JOIN p_rolprogramacion rol on rol.idrol = p.idrol
//                     INNER JOIN p_planilla pla on pla.idplanilla = rol.idplanilla
//                     INNER JOIN p_personal per on per.idpersona = pla.idpersona
//                     INNER JOIN p_area are on are.idarea = pla.idarea
//                     INNER JOIN p_puestotrabajo puesto on puesto.idpuesto = pla.idpuestotrabajo
//                     INNER JOIN p_servicio ser on ser.idservicio = pla.idservicio
//                     INNER JOIN p_unidadorganizacional dep on dep.idundorganizacional = ser.idundorganizacional
//                     WHERE dep.idundorganizacional=:undorganizacional and ser.idservicio=:servicio and are.idarea=:area and per.idpersona =:nombrecompleto
//                     ORDER BY rol.dia;
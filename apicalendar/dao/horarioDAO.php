<?php

require_once '../database/database.php';

class HorarioDAO
{

    public function ListaTurnos()
    {
        try {
            $database = new ConexionBD();

            //$sql = "SELECT idturno as nro, nombre as descripcion FROM turnos WHERE idestado=1;";
            //$sql = "SELECT idturno as nro, idturno as descripcion ,horas,sigla,nombret FROM turnos WHERE idestado=1;";
            $sql = "SELECT idturno as nro, nombre as descripcion FROM P_turnos WHERE idestado=0;";
            $database->query($sql);
            $database->execute();
            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function ListaHoraIngreso($turno)
    {
        try {
            $database = new ConexionBD();

            $sql = "SELECT p.idhora as nro,p.nombre  as descripcion FROM P_horaingreso h inner join  P_horas p on h.idhora=p.idhora where h.idturno = :turno and h.idestado=0";
            $database->query($sql);
            $database->bind(':turno', $turno);
            $database->execute();
            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function ListaServicios()
    {
        try {
            $database = new ConexionBD();

            $sql = "SELECT idservicio as nro, nombre  as descripcion, color,  tiposervicio , background, clase FROM servicios WHERE idestado =1 ORDER BY tiposervicio ASC,idservicio ASC ;";
            $database->query($sql);
            $database->execute();
            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function listaProgramadosDiaServicio($periodo, $mes, $dia, $servicio)
    {
        try {
            $database = new ConexionBD();

            $sql = "SELECT r.idrol  as nro,e.nombrecompleto as Personal,concat_ws('->',
            (SELECT t.sigla FROM p_turnos t WHERE t.idturno=r.idturno limit 1),concat(r.nrohoras,'H')) as Horas ,
            case when r.idusuarioautoriza = 0 then 0 else 1 end as Autorizado
            FROM p_rolprogramacion r
            left join p_planilla u on u.idplanilla = r.idplanilla
            left join p_personal e on e.idpersona = u.idpersona
            WHERE r.periodo = :periodo AND r.mes = :mes AND r.dia = :dia AND r.idarea = :area ;";
            $database->query($sql);
            $database->bind(':periodo', $periodo);
            $database->bind(':mes', $mes);
            $database->bind(':dia', $dia);
            $database->bind(':area', $servicio);
            $database->execute();
            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function listaProgramadosDia($periodo, $mes, $dia, $servicio)
    {
        try {
            $database = new ConexionBD();

            $sql = "SELECT r.idrol as nro,u.nombrecompleto as Personal,concat_ws('->',
             t.sigla ,concat(r.nrohoras,'H')) as Horas ,
            s.descripcion  as area ,case when r.idusuarioautoriza = 0 then 0 else 1 end as Autorizado ,s.clase
            FROM p_rolprogramacion r
            LEFT JOIN p_planilla p on p.idplanilla =r.idplanilla
            LEFT JOIN p_personal u on u.idpersona = p.idpersona
            LEFT JOIN p_area s ON s.idarea =r.idarea
            LEFT JOIN p_turnos t ON t.idturno=r.idturno
            WHERE r.periodo = :periodo AND r.mes = :mes AND r.dia = :dia and s.idservicio = :servicio  order by s.idarea asc;";
            $database->query($sql);
            $database->bind(':periodo', $periodo);
            $database->bind(':mes', $mes);
            $database->bind(':dia', $dia);
            $database->bind(':servicio', $servicio);
            $database->execute();
            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

      public function listaActividadDia($periodo, $mes, $dia, $servicio)
    {
        try {
            $database = new ConexionBD();

            $sql = "SELECT r.idrol as nro,u.nombrecompleto as Personal,case when act.id_actividades is not null then 'REGISTRADAS' else 'NO REGISTRADAS' end as Horas ,
            s.descripcion  as area ,case when r.idusuarioautoriza = 0 then 0 else 1 end as Autorizado ,s.clase
            FROM p_rolprogramacion r
            LEFT JOIN p_planilla p on p.idplanilla =r.idplanilla
            LEFT JOIN p_personal u on u.idpersona = p.idpersona
            LEFT JOIN p_area s ON s.idarea =r.idarea
            LEFT JOIN p_turnos t ON t.idturno=r.idturno
            LEFT JOIN p_actividad act on act.idrol = r.idrol
            LEFT JOIN p_actividades ac on ac.idactividades = act.id_actividades
            WHERE r.periodo = :periodo AND r.mes = :mes AND r.dia = :dia and s.idservicio = :servicio  order by s.idarea asc limit 1;";
            $database->query($sql);
            $database->bind(':periodo', $periodo);
            $database->bind(':mes', $mes);
            $database->bind(':dia', $dia);
            $database->bind(':servicio', $servicio);
            $database->execute();
            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function listaProgramadosServicio($periodo, $mes, $idplanilla)
    {
        try {
            $database = new ConexionBD();

            $sql = "SELECT distinct r.idarea  as nro, s.descripcion  as area,s.clase FROM p_rolprogramacion r
            LEFT JOIN p_area s ON s.idarea =r.idarea and s.estado =0
            LEFT JOIN p_turnos t ON t.idturno=r.idturno
            WHERE r.periodo = :periodo AND r.mes = :mes AND r.idplanilla = :idplanilla 
            order by 1 asc;";
            $database->query($sql);
            $database->bind(':periodo', $periodo);
            $database->bind(':mes', $mes);
            $database->bind(':idplanilla', $idplanilla);
            $database->execute();
            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

          public function listarServicio($persona)
    {
        try {
            $database = new ConexionBD();

            $sql = "SELECT ser.idservicio as id ,ser.descripcion
                    FROM p_servicio ser
                    INNER JOIN p_planilla pla on pla.idservicio = ser.idservicio
                    INNER JOIN p_personal per on per.idpersona = pla.idpersona
                    where per.idpersona = :persona and ser.estado=0;";
            $database->query($sql);
            $database->bind(':persona', $persona);
            $database->execute();
            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function listaProgramado($periodo, $mes, $idusuario)
    {
        try {
            $database = new ConexionBD();

            $sql = "SELECT d.iddia as dia
            ,case when r.idtipomodalidad = 2 then 'Lic' when r.idtipomodalidad = 3 then 'Pre' when r.idtipomodalidad = 1 then 'Rem'  else '' end as turno
            ,ifnull(s.clase,'') as clase,r.idrol as rol 
            FROM p_diassemana d 
            left join p_rolprogramacion r  on d.iddia=r.dia and r.periodo = :periodo AND r.mes = :mes AND r.idplanilla = :idusuario 
            LEFT JOIN p_area s ON s.idarea =r.idarea
            order by 1 asc;";
            $database->query($sql);
            $database->bind(':periodo', $periodo);
            $database->bind(':mes', $mes);
            $database->bind(':idusuario', $idusuario);
            $database->execute();
            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function listaProgramadoHoras($periodo, $mes, $idusuario)
    {
        try {
            $database = new ConexionBD();

            $sql = "SELECT t.nombre as turno,count(*) as cantidad,sum(r.nrohoras) as Horas FROM rolprogramacion r inner join turnos t ON t.idturno=r.idturno
            where r.periodo = :periodo AND r.mes = :mes and r.idusuario= :idusuario and r.idestado=1
            group by t.nombre
            order by 3 asc;";
            $database->query($sql);
            $database->bind(':periodo', $periodo);
            $database->bind(':mes', $mes);
            $database->bind(':idusuario', $idusuario);
            $database->execute();
            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }


    //administrador
    public function listaProgramadosGlobal($periodo, $mes, $idtipoServicio)
    {
        try {
            $database = new ConexionBD();
            $sql = "CALL spListaProgramadosGlobal($periodo, $mes,$idtipoServicio);";
            return  $database->queryStoredProcedures($sql);
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function listaCalendarioGlobal($periodo, $mes, $idtipoServicio)
    {
        try {
            $database = new ConexionBD();

            $sql = "SELECT d.iddia as dia
            ,case when r.idturno=3 then '24' else '' end as turno
            ,ifnull(s.clase,'') as clase
            FROM diassemana d left join rolprogramacion r  on d.iddia=r.dia and r.periodo = :periodo AND r.mes = :mes AND r.idusuario = :idusuario and r.idestado=1
            LEFT JOIN servicios s ON s.idservicio =r.idservicio
            order by 1 asc;";
            $database->query($sql);
            $database->bind(':periodo', $periodo);
            $database->bind(':mes', $mes);
            $database->bind(':idusuario', $idtipoServicio);
            $database->execute();
            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function listaPersonal($periodo, $mes, $idarea)
    {
        try {
            $database = new ConexionBD();

            $sql = "SELECT p.idplanilla as nro,  e.nombrecompleto  as descripcion
            FROM p_personal e
            LEFT JOIN p_planilla p on p.idpersona = e.idpersona
            where p.idservicio = :idarea and e.estado=0
            order by 2 asc;";
            $database->query($sql);
            $database->bind(':idarea', $idarea);
            $database->execute();
            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

public function insertarasistenciaQR($usuario,$ip)
    {
        try {
            $database = new ConexionBD();

            // $sql = "INSERT INTO asistencia (idusuario, fecha, hora,periodo, mes, dia,ip)
            // VALUES((SELECT idusuario FROM usuario where codusuario = :codpersonal limit 1), :fecha, :hora,year(now()),month(now()),day(now()),:ip)
            // ON DUPLICATE KEY UPDATE idusuario = VALUES(idusuario);";

            /*$sql = "INSERT INTO asistencia (idusuario, fecha, hora,periodo, mes, dia,ip)
VALUES(:codpersonal, now(), DATE_FORMAT(NOW( ), '%H:%i:%S' ),year(now()),month(now()),day(now()),:ip)
ON DUPLICATE KEY UPDATE idusuario = VALUES(idusuario);";*/


$sql = "INSERT INTO asistencia (idusuario, fecha, hora,periodo, mes, dia,ip)
VALUES(:codpersonal, ADDDATE(NOW( ), INTERVAL 0 hour), DATE_FORMAT(ADDDATE(NOW( ), INTERVAL 0 hour), '%H:%i:%S' ),year(now()),month(now()),day(now()),:ip)
ON DUPLICATE KEY UPDATE idusuario = VALUES(idusuario);";

            $database->query($sql);
            $database->bind(':codpersonal', $usuario);
            // $database->bind(':fecha', $fecha);
            // $database->bind(':hora', $hora);
            $database->bind(':ip', $ip);
            //$database->bind(':foto', $foto);
            $database->execute();
            return $database->lastInsertId();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function insertarasistencia($usuario, $hora, $fecha, $foto, $ip)
    {
        try {
            $database = new ConexionBD();

            // $sql = "INSERT INTO asistencia (idusuario, fecha, hora,periodo, mes, dia,ip)
            // VALUES((SELECT idusuario FROM usuario where codusuario = :codpersonal limit 1), :fecha, :hora,year(now()),month(now()),day(now()),:ip)
            // ON DUPLICATE KEY UPDATE idusuario = VALUES(idusuario);";

            $sql = "INSERT INTO asistencia (idusuario, fecha, hora,periodo, mes, dia,ip)
VALUES(:codpersonal, :fecha, :hora,year(now()),month(now()),day(now()),:ip)
ON DUPLICATE KEY UPDATE idusuario = VALUES(idusuario);";
            $database->query($sql);
            $database->bind(':codpersonal', $usuario);
            $database->bind(':fecha', $fecha);
            $database->bind(':hora', $hora);
            $database->bind(':ip', $ip);
            //$database->bind(':foto', $foto);
            $database->execute();
            return $database->lastInsertId();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function ListaAsistencia($periodo, $mes, $dia)
    {
        try {
            $database = new ConexionBD();
            //$sql = "CALL spListaasistencia($periodo, $mes,$dia);";
              $sql = "CALL spListaasistencia(2025, $mes,$dia);";
            return  $database->queryStoredProcedures($sql);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function eliminarturnoPersonal($usuario, $idregistro)
    {
        try {
            $database = new ConexionBD();
            $sql = "CALL speliminarturnoPersonal($usuario, $idregistro)";
            return  $database->queryStoredProcedures($sql);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function eliminarturnoAdmin($usuario, $idregistro)
    {
        try {
            $database = new ConexionBD();
            $sql = "CALL speliminarturnoPersonal($usuario, $idregistro)";
            return  $database->queryStoredProcedures($sql);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function listarArea($servicio)
    {
        try {
            $database = new ConexionBD();

            $sql = "SELECT idarea as id , descripcion FROM p_area p
            where estado = 0 and idservicio = :servicio;";
            $database->query($sql);
            $database->bind(':servicio', $servicio);
            $database->execute();
            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function listarModalidad()
    {
        try {
            $database = new ConexionBD();

            $sql = "SELECT idtipomodalidad as id ,descripcion FROM p_tipomodalidadtrabajo p where estado =0;";
            $database->query($sql);
            $database->execute();
            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function Menu($usuario,$idmenu)
    {
        try {
            $database = new ConexionBD();
            $sql = "SELECT n.idmenu,n.descripcion,
            case when n.idmenu= :idmenu then etiquetaActiva else etiqueta end as etiqueta
            FROM p_usuario u inner join p_perfil p on u.idperfil=p.idperfil
            inner join p_accesosmenu a on a.idperfil=p.idperfil and a.idestado=1
            inner join p_menu n on n.idmenu=a.idmenu and n.idestado=1
            where u.idusuario=:codpersonal and u.idestado;";
            $database->query($sql);
            $database->bind(':codpersonal', $usuario);
            $database->bind(':idmenu', $idmenu);
            $database->execute();
            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }


}

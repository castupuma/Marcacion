<?php

require_once '../database/database.php';

class listasDAO
{
    public function ListaGrupoRiesgo()
    {
        try {
            $database = new ConexionBD();

             $sql = "SELECT idgruporiesgo as id,upper(descripcion) as descripcion FROM p_gruporiesgo
             WHERE estado = 0;";
            $database->query($sql);
            $database->execute();
            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function ListaServicio()
    {
        try {
            $database = new ConexionBD();

             $sql = "SELECT idservicio as id ,descripcion as descripcion FROM p_servicio 
             where estado =0;";
            $database->query($sql);
            $database->execute();
            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function ListaArea($idservicio)
    {
        try {
            $database = new ConexionBD();

             $sql = "SELECT idarea as id, descripcion as descripcion FROM p_area
             where estado =0 and idservicio = :idservicio;";
            $database->query($sql);
            $database->bind(':idservicio', $idservicio);
            $database->execute();
            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function ListaActividad($idservicio)
    {
        try {
            $database = new ConexionBD();

             $sql = "SELECT idactividades as id, descripcion as descripcion FROM p_actividades
             where estado =0 and idservicio = :idservicio;";
            $database->query($sql);
            $database->bind(':idservicio', $idservicio);
            $database->execute();
            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function ListaPuestoTrabajo()
    {
        try {
            $database = new ConexionBD();

             $sql = "SELECT idpuesto as id , upper(descripcion) as descripcion  FROM p_puestotrabajo 
             where estado = 0;";
            $database->query($sql);
            $database->execute();
            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function ListaDepartamentos()
    {
        try {
            $database = new ConexionBD();

             $sql = "SELECT idundorganizacional as id, descripcion  FROM p_unidadorganizacional Where estado =0;";
            $database->query($sql);
            $database->execute();
            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

      public function ListaPerfil()
    {
        try {
            $database = new ConexionBD();

            $sql = "SELECT idperfil as id, descripcion  FROM p_perfil;";
            $database->query($sql);
            $database->execute();
            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function ListadoServicio()
    {
        try {
            $database = new ConexionBD();

             $sql = "SELECT idservicio as id, descripcion  FROM p_servicio Where estado =0;";
            $database->query($sql);
            $database->execute();
            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function ListaServiciosDpto($undorganizacional)
    {
        try {
            $database = new ConexionBD();

             $sql = "SELECT idservicio as id, descripcion FROM p_servicio p
             where estado =0 and idundorganizacional = :undorganizacional;";
            $database->query($sql);
            $database->bind(':undorganizacional', $undorganizacional);
            $database->execute();
            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function ListaAreaServicio($servicio)
    {
        try {
            $database = new ConexionBD();

             $sql = "SELECT idarea as id, descripcion FROM p_area p
             where estado =0 and idservicio = :servicio;";
            $database->query($sql);
            $database->bind(':servicio', $servicio);
            $database->execute();
            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function ListaPlanilla($idservicio)
    {
        try {
            $database = new ConexionBD();

             $sql = "SELECT p.idplanilla,lower(e.nombrecompleto) as nombrecompleto,0 as otras,0 as horas FROM p_planilla p
             left join p_personal e on e.idpersona = p.idpersona
             where p.idservicio = :idservicio and p.estado=0;";
            $database->query($sql);
            $database->bind(':idservicio', $idservicio);
            $database->execute();
            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function ListaPlanillaN($idservicio,$periodo,$mes)
    {
        try {
            $database = new ConexionBD();

             $sql = "SELECT p.idplanilla,lower(e.nombrecompleto) as nombrecompleto,ifnull((SELECT count(a.idturno)
             from p_rolprogramacion a
             where a.idplanilla =p.idplanilla
               and a.periodo = :periodo AND a.mes = :mes  and a.idtipomodalidad not in(2,3)) ,0)as horas
             FROM p_planilla p
             LEFT JOIN p_personal e on e.idpersona = p.idpersona
             WHERE p.idservicio = :idservicio and p.estado=0
             GROUP BY p.idplanilla,e.nombrecompleto;";
            $database->query($sql);
            $database->bind(':periodo', $periodo);
            $database->bind(':mes', $mes);
            $database->bind(':idservicio', $idservicio);         
            $database->execute();
            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    


    public function ListaTurnos()
    {
        try {
            $database = new ConexionBD();

            //$sql = "SELECT idturno as nro, nombre as descripcion FROM turnos WHERE idestado=1;";
            //$sql = "SELECT idturno as nro, idturno as descripcion ,horas,sigla,nombret FROM turnos WHERE idestado=1;";
            $sql = "SELECT idturno as nro, nombre as descripcion FROM turnos WHERE idestado=1;";
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

            $sql = "SELECT p.idhora as nro,p.nombre  as descripcion FROM horaingreso h inner join  horas p on h.idhora=p.idhora where h.idturno = :turno and h.idestado=1";
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

            $sql = "SELECT r.idrol  as nro,u.NombreUser as Personal,concat_ws('->',(SELECT t.sigla FROM turnos t WHERE t.idturno=r.idturno limit 1),concat(r.nrohoras,'H')) as Horas ,case when r.idusuarioautoriza = 0 then 0 else 1 end as Autorizado FROM rolprogramacion r inner join usuario u on r.idusuario=u.idusuario
            WHERE r.periodo = :periodo AND r.mes = :mes AND r.dia = :dia AND r.idservicio = :servicio and r.idestado=1;";
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

    public function listaProgramadosDia($periodo, $mes, $dia)
    {
        try {
            $database = new ConexionBD();

            $sql = "SELECT r.idrol as nro,u.NombreUser as Personal,concat_ws('->', t.sigla ,concat(r.nrohoras,'H')) as Horas , s.nombre  as Grupo,case when r.idusuarioautoriza = 0 then 0 else 1 end as Autorizado ,s.clase FROM rolprogramacion r inner join usuario u on r.idusuario=u.idusuario
            LEFT JOIN servicios s ON s.idservicio =r.idservicio
            LEFT JOIN turnos t ON t.idturno=r.idturno
            WHERE r.periodo = :periodo AND r.mes = :mes AND r.dia = :dia and r.idestado=1 order by s.idservicio asc;";
            $database->query($sql);
            $database->bind(':periodo', $periodo);
            $database->bind(':mes', $mes);
            $database->bind(':dia', $dia);
            $database->execute();
            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function listaProgramadosServicio($periodo, $mes, $idusuario)
    {
        try {
            $database = new ConexionBD();

            $sql = "SELECT distinct r.idservicio  as nro, s.nombre  as Grupo,s.clase FROM rolprogramacion r
            LEFT JOIN servicios s ON s.idservicio =r.idservicio
            LEFT JOIN turnos t ON t.idturno=r.idturno
            WHERE r.periodo = :periodo AND r.mes = :mes AND r.idusuario = :idusuario and r.idestado=1
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

    public function listaProgramado($periodo, $mes, $idusuario)
    {
        try {
            $database = new ConexionBD();

            $sql = "SELECT d.iddia as dia
            ,case when r.idtipomodalidad = 2 then 'Lic' when r.idtipomodalidad = 3 then 'Pre'  else '' end as turno
            ,ifnull(s.clase,'') as clase
            FROM diassemana d left join rolprogramacion r  on d.iddia=r.dia and r.periodo = :periodo AND r.mes = :mes AND r.idusuario = :idusuario and r.idestado=1
            LEFT JOIN servicios s ON s.idservicio =r.idservicio
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

            $sql = "SELECT idusuario as nro,  NombreUser  as descripcion FROM usuario where idarea = :idarea and idestado=1             
            order by 2 asc;";
            $database->query($sql);
            $database->bind(':idarea', $idarea);
            $database->execute();
            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

       public function listaPersonalArea()
    {
        try {
            $database = new ConexionBD();

            $sql = "SELECT idusuario as nro,  NombreUser  as descripcion FROM usuario where idarea = :idarea and idestado=1             
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

      public function listaPersonalActividad($idarea)
    {
        try {
            $database = new ConexionBD();

            $sql = "SELECT per.idpersona as id,per.nombrecompleto
                    FROM p_planilla pla
                    INNER JOIN p_personal per on per.idpersona=pla.idpersona
                    where pla.idarea = :idarea
                    group by per.nombrecompleto;";
            $database->query($sql);
            $database->bind(':idarea', $idarea);
            $database->execute();
            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }


}

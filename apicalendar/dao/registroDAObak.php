<?php

require_once '../database/database.php';

class RegistroDAO
{

    public function registrarHorario($dniusuario, $periodo, $mes, $dia, $turno, $hora, $servicio)
    {
        try {

            $database = new ConexionBD();

            $sql = "CALL spRegistrarTurno($dniusuario, $periodo, $mes, $dia, $turno, $hora, $servicio);";
            // $database->query($sql);
            // $database->execute();
            // $database->queryStoredProcedure($sql);

            // // $database->bind(':dniusuario', $dniusuario, PDO::PARAM_STR);
            // $database->bind(':idusuario', $dniusuario, PDO::PARAM_INT);
            // $database->bind(':periodo', $periodo);
            // $database->bind(':mes', $mes);
            // $database->bind(':dia', $dia);
            // $database->bind(':turno', $turno);
            // $database->bind(':hora', $hora);
            // $database->bind(':servicio', $servicio);

            // $sql = "CALL spRegistrarTurno (?,?,?,?,?,?,?);";
            // $database->query($sql);
            // $database->bind('1', $dniusuario, PDO::PARAM_INT);
            // $database->bind('2', $periodo);
            // $database->bind('3', $mes);
            // $database->bind('4', $dia);
            // $database->bind('5', $turno);
            // $database->bind('6', $hora);
            // $database->bind('7', $servicio);
            // $database->execute();

            // return $database->lastInsertId();
            return  $database->queryStoredProcedures($sql);
            //return  $database->queryStoredProcedures($sql);
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function registrarHorarioAdmin($dniusuario, $periodo, $mes, $dia, $turno, $hora, $area,$modalidad, $Administrador)
    {
        try {

            $database = new ConexionBD();

            $sql = "CALL p_spRegistrarTurnoAdmin($dniusuario, $periodo, $mes, $dia, $turno, $hora, $area,$modalidad,$Administrador);";
            // $database->query($sql);
            // $database->execute();
            // $database->queryStoredProcedure($sql);

            // // $database->bind(':dniusuario', $dniusuario, PDO::PARAM_STR);
            // $database->bind(':idusuario', $dniusuario, PDO::PARAM_INT);
            // $database->bind(':periodo', $periodo);
            // $database->bind(':mes', $mes);
            // $database->bind(':dia', $dia);
            // $database->bind(':turno', $turno);
            // $database->bind(':hora', $hora);
            // $database->bind(':servicio', $servicio);

            // $sql = "CALL spRegistrarTurno (?,?,?,?,?,?,?);";
            // $database->query($sql);
            // $database->bind('1', $dniusuario, PDO::PARAM_INT);
            // $database->bind('2', $periodo);
            // $database->bind('3', $mes);
            // $database->bind('4', $dia);
            // $database->bind('5', $turno);
            // $database->bind('6', $hora);
            // $database->bind('7', $servicio);
            // $database->execute();

            // return $database->lastInsertId();
            return  $database->queryStoredProcedures($sql);
            //return  $database->queryStoredProcedures($sql);
        } catch (Exception $ex) {
            throw $ex;
        }
    }
       public function registrarActividades($id_rol, $actividad)
    {
                try {

            $database = new ConexionBD();
            $act=implode(",",$actividad );
            $sql = " INSERT INTO p_actividad (idrol,id_actividades)
                      VALUES (:id_rol, :actividad)  ";

            $database->query($sql);
            $database->bind(':actividad', $act);
            $database->bind(':id_rol', $id_rol);
            $database->execute();

            return $database->lastInsertId();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}

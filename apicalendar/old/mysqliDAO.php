<?php

require_once '../database/mydatabase.php';

class HorarioDAO
{

    public function ListaTurnos()
    {
        try {
            $database = new ConexionBD();

            $sql = "SELECT idturno as nro, nombre as descripcion FROM turnos WHERE idestado=1;";

            //$database->query($sql);
            return $database->query($sql);
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
            return $database->query($sql);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function ListaAsistencia($periodo, $mes, $dia)
    {
        try {
            $database = new ConexionBD();
            $sql = "CALL spListaasistencia($periodo, $mes,$dia);";
            return $database->query($sql);
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}

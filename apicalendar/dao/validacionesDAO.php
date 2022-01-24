<?php

require_once '../database/database.php';

class validacionDAO
{
    public function Asignarestadodeconformidad($id,$estado){
        try {
            $database = new ConexionBD();

            $sql = " UPDATE   p_rolprogramacion rol SET  rol.idestado= :estado
                    WHERE rol.idrol= :id ;";
            $database->query($sql);
            $database->bind(':estado', $estado);
            $database->bind(':id', $id);
            $database->execute();
            return true;


        } catch (Exception $ex) {
            throw $ex;
        }
}

  public function AsignarestadodeconformidadEmpleado($id,$estado){
        try {
            $database = new ConexionBD();

            $sql = " UPDATE   p_rolprogramacion rol SET  rol.idestado1= :estado
                    WHERE rol.idrol= :id ;";
            $database->query($sql);
            $database->bind(':estado', $estado);
            $database->bind(':id', $id);
            $database->execute();
            return true;


        } catch (Exception $ex) {
            throw $ex;
        }
}


}

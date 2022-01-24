<?php

require_once '../database/database.php';

class eliminarDAO
{
        public function eliminarActividad($nro)
    {
                try {

            $database = new ConexionBD();

           
               $sql = "DELETE FROM p_actividad WHERE idrol=:nro";
               $database->query($sql);
               $database->bind(':nro', $nro);
              
               $database->execute();
            
               return $database->lastInsertId();



        } catch (Exception $ex) {
            throw $ex;
        }
    }

         public function eliminarProgramacion($nro)
    {
                try {

            $database = new ConexionBD();

           
               // $sql = "DELETE FROM p_rolprogramacion WHERE idrol=:nro";
               $sql = "DELETE p_rolprogramacion, p_actividad
                       from p_rolprogramacion join p_actividad on p_rolprogramacion.idrol=p_actividad.idrol
                       where p_rolprogramacion.idrol=:nro";
               $database->query($sql);
               $database->bind(':nro', $nro);
              
               $database->execute();
            
               return $database->lastInsertId();



        } catch (Exception $ex) {
            throw $ex;
        }
    }
}

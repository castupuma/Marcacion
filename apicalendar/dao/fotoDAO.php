<?php

require_once '../database/database.php';

class FotoDAO
{

    public function obtenerFotos()
    {
        try {

            $database = new ConexionBD();

            $sql = " SELECT * FROM fotos  ";

            $database->query($sql);
            $database->execute();

            return $database->resultSet();

        } catch (Exception $ex) {
            throw $ex;
        }
    }

}
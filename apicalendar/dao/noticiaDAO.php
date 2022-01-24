<?php

require_once '../database/database.php';

class NoticiaDAO
{

    public function obtenerNoticias()
    {
        try {

            $database = new ConexionBD();

            $sql = " SELECT * FROM noticias  ";

            $database->query($sql);
            $database->execute();

            return $database->resultSet();

        } catch (Exception $ex) {
            throw $ex;
        }
    }

}
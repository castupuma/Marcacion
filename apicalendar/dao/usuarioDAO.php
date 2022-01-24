<?php

require_once '../database/database.php';

class UsuarioDAO
{

    public function registrarUsuario($nombres, $apellidos, $email, $password)
    {
        try {

            $database = new ConexionBD();

            $sql = " INSERT INTO usuario (nombres, apellidos, email, password)
                      VALUES (:nombres, :apellidos, :email, :password)  ";

            $database->query($sql);
            $database->bind(':nombres', $nombres);
            $database->bind(':apellidos', $apellidos);
            $database->bind(':email', $email);
            $database->bind(':password', $password);
            $database->execute();

            return $database->lastInsertId();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function buscarUsuarioPorEmail($email)
    {
        try {

            $database = new ConexionBD();

            $sql = " SELECT * FROM usuario WHERE email = :email  ";

            $database->query($sql);
            $database->bind(':email', $email);
            $database->execute();
            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}

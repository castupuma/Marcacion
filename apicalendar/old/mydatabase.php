<?php

require_once '../config/config_db.php';


class ConexionBD
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $passw = DB_PASSW;
    private $dbname = DB_NAME;
    private $conn;
    private $error;

    private $stmt;

    function __construct()
    {
        if ($this->conn == null) {
            try {
                $this->conn = new mysqli($this->host, $this->user, $this->passw, $this->dbname);
            } catch (Exception $e) {
                $this->error = $e->getMessage();
            }
        }
    }

    function query($query)
    {
        $this->stmt = $this->conn->query($query);
        return $this->stmt->fetch_all(MYSQLI_ASSOC);
    }

    function query2($query)
    {
        //$this->stmt = $this->conn->query($query);

        // $sentencia = $this->conn->query("SELECT  codusuario AS _message FROM usuario");
        // $fila = $sentencia->fetch_assoc();
        //return $fila['_message'];
        $line = null;

        if ($result = $this->conn->query("SELECT  idusuario, codusuario FROM usuario")) {
            while ($obj = $result->fetch_object()) {
                //$line .= $obj->nombre;
                //$line .= $obj->_message;
                //$line = $obj->_message;
                $user_arr[] = $obj;
            }
        }

        $result->close();

        return $user_arr;
    }


    function queryStoredProcedures($query)
    {
        $this->stmt = $this->conn->query($query);
        return $this->stmt->fetch_all();
    }


    public function queryBindInsert($sql, $bind)
    {
        $stmt = $this->pdo->prepare($sql);
        if (count($bind)) {
            foreach ($bind as $param => $value) {
                $c = 1;
                for ($i = 0; $i < count($value); $i++) {
                    $stmt->bindValue($c++, $value[$i]);
                }
                $stmt->execute();
            }
        }
    }

    function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindParam($param, $value, $type);
    }

    function execute()
    {
        return $this->stmt->execute();
    }

    function resultSet()
    {
        $this->execute();
        return $this->stmt->fetch_all();
    }

    function lastInsertId()
    {
        return $this->conn->insert_id;
    }

    function __destruct()
    {
        $this->conn = null;
    }
}

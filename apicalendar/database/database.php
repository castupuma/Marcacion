<?php

require_once '../config/config_db.php';

class ConexionBD
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $passw = DB_PASSW;
    private $dbname = DB_NAME;
    private $conn;
    private $options;
    private $error;

    private $stmt;

    function __construct()
    {

        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;

        $this->options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => 1
        );

        if ($this->conn == null) {
            try {
                $this->conn = new PDO($dsn, $this->user, $this->passw, $this->options);
            } catch (Exception $e) {
                $this->error = $e->getMessage();
            }
        }
    }

    function query($query)
    {
        $this->stmt = $this->conn->prepare($query);
    }

    function queryStoredProcedures($query)
    {
        $this->stmt = $this->conn->query($query);
        $this->stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $this->stmt->fetchAll();
    }


    public function execSPParametrosOB($query)
    {
        $this->stnt = $this->conn->prepare($query);
        $this->stnt->execute();
        return $this->stmt->get_result();
    }

    public function mostrarLabResultados($idPaciente, $fecha)
    {
        try {
            $sql = "execute _consultarResultados :idPaciente, :fecha";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array(':idPaciente' => $idPaciente, ':fecha' => $fecha));
            // $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
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
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function lastInsertId()
    {
        return $this->conn->lastInsertId();
    }

    function __destruct()
    {
        $this->conn = null;
    }
}

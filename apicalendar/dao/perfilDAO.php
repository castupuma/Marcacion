<?php

require_once '../database/database.php';

class perfilDAO
{

    public function obtenerPerfil()
    {
        try {

            $database = new ConexionBD();
            
                $sql = "SELECT idusuario as id,per.descripcion as perfil, nombreusuario as nombres, idestado as estado, CASE WHEN idestado=1 THEN 'ACTIVO' ELSE 'INACTIVO' END as estado
FROM p_usuario u
inner join p_perfil per on per.idperfil = u.idperfil
group by nombreusuario";
            
            
            // $filtro = "%".$filtro."%";   
            $database->query($sql);
            // $database->bind(':filtro',$filtro);
            $database->execute();

            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function obtenerPerfilId($idusuario)
    {
        try {

            $database = new ConexionBD();

            $sql = "SELECT idusuario as id ,per.idperfil as perfil, nombreusuario as nombres, dni, clave ,avatar as foto,idestado as estado
FROM p_usuario u
left join p_perfil per on per.idperfil=u.idperfil
where idusuario = :idusuario
limit 1;";

            $database->query($sql);
            $database->bind(':idusuario', $idusuario);
            $database->execute();

            return $database->resultSet();
        } catch (Exception $ex) {
            throw $ex;
        }
    }



    public function registrarPerfil($idusuario, $dni, $clave,$nombreusuario,$idestado,$idperfil,$avatar)
    {
        try {
            $database = new ConexionBD();

            if ($idusuario == '') {
                $idusuario = 0;
            }

            $sql = "CALL p_spRegistrarPerfil($idusuario,'$dni','$clave','$nombreusuario',$idestado,$idperfil,'$avatar')";

            return  $database->queryStoredProcedures($sql);
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}

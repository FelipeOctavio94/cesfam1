<?php

namespace models;
require_once("Conexion.php");

class Informatico{

    public function iniciarSesionInfo($rut, $clave){
        $stm = Conexion::conector()->prepare("SELECT * FROM informatico WHERE rut=:A AND clave=:B");
        $stm->bindParam(":A",$rut);
        $stm->bindParam(":B",md5($clave));
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function crearUsuario($data){
        $stm = Conexion::conector()->prepare("INSERT INTO usuario VALUES(:A,:B,:C,:D,:E,:F)");
        $stm->bindParam(":A",$data['rut']);
        $stm->bindParam(":B",$data['nombre']);
        $stm->bindParam(":C",$data['apellido']);
        $stm->bindParam(":D",$data['rol']);
        $stm->bindParam(":E",md5($data['clave']));
        $stm->bindParam(":F",$data['telefono']);
        return $stm->execute();
    }

    public function eliminarUsuario($rut){
        $stm = Conexion::conector()->prepare("DELETE FROM usuario WHERE rut=:A");
        $stm->bindParam(":A",$rut);
        return $stm->execute();
    }
    
    public function mostrarUsuarios(){
        $stm= Conexion::conector()->prepare("SELECT * FROM usuario");
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function buscarUserxRut($rut){
        $stm= Conexion::conector()->prepare("SELECT * FROM usuario WHERE rut=:A");
        $stm->bindParam(":A",$rut);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
}
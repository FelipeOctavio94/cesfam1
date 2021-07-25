<?php

namespace models;
require_once("Conexion.php");

class Paciente{

    public function insertarPaciente($data){
        $stm = Conexion::conector()->prepare("INSERT INTO paciente VALUES(:A,:B,:C,:D,:E,:F)");
        $stm->bindParam(":A",$data['rut_paciente']);
        $stm->bindParam(":B",$data['nombre_paciente']);
        $stm->bindParam(":C",$data['direccion_paciente']);
        $stm->bindParam(":D",$data['telefono_paciente']);
        $stm->bindParam(":E",$data['fecha_creacion']);
        $stm->bindParam(":F",$data['email_paciente']);
        return $stm->execute();
    }

    public function buscarPacienteRut($rut){
        $stm = Conexion::conector()->prepare("SELECT * FROM paciente WHERE rut_paciente=:A");
        $stm->bindParam(":A",$rut);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function mostrarPacientes(){
        $stm = Conexion::conector()->prepare("SELECT * FROM paciente");
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

}
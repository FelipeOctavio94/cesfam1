<?php

namespace models;
require_once("Conexion.php");

class Receta{

    public function insertarReceta($data){
        $stm = Conexion::conector()->prepare("INSERT INTO receta values(NULL,:A,:B,:C,:D,:E,:F,:G)");
        $stm->bindParam(":A", $data['rut_paciente']);
        $stm->bindParam(":B", $data['fecha_visita']);
        $stm->bindParam(":C", $data['observacion']);
        $stm->bindParam(":D", $data['sintomas']);
        $stm->bindParam(":E", $data['rut_operativo']);
        $stm->bindParam(":F", $data['medicamentos']);
        $stm->bindParam(":G", $data['diagnostico']);
        return $stm->execute();
    }

    //el inner join no se si este bien para que se enlace con el operativo y el paciente la receta
    //public function buscarxRut($rut){
        //$sql = 'SELECT id_receta "id",pt.nombre_paciente "Paciente", 
        //fecha_visita, sintomas, observacion, op.nombre "nombre usuario", 
       // medicamentos, diagnostico 
      //  from receta
      //  inner join paciente pt
      //  on pt.rut_paciente = receta.rut_paciente
      //  inner join usuario op
     //   on op.rut=receta.rut_operativo
     //   where receta.rut_paciente =:A';
     //   $stm = Conexion::conector()->prepare($sql);
     //   $stm->bindParam(":A", $rut);
     //   $stm->execute();
     //   return $stm->fetchAll(\PDO::FETCH_ASSOC);
  //  }
  public function buscarxRut($rut){

    $sql = 'SELECT id_receta "id",pt.nombre_paciente "Paciente", pt.telefono_paciente "telefono",

    fecha_visita, sintomas, observacion, op.nombre "Operativo",

    medicamentos, diagnostico 

    from receta

    inner join paciente pt

    on pt.rut_paciente = receta.rut_paciente

    inner join usuario op

    on op.rut=receta.rut_operativo

    where receta.rut_paciente =:A';

    $stm = Conexion::conector()->prepare($sql);

    $stm->bindParam(":A", $rut);

    $stm->execute();

    return $stm->fetchAll(\PDO::FETCH_ASSOC);

}
public function mostrarReceta(){
    $sql = 'SELECT id_receta "id",pt.nombre_paciente "Paciente", pt.telefono_paciente "telefono",
    fecha_visita, sintomas, observacion, op.nombre "Operativo",
    medicamentos, diagnostico 
    from receta
    inner join paciente pt
    on pt.rut_paciente = receta.rut_paciente
    inner join usuario op
    on op.rut=receta.rut_operativo';
    $stm = Conexion::conector()->prepare($sql);
    $stm->execute();
    return $stm->fetchAll(\PDO::FETCH_ASSOC);
}

    
    //aun no hago la busqueda por id no se si sea necesario
    public function borrarReceta($id){
        $stm = Conexion::conector()->prepare("DELETE FROM receta WHERE id_receta=:id");
        $stm->bindParam(":id",$id);
        return $stm->execute();
    }


}
<?php

namespace controllers;

use models\Paciente as Paciente;

require_once("../models/Paciente.php");

class CargaPacientes{

    public function Pacientes(){
        $modelo = new Paciente();
        echo json_encode($modelo->mostrarPacientes());
    }
}
$obj = new CargaPacientes();
$obj->Pacientes();
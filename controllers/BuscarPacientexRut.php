<?php

namespace controllers;

use models\Paciente as Paciente;

require_once("../models/Paciente.php");

class BuscarPacientexRut{

    public $rut;

    public function __construct()
    {
        $this->rut = $_POST['rut'];
    }

    public function buscarPacientexRut(){
        session_start();
        if(isset($_SESSION['administrativo'])){
            $modelo = new Paciente();
            $arr = $modelo->buscarPacientexRut($this->rut);
            echo json_encode($arr);

        }else{
            echo json_encode(["msg" => "Necesita permisos de Administrativo"]);
        }
    }
}
$obj = new BuscarPacientexRut();
$obj->buscarPacientexRut();
<?php

namespace controllers;

use models\Usuario as Usuario;

require_once("../models/Usuario.php");

class EliminarPaciente{
    public $rut;

    public function __construct()
    {
        $this->rut = $_POST['rut'];
    }

    public function eliminarPac(){
        session_start();

        $modelo = new Usuario();
        $n= $modelo->borrarPaciente($this->rut);
        if ($n>=0) {
            $mensaje = ["msg"=>"Paciente Eliminado exitosamente"];
            echo json_encode($mensaje); 
        }else{
            $mensaje = ["msg"=>"Error en la BD"];
            echo json_encode($mensaje); 
        }
    }
}
$obj = new EliminarPaciente();
$obj->eliminarPac();
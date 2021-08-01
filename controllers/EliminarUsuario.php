<?php

namespace controllers;

use models\Informatico as Informatico;

require_once("../models/Informatico.php");

class EliminarUsuario{

    public $rut;

    public function __construct()
    {
        $this->rut = $_POST['rut'];
    }

    public function eliminarUser(){
        session_start();
                
        $modelo = new Informatico();
        $n = $modelo->BorrarUsuario($this->rut);
        if ($n >= 0) {
            $mensaje = ["msg"=>"Usuario Eliminado exitosamente"];
            echo json_encode($mensaje); 
        }else{
            $mensaje = ["msg"=>"Error en la BD"];
            echo json_encode($mensaje); 
        }
    }
}
$obj = new EliminarUsuario();
$obj->eliminarUser();
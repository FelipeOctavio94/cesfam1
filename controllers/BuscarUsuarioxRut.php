<?php

namespace controllers;

use models\Informatico as Informatico;

require_once("../models/Informatico.php");

class BuscarUsuarioxRut{

    public $rut;

    public function __construct()
    {
        $this->rut = $_POST['rut'];
    }

    public function buscarUsrioxRut(){
        session_start();
        if(isset($_SESSION['informatico'])){
            $modelo = new Informatico();
            $arr = $modelo->buscarUserxRut($this->rut);
            echo json_encode($arr);

        }else{
            echo json_encode(["msg" => "Necesita permisos de Informatico"]);
        }
    }
}
$obj = new BuscarUsuarioxRut();
$obj->buscarUsrioxRut();
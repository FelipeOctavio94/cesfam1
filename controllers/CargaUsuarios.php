<?php

namespace controllers;

use models\Informatico as Informatico;

require_once("../models/Informatico.php");

class CargaUsuarios{

    public function Usuarios(){
        $modelo = new Informatico();
        echo json_encode($modelo->mostrarUsuarios());
    }
}
$obj = new CargaUsuarios();
$obj->Usuarios();
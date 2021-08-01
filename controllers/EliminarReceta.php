<?php

namespace controllers;

use models\Receta as Receta;

require_once("../models/Receta.php");

class EliminarReceta{
    public $id;

    public function __construct()
    {
        $this->id = $_POST['id'];
    }

    public function eliminarRec(){
        session_start();

        $modelo = new Receta();
        $n= $modelo->borrarReceta($this->id);
        if ($n >= 0) {
            $mensaje = ["msg"=>"Receta Eliminada exitosamente"];
            echo json_encode($mensaje); 
        }else{
            $mensaje = ["msg"=>"Error en la BD"];
            echo json_encode($mensaje); 
        }
    }
}
$obj = new EliminarReceta();
$obj->eliminarRec();
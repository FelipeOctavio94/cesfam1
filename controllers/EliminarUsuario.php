<?php

namespace controllers;

use models\Informatico;

require_once("../models/Informatico.php");

class EliminarUsuario{

    public $rut;

    public function __construct()
    {
        $this->rut = $_POST['rut'];
    }

    public function eliminarUser(){
        session_start();
        if ($this->rut == "") {
            json_encode(['msg'=>'no se ha seleccionado rut']);
        }
        
        $modelo = new Informatico();
        $n = $modelo->BorrarUsuario($this->rut);
        if ($n >= 0) {
            json_encode(['msg'=>'eliminado']);  
        }else{
            json_encode(['msg'=>'Error en la base de datos']);  
        }

        json_encode(['msg'=>'Exitosamente']);  
    }
}
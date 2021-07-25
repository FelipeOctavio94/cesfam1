<?php

namespace controllers;

use models\Receta as Receta;

require_once("../models/Receta.php");

class CargaRecetas{

    public function recetas(){
        $modelo = new Receta();
        echo json_encode($modelo->mostrarReceta());
    }
}
$obj = new CargaRecetas();
$obj->recetas();

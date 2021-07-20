<?php

namespace controllers;

use models\Receta as Receta;

require_once("../models/Receta.php");

class InsertarReceta{
    public $rut_paciente;
    public $fecha_visita;
    public $observacion;
    public $sintomas;
    public $rut_operativo;
    public $medicamentos;
    public $diagnostico;
 

    public function __construct()
    {
        $this->rut_paciente = $_POST['rut_paciente'];
        $this->fecha_visita = $_POST['fecha_visita'];
        $this->observacion = $_POST['observacion'];
        $this->sintomas = $_POST['sintomas'];
        $this->rut_operativo = $_POST['rut_operativo'];
        $this->medicamentos = $_POST['medicamentos'];
        $this->diagnostico = $_POST['diagnostico'];
    
    }

    public function insertar(){
        session_start();
        if(isset($_SESSION['user'])){
            if($_SESSION['user']['rol']=="operativo"){
                $rut_user = $_SESSION['user']['rut'];
                $data = [
                'rut_paciente'=>$this->rut_paciente,
                'fecha_visita'=>$this->fecha_visita,
                'observacion'=>$this->observacion,
                'sintomas'=>$this->sintomas,
                'rut_operativo'=>$this->rut_operativo,
                'medicamentos'=>$this->medicamentos,
                'diagnostico'=>$this->diagnostico,
                
                ];
                $modelo = new Receta();
                $count = $modelo->insertarReceta($data);

                if($count == 1){
                    echo json_encode(["msg"=>"¡¡Agregado en la Base de Datos con exito!!"]);
                }else{
                    echo json_encode(["msg"=>"¡¡ERROR: No ha sido posible agregarlo a la Base de Datos!!"]);
                }
            }else{
                echo json_encode(["msg"=>"Acceso denegado"]);
            }
        }else{
            echo json_encode(["msg"=>"Acceso denegado"]);
        }
    }
}
$obj = new InsertarReceta();
$obj->insertar();

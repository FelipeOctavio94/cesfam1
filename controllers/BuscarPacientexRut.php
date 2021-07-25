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



    public function BuscarPaciente(){

        session_start();

        if(isset($_SESSION['user'])){

            if($_SESSION['user']['rol']=="administrativo"){

                $modelo = new Paciente();

                $arr = $modelo->buscarPacienteRut($this->rut);

                echo json_encode($arr);

            }else{

                echo json_encode(["msg"=>"Acceso denegado"]);

            }

        }else{

            echo json_encode(["msg"=>"Acceso denegado"]);

        }

    }

}

$obj = new BuscarPacientexRut();

$obj->BuscarPaciente();
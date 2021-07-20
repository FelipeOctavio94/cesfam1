<?php

namespace controllers;

require("../models/Paciente.php");

use models\Paciente as Paciente;

class NewClient{
    public $rut;
    public $nombre;
    public $direccion;
    public $telefono;
    public $fecha;
    public $email;

    public function __construct()
    {
        $this->rut = $_POST['rut'];
        $this->nombre = $_POST['name'];
        $this->direccion = $_POST['direccion'];
        $this->telefono = $_POST['telefono'];
        $this->fecha = $_POST['fecha'];
        $this->email = $_POST['email'];
    }

    public function newClient(){
        session_start();
        if($this->rut=="" || $this->nombre=="" || $this->direccion=="" || $this->telefono=="" || $this->fecha=="" || $this->email==""){
            $_SESSION['c_error']="Complete los campos";
            header("Location: ../view/adminis.php");
            return;
        }

        $model = new Paciente();
        $data = [
            'rut_paciente'=>$this->rut,
            'nombre_paciente'=>$this->nombre,
            'direccion_paciente'=>$this->direccion,
            'telefono_paciente'=>$this->telefono,
            'fecha_creacion'=>$this->fecha,
            'email_paciente'=>$this->email
        ];
        //print_r($data);
        $count = $model->insertarPaciente($data);

        if($count==1){
            $_SESSION['c_resp'] = "Paciente añadido";
        }else{
            $_SESSION['c_error'] = "Error en la BD";
        }
        header("Location: ../view/adminis.php");
    }

}
$obj = new NewClient();
$obj->newClient();
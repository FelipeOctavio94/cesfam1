<?php

namespace controllers;

require_once("../models/Informatico.php");
use models\Informatico as Informatico;

class NewUser{

    public $rut;
    public $nombre;
    public $apellido;
    public $rol;
    public $clave;
    public $telefono;

    public function __construct()
    {
        $this->rut      =$_POST['rut'];
        $this->nombre   =$_POST['nombre'];
        $this->apellido =$_POST['apellido'];
        $this->rol      =$_POST['rol'];
        $this->clave    =$_POST['clave'];
        $this->telefono =$_POST['telefono'];
    }

    public function nuevoUser(){
        session_start();
        if($this->rut=="" || $this->nombre=="" || $this->apellido=="" || $this->rol=="" || $this->clave=="" || $this->telefono==""){
            $_SESSION['u_error']= "Error: Porfavor verifique que todos los campos NO esten vacios";
            header("Location: ../view/informatico/ingresoUsuario.php");
            return;
        }
        $model = new Informatico();
        $data= [
        'rut'=>$this->rut,
        'nombre'=>$this->nombre,
        'apellido'=>$this->apellido,
        'rol'=>$this->rol,
        'clave'=>$this->clave,
        'telefono'=>$this->telefono 
        ];
        if($this->rol=="administrativo" || $this->rol=="operativo"){
            $count = $model->crearUsuario($data);
            if($count==1){
                $_SESSION['u_resp'] = "Usuario añadido";
            }else{
                $_SESSION['u_error'] = "¡Error en la BD!: puede que el RUT definido, ya este en uso";
            }
            header("Location: ../view/informatico/ingresoUsuario.php");
        }else{
            $_SESSION['u_error']="Error: El rol solo debe ser 'operativo' o 'administrativo'";
            header("Location: ../view/informatico/ingresoUsuario.php");
            return;
        }
    }
    
}
$obj = new NewUser();
$obj->nuevoUser();
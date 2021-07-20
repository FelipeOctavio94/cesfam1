<?php

namespace controllers;

use models\Informatico;

require_once("../models/Informatico.php");



class LoginInformatico{

    private $rut;
    private $clave;

    public function __construct()
    {
        $this->rut = $_POST['rut'];
        $this->clave =$_POST['pass'];
    }

    public function LoginInfor(){
        session_start();
        if($this->rut=="" || $this->clave==""){
            $_SESSION['msg'] = "Porfavor verifique que todos los campos esten completos";
            header("Location: ../view/informatico/informatico.php");
            return;
        }
        $infor = new Informatico();
        $arr = $infor->iniciarSesionInfo($this->rut, $this->clave);

        if(count($arr)==0){
            $_SESSION ['msg'] ="Usuario o contraseña invalida";
            header("Location: ../view/informatico/informatico.php");
            return;
        }
        $a= $arr[0];
        $_SESSION['informatico'] = $a;
        header("Location: ../view/informatico/ingresoUsuario.php");

    }
}

$obj = new LoginInformatico();
$obj->LoginInfor();

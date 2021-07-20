<?php

namespace models;

use PDOException;

class Conexion{
    //public static $user="root";
    //public static $pass="";
    //public static $URL="mysql:host=localhost;dbname=cesfam"; 
   
    public static $user="uztr3qegaslj6dbl";
    public static $pass="KSpgzwde7MLhasQiThm9";
    public static $URL="mysql:host=bydpm6mshiwchkaygi24-mysql.services.clever-cloud.com;dbname=bydpm6mshiwchkaygi24";
    
    public static function conector(){
        try{
            return new \PDO(Conexion::$URL,Conexion::$user,Conexion::$pass);
        }catch(PDOException $e){
            return null;
        }
    }

}
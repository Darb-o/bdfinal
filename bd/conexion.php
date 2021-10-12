<?php
class Conexion{
    public static function Conectar(){
        define('servidor','localhost');
        define('usuario','postgres');
        define('password','zzz');
        define('dbname','hospital');
        //seteo de caracteres
        $op = array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'); 
        try{
            $link = new PDO("pgsql:host=".servidor.";dbname=".dbname,usuario,password,$op);
            return $link;
        }catch(Exception $e){
            die("Error al consultar la BD".$e->getMessage());         
        }
    }
}
?>
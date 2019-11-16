<?php 
class Usuario{

    public $identificacion;
    public $listaTareas;

    public function __construct($identificacion,$listaTareas){
        $this->identificacion=$identificacion;
        $this->listTareas;    
    }

   

    public static function crearUsuario($identificacion,$listaTareas){
        return new Usuario($identificacion,$listaTareas);
    }
}
?>
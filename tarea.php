<?php 
class Tarea
{
    public $etiqueta;
    public $descripcion;
    public $estado;
    

    public function __construct ($etiqueta,$descripcion,$estado){
        $this->etiqueta=$etiqueta;
        $this->descripcion=$descripcion;
        $this->estado=$estado;
    }
    
    public static function CrearTarea($etiqueta,$descripcion,$estado){
        return new Tarea($etiqueta,$descripcion,$estado);
    }   
}
?>
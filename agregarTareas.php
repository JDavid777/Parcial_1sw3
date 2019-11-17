<?php

    include 'usuario.php';
    include 'tarea.php';

    $nombre=$_GET["nombre"];
    $descripcion=$_GET["descripcion"];
    $estado=$_GET["estado"];
    $obj= array($nombre,$descripcion,$estado);
    if(isset($obj)){
        if($nombre!=""&& $descripcion!=""&&$estado!=""){
            $directorio="jsonUsuarios";
            $dirint=dir($directorio);
            while(($archivo = $dirint->read()) != false){
    
                if($archivo != "." && $archivo != ".."){
    
                    if($archivo==$nombre.".json"){
                        $existeUsuario=true;
                        $usuario=$archivo;
                        break;
                    }
                }
            }
            
            $dirint->close();
        }
       
        else{
            echo "Debe ingresar su identificacion. Por favor intente nuevamente.";
        }

    }
?>
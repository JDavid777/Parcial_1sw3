<?php

    include 'usuario.php';
    include 'tarea.php';

    $nombre=$_GET["nombre"];
    $descripcion=$_GET["descripcion"];
    $estado=$_GET["estado"];
    $obj= array($nombre,$descripcion,$estado);
    if(isset($obj)){
        if($nombre!=""&& $descripcion!=""&&$estado!=""){
            $existeUsuario=false;
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
    
            if(!$existeUsuario){

                $tarea1= Tarea::CrearTarea("Planear Semana","Incompleta");
                $tarea2= Tarea::CrearTarea("Ser Feliz","Incompleta");
    
                $jsonlistTareas=json_encode(array($tarea1,$tarea2));
                $archivo= 'jsonUsuarios/'.$nombre.'.json';
                file_put_contents($archivo,$jsonlistTareas);
                echo $jsonlistTareas;
            }

        }
       
        else{
            echo "Debe ingresar su identificacion. Por favor intente nuevamente.";
        }

    }
?>
<?php

    include 'usuario.php';
    include 'tarea.php';

    $usuarioId=$_GET["dato"];
    $usuario=null;
    if(isset($usuarioId)){
        if($usuarioId!=""){
            $existeUsuario=false;
            $directorio="jsonUsuarios";
            $dirint=dir($directorio);
            while(($archivo = $dirint->read()) != false){
    
                if($archivo != "." && $archivo != ".."){
    
                    if($archivo==$usuarioId.".json"){
                        $existeUsuario=true;
                        $usuario=$archivo;
                        break;
                    }
                }
            }
            
            $dirint->close();
    
            if(!$existeUsuario){

                $tarea1= Tarea::CrearTarea("Planear Semana","Organizate para esta semana","Imcompleta");
                $tarea2= Tarea::CrearTarea("Ser Feliz","Ella no te ama","Incompleta");
    
                $jsonlistTareas=json_encode(array($tarea1,$tarea2));
                $archivo= 'jsonUsuarios/'.$usuarioId.'.json';
                file_put_contents($archivo,$jsonlistTareas);
                echo $jsonlistTareas;
            }

        }
       
        else{
            echo "Debe ingresar su identificacion. Por favor intente nuevamente.";
        }

    }
?>
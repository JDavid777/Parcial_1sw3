<?php

    include 'usuario.php';
    include 'tarea.php';

    $existeUsuario=false;
    $cedula=$_GET["cedula"];
    $id=$_GET["idTarea"];
    $newArchivo=null;
    if(isset($cedula)){
        if($cedula!=""){
      
            $directorio="jsonUsuarios";
            $dirint=dir($directorio);
            while(($archivo = $dirint->read()) != false){
                if($archivo != "." && $archivo != ".."){
                    if($archivo==$cedula.".json"){
                        $existeUsuario=true;
                        break;
                    }
                }

            }
            if($existeUsuario){

                $stringTarea=file_get_contents("jsonUsuarios/".$cedula.'.json');
                
                $datos=json_decode($stringTarea);
                $idx=1;
                foreach($datos as $item){
                   if($idx==$id){
                       if( $item->estado=="Incompleta"){
                        $item->estado="Completada";
                       }
                       else{
                        $item->estado="Incompleta";
                       }

                        break;
                    }
                    $idx++;
                }
                $newlista=json_encode($datos);
                file_put_contents("jsonUsuarios/".$cedula.'.json',$newlista);
                //para retornar la nueva tarea
                $newArchivo=file_get_contents("jsonUsuarios/".$cedula.'.json');
                 echo $newArchivo;
                
            }
            else{
                echo "tarea no guarda";
            }
            $dirint->close();
        }
       
        else{
            echo "Error.";
        }

    }
?>

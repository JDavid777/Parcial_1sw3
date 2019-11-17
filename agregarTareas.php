<?php

    include 'usuario.php';
    include 'tarea.php';

    $existeUsuario=false;
    $cedula=$_GET["cedula"];
    $nombre=$_GET["etiqueta"];
    $descripcion=$_GET["descripcion"];
    $estado=$_GET["estado"];
    $newArchivo=null;
    if(isset($cedula)){
        if($nombre!=""&&$estado!=""){
      
            $directorio="jsonUsuarios";
            $dirint=dir($directorio);
            while(($archivo = $dirint->read()) != false){
                if($archivo != "." && $archivo != ".."){
                    
                    if($archivo==$cedula.".json"){
                        echo $archivo;
                        $existeUsuario=true;
                        break;
                    }
                }

            }
            if($existeUsuario){

                $tareaNueva= Tarea::CrearTarea($nombre,$descripcion,$estado);
                
                $stringTarea=file_get_contents("jsonUsuarios/".$cedula.'.json');
                $newlista=json_encode(array(json_decode($stringTarea),$tareaNueva));
                
                file_put_contents("jsonUsuarios/".$cedula.'.json',$newlista);
                $newArchivo=json_encode($tareaNueva);
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

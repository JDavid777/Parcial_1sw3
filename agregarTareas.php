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
                        $existeUsuario=true;
                        break;
                    }
                }

            }
            if($existeUsuario){

                $tareaNueva= Tarea::CrearTarea($nombre,$descripcion,$estado);
               
                $stringTarea=file_get_contents("jsonUsuarios/".$cedula.'.json');
                
                $datos=json_decode($stringTarea);
                array_push($datos,$tareaNueva);
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

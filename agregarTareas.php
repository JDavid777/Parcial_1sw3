
Ir al contenido
Uso de Correo de Universidad del Cauca con lectores de pantalla
Conversaciones
1,12 GB en uso
Gestionar
Política del programa
Con la tecnología de Google
Última actividad de la cuenta: hace 10 horas
Detalles

<?php

    include 'usuario.php';
    include 'tarea.php';

    $existeUsuario=false;
    $cedula=$_GET["cedula"];
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
                    
                    if($archivo==$cedula.".json"){
                        echo $archivo;
                        $existeUsuario=true;
                        $usuario=$archivo;
                        break;
                    }
                }

            }


            if($existeUsuario){

                $tareaNueva= Tarea::CrearTarea($nombre,$descripcion,$estado);
               
                $stringTarea=file_get_contents("./jsonUsuarios"."/".$cedula.'.json');
                $datos = json_decode($stringTarea,true);
                array_push($datos,$stringTarea);
                
                file_put_contents("./jsonUsuarios"."/".$cedula.'.json',json_encode($datos));
                
                $archivo= 'jsonUsuarios/'.$cedula.'.json';
                echo "Tarea Guardada Correctamente";
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

agregarTareas.php
Mostrando agregarTareas.php.
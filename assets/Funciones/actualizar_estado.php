<?php
    function actualizar_estado($conexion,$id){
        //Validación simple
        if(is_numeric($id)){
            $stmt = $conexion->prepare("UPDATE prueba_db SET estado = if(estado='Y','N', 'Y') WHERE id= ?");
            $stmt ->bind_param("i",$id);

            if($stmt->execute()){
                echo "Se actualizó correctamente la tarea";
            }
            else{
                echo "Ocurrió un error al actualizar la tarea" .$stmt->error;
            }

            $stmt->close();
        }
        else{
            echo "El ID es inválido";
        }   
    }
?>
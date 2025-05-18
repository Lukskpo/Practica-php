<?php
    function eliminar_tarea($conexion,$id){
        if(is_numeric($id)){
            $statement = $conexion->prepare("DELETE FROM prueba_db WHERE id=?");
            $statement->bind_param("i",$id);
            
            if($statement->execute()){
                echo "La fila ha sido eliminada correctamente";
            }
            else{
                echo "Ha ocurrido un error al eliminar la fila". $statement->error;
            }
            $statement->close();
        }
        else{
            echo "No existe el ID buscado";
        }
    }
?>
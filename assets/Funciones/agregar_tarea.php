<?php
    function agregar_tarea($conexion){
        //Conseguir la fecha para ingresar la tarea
        date_default_timezone_set("America/Argentina/Buenos_Aires");    //Establezco la zona horaria de la cual se saca la fecha
        $fecha_creacion=date("Y-m-d H:i:s");    //Ingreso la fecha en una variable para utilizarla dps cuando la envio a la db en el prepare

        //Recibo los datos para enviarlos a la base de datos
        $id=$_POST['id'];
        $titulo=$_POST['titulo'];
        $descripcion=$_POST['descripcion'];
        $estado = isset($_POST['estado']) ? 1 : 'N';
        
        $nueva_tarea = $conexion->prepare("INSERT INTO prueba_db (id,titulo, descripcion, estado, fecha_creacion) VALUES(?,?,?,?,?)");
        $nueva_tarea->bind_param("issss",$id,$titulo,$descripcion,$estado,$fecha_creacion);

        if ($nueva_tarea->execute()) {
            echo "✅ Tarea guardada correctamente.";
        } else {
            echo "❌ Error al guardar: " . $nueva_tarea->error;
        }

        $nueva_tarea->close();
        $conexion->close();
    }
?>
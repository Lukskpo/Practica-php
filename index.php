<?php
include("assets/Funciones/conexion.php"); //Funcion que hace la conexion con la base de datos 
include("assets/Funciones/agregar_tarea.php");
include("assets/Funciones/actualizar_estado.php");
include("assets/Funciones/eliminar_tarea.php");
include("assets/Funciones/funciones_listadas.php");

$conexion=conectar();

if($_SERVER['REQUEST_METHOD']==='POST'){
        if(isset($_POST['nueva_tarea'])){
                agregar_tarea($conexion);
        }
        if(isset($_POST['completar'])){
                $id=$_POST['id_completar'];
                actualizar_estado($conexion,$id);
        }
        if(isset($_POST['update_button'])){
                $id=$_POST['id_attached'];
                actualizar_estado($conexion,$id);
        }
        if(isset($_POST['delete_button'])){
                echo "onclick= 'return confirm('¿Está seguro de que desea eliminar esta tarea?');'">
                $id=$_POST['id_attached'];
                eliminar_tarea($conexion,$id);
        }
        header("Location: " . $_SERVER['PHP_SELF']);    // Redirigir a la misma página para evitar el reenvío del formulario
}

$sql ="SELECT * FROM prueba_db";           //
$resultado = $conexion->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/CSS/style.css">
    <title>Pruebas con bases de datos</title>
</head>
<body>
    <div class="container">
        <div class="tabla_datos divs">
            <table>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Fecha de creación</th>
                <th>Cambiar estado</th>
                <th>Eliminar tarea</th>
            </tr>
            <tr>
                <?php
                    while($fila=$resultado->fetch_assoc()){
                        echo "<form class='form_tabla' method='POST' >
                            <tr>
                                <td><input type='hidden' name='id_attached' value={$fila['id']}>{$fila['id']}</td>
                                <td>{$fila['titulo']}</td>
                                <td>{$fila['descripcion']}</td>
                                <td>{$fila['estado']}</td>
                                <td>{$fila['fecha_creacion']}</td>
                                <td><input class='inputs' type='submit' name='update_button' value='Actualizar'></td>
                                <td><input class='inputs' type='submit' name='delete_button' value='Eliminar'></td>
                            </tr>
                        </form>";
                    }
                ?>
            </tr>
            </table>
        </div>

        <div class="agregar_datos divs"><span>Ingrese los siguientes datos</span><br> 
            <form method='POST'>
                <label>ID:</label>
                        <input class="inputs" type='number' placeholder='Ejemplo: 1'name='id' required><br> 
                <label>Título:</label>
                        <input class="inputs" type='text' placeholder='Ejemplo: Crear formulario...' name='titulo' required><br>
                <label>Descripción:</label>
                        <input class="inputs" type='text' placeholder='Ejemplo: Se crea el formulario para...' name='descripcion' required><br>
                <label>Estado:</label>
                        <input class="inputs" type='checkbox' name='estado'><br>
                <input class="inputs" type='submit' name='nueva_tarea' value='Enviar'><br>
            </form>
        </div>



        <div class="marcar_completado divs"><span>Ingrese el ID que desea marcar como completado:<br></span>
            <form method='POST'>
                <label>ID:</label>
                    <input class="inputs" type='number' placeholder='Ejemplo: 1' name='id_completar' required>
                    <input class="inputs" type='submit' name='completar' value='Enviar'>
            </form>
        </div>
        <div class="eliminar_fila divs">
            <span>Ingrese el ID de la tarea que desea eliminar:<br></span>
            <form method='POST'>
                <label>ID:</label>
                    <input class="inputs" type='number' name='id_a_eliminar' placeholder='Ejemplo: 1' required>
                    <input class="inputs" type='submit' name='a_eliminar' value='Enviar'>
            </form>
        </div>
    </div>
</body>
</html>
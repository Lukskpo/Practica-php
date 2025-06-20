<?php
include("assets/Funciones/conexion.php"); //Funcion que hace la conexion con la base de datos 
include("assets/Funciones/agregar_tarea.php");
include("assets/Funciones/actualizar_estado.php");
include("assets/Funciones/eliminar_tarea.php");

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
        if(isset($_POST['a_eliminar'])){
                $id=$_POST['id_a_eliminar'];
                eliminar_tarea($conexion,$id);
        }
        if(isset($_POST['delete_button'])){
                echo "onclick= 'return confirm('¿Está seguro de que desea eliminar esta tarea?');'">
                $id=$_POST['id_attached'];
                eliminar_tarea($conexion,$id);
        }
        header("Location: " . $_SERVER['PHP_SELF']);    // Redirigir a la misma página para evitar el reenvío del formulario
}

$sql ="SELECT * FROM tareas";           //
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
    <main class="main_container">
        <div class="div_tabla divs">
            <table class="tabla_datos">
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
                            $clase = ($fila['estado'] === 'Y') ? 'completada' : 'pendiente';
                            echo "<form class='form_tabla' method='POST' onsubmit='return confirm(\"¿Está seguro de que desea realizar esta acción?\")'; >
                                <tr class='$clase'>
                                    <td><input type='hidden' name='id_attached' value={$fila['id']}>{$fila['id']}</td>
                                    <td>{$fila['titulo']}</td>
                                    <td>{$fila['descripcion']}</td>
                                    <td>{$fila['estado']}</td>
                                    <td>{$fila['fecha_creacion']}</td>
                                    <td><input class='inputs submit_inputs_form' type='submit' name='update_button' value='Actualizar'></td>
                                    <td><input class='inputs submit_inputs_form' type='submit' name='delete_button' value='Eliminar'></td>
                                </tr>
                            </form>";
                        }
                    ?>
                </tr>
            </table>
        </div>
        <div class="adicional_content">
            <div class="divs div_izquierda">
                <fieldset class="agregar_datos divs">
                    <legend>Nueva tarea</legend>
                    <span>Ingrese los datos de la nueva tarea:</span>
                    <form method='POST'>
                        <label>ID:</label>
                                <input class="inputs" type='number' placeholder='Ejemplo: 1'name='id' required><br> 
                        <label>Título:</label>
                                <input class="inputs" type='text' placeholder='Ejemplo: Crear formulario...' name='titulo' required><br>
                        <label>Descripción:</label>
                                <input class="inputs" type='text' placeholder='Ejemplo: Se crea el formulario para...' name='descripcion' required><br>
                        <label>Estado:</label>
                                <input class="check_inputs" type='checkbox' name='estado'><br>
                        <input class="inputs submit_inputs" type='submit' name='nueva_tarea' value='Enviar'><br>
                    </form>
                </fieldset>
            </div>

            <div class="divs div_arriba_derecha">
                <fieldset class="marcar_completado divs">
                    <legend>Completar tarea</legend>    
                    <span>Ingrese el ID que desea marcar como completado:<br></span>
                    <form method='POST'>
                        <label>ID:</label>
                            <input class="inputs" type='number' placeholder='Ejemplo: 1' name='id_completar' required>
                            <input class="inputs submit_inputs" type='submit' name='completar' value='Enviar'>
                    </form>
                </fieldset>
            </div>
            
            <div class="divs div_abajo_derecha">
                <fieldset class="eliminar_fila divs">
                    <legend>Eliminar tarea</legend>
                    <span>Ingrese el ID de la tarea que desea eliminar:<br></span>
                    <form method='POST' onsubmit="return confirm('¿Está seguro de que desea eliminar esta tarea?');"> 
                        <label>ID:</label>
                            <input class="inputs" type='number' name='id_a_eliminar' placeholder='Ejemplo: 1' required>
                            <input class="inputs submit_inputs" type='submit' name='a_eliminar' value='Enviar'>
                    </form>
                </fieldset>
            </div>
            <div class="login">
                <a href="login.php"><h2>Login</h2></a>
            </div>
        </div>
    </main>
</body>
</html>
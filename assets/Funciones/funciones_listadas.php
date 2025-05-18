<?php
//$conexion = new mysqli("localhost","root","","tareas"); forma basica para hacer la conexion con la base de datos



/*$conexion=conectar();

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
}*/

/*$sql ="SELECT * FROM prueba_db";           //
$resultado = $conexion->query($sql);


echo "<table =1>";
    echo "<tr>
            <th>ID</th>
            <th>Título</th>
            <th>Descripción</th>
            <th>Estado</th>
            <th>Fecha de creación</th>
            <th>Cambiar estado</th>
            <th>Eliminar tarea</th>
        </tr>";
    while($fila=$resultado->fetch_assoc()){
        echo "<tr>
                <form method='POST'>
                        <td><input type='hidden' name='id_attached' value='{$fila['id']}'>{$fila['id']}</td>
                        <td>{$fila['titulo']}</td>
                        <td>{$fila['descripcion']}</td>
                        <td>{$fila['estado']}</td>
                        <td>{$fila['fecha_creacion']}</td>
                        <td><input type='submit' name='update_button' value='Actualizar'></td>
                        <td><input type='submit' name='delete_button' value='Eliminar'></td>
                </form>
            </tr>";
     }
echo"</table>";

echo "<br>  Ingrese los siguientes datos: <br>";
echo "<form method='POST'>";
    echo "<label>ID:</label>
            <input type='number' placeholder='Ejemplo: 1'name='id' required>  <br> ";
    echo "<label>Título:</label>
            <input type='text' placeholder='Ejemplo: Crear formulario...' name='titulo' required><br>";
    echo "<label>Descripción:</label>
            <input type='text' placeholder='Ejemplo: Se crea el formulario para...' name='descripcion' required><br>";
    echo "<label>Estado:</label>
            <input type='checkbox' name='estado'><br>";
    echo "<input type='submit' name='nueva_tarea' value='Enviar'><br>";
echo "</form>";



echo "<br><br> <p>Ingrese el ID que desea marcar como completado:<br></p>";
echo   "<form method='POST'>
            <label>ID:</label>
                <input type='number' placeholder='Ejemplo: 1' name='id_completar' required>
                <input type='submit' name='completar' value='Enviar'>
        </form>";

echo "<br><br> <p>Ingrese el ID de la tarea que desea eliminar:<br></p>";
echo "<form method='POST'>
        <label>ID:</label>
        <input type='number' name='id_a_eliminar' placeholder='Ejemplo: 1' required>
        <input type='submit' name='a_eliminar' value='Enviar'>
    </form>"*/
?>
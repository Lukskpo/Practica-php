<?php
//$conexion = new mysqli("localhost","root","","tareas");

include ("assets/Funciones/conexion.php");

$sql ="SELECT * FROM estado";
$resultado = $conexion->query($sql);

echo "<table border=1>";
    echo "<tr><th>ID</th><th>Título</th><th>Descripción</th><th>Estado</th><th>Fecha de creación</th></tr>";
    while($fila=$resultado->fetch_assoc()){
        echo "<tr><td>{$fila["id"]}</td><td>{$fila["titulo"]}</td><td>{$fila["descripcion"]}</td><td>{$fila["estado"]}</td><td>{$fila["fecha_creacion"]}</td></tr>";

    }
echo"</table>";

echo "<div class='Holis'> como vaa</div>";

echo "<br>Ingrese los siguientes datos: <br>";
echo "<form {action='post'}>";
    echo "<label>ID:</label>                <input type='int' name='id' id=''>";
    echo "<label>Título:</label>            <input type='varchar' name='titulo' id=''>";
    echo "<label>Descripción:</label>       <input type='text' name='descripcion' id=''>";
    echo "<label>Estado:</label>            <input type='checkbox' name='estado' id=''>";
    echo "<label>Fecha de creación:</label> <input type='datetime' name='fecha_creacion' id=''>";
echo "</form>";
?>
<?php
    $user="root";
    $password="";
    $dbname="tareas";
    $server="localhost";
    $conexion = mysqli_connect($server,$user,$password,$dbname) or die("No se conectó a la base de datos") ;

    return $conexion;
?>
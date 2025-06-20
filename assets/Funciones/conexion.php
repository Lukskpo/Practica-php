<?php
    function conectar(){
        $server="localhost";
        $user="root";
        $password="";
        $dbname="prueba_db";
        $conexion = new mysqli($server,$user,$password,$dbname);

        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }
        $conexion->set_charset("utf8"); // Establecer el conjunto de caracteres a utf8mb4

        return $conexion;
    }
?>
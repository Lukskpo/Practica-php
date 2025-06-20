<?php
    function login($username,$password){
        include 'conexion.php';

        $conexion = conectar();
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }
        
        //echo "<h1>Login</h1>";

        $sql = "SELECT * FROM users WHERE email = ? AND password = ?";

        $statement = $conexion->prepare($sql);
        if (!$statement) {
            die("Error al preparar la consulta: " . $conexion->error);
        }

        $statement->bind_param("ss", $username, $password);

        $statement->execute();
        $resultado = $statement->get_result();
        if ($resultado->num_rows > 0) {
            session_start();
            $_SESSION['username'] = $username;
            //header("Location: index.php");
            echo "Login successful. Welcome, ". "$username!";
        } else {
            echo "Invalid username or password.";
        }
    }
?>
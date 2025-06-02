<?php
    function login(){
        include 'conexion.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $ussername = $_POST ('username');
            $password = $_POST ('password');

            $sql = "SELECT * FROM users WHERE username = ? AND password = ?";

            $statement = $conexion->prepare($sql);
            $statement->bind_param("ss", $ussername, $password);

            $statement->execute();
            $resultado = $statement->get_result();
            if ($resultado->num_rows > 0) {
                session_start();
                $_SESSION['username'] = $ussername;
                header("Location: index.php");
                exit();
            } else {
                header("Location: login.php?error=1");
                exit();
            }
        }
    }
?>
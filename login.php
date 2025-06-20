<?php
    include 'assets/Funciones/login_user.php';

    if (isset($_POST['login_input'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        login($username, $password);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/CSS/style.css">
    <title>Login page</title>
</head>
<body>
    <main class="main_login">
       <div class="login_container">
            <fieldset class="login_fieldset">
                <legend>Login</legend>    
                <form method="POST">
                    <label for="username">Username:</label>
                    <input type="text" class="inputs" placeholder="Ejemplo: pepe" id="username" name="username" required><br>
                    
                    <label for="password">Password:</label>
                    <input type="password" class="inputs" placeholder="Ejemplo: pepe1234" id="password" name="password" required><br>
                    
                    <button type="submit" class="login_input inputs" name="login_input">Login</button> <br>
                </form>
                <div class="forgotten_password">
                    <a href="update_password.php" class="login_input forgotten_password">¿Olvidaste tu contraseña?</a>
                </div>

                <a href="sign_up.php" class="login_input inputs sign_up">Creá tu cuenta</a>
            </fieldset>
        </div> 
    </main>
</body>
</html>
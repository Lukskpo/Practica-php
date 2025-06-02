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
                <form action="index.php" method="POST">
                    <label for="username">Username:</label>
                    <input type="text" class="inputs" placeholder="Ejemplo: pepe" id="username" name="username" required><br>
                    
                    <label for="password">Password:</label>
                    <input type="password" class="inputs" placeholder="Ejemplo: pepe1234" id="password" name="password" required><br>
                    
                    <button type="submit" class="inputs">Login</button>
                </form>
                <p class="error_message">
                    <?php
                        if (isset($_GET['error'])) {
                            echo "Invalid username or password.";
                        }
                    ?>
                </p>
        </div> 
    </main>
</body>
</html>
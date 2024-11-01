<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./design/login.css">
	<title>Login</title>
</head>
<body>  
    <div class="maincontainer">

        <!-- Greeting message -->
        <h1><br>Welcome to Tulin Bicycle Shop's Employee Progress Management System</h1>

        <!-- Inside the form, only the information in the input fields within its scope will be retrieved using the POST method -->
        <form action="core/handleForms.php" method="POST">

            <!-- Input field for username -->
            <div class="text_field">
                <label>Username: </label>
                <input type="text" placeholder="Type your username here" class="fields" name="username">
            </div>

            <!-- Input field for password -->
            <div class="pass_field">   
                <label>Password: </label>    
                <input type="password" placeholder="Type your password here" class="fields" name="password">

            <!-- Submission for login -->
            <div class = "button_field">
                <p><br><input type="submit" value="Login" id="loginBtn" name="loginBtn"></p>
            </div>

            <!-- If the user does not have an account, they will be redirected to register.php or the registration page -->
            <div class = "registration">
                Not registered? <a href="register.php">Register</a>
            </div>

        </form>
    </div>
</body>
</html>
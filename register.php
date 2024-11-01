<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
    <link rel="stylesheet" href="./design/register.css">
</head>
<body>
    <div class="maincontainer">

        <!-- It prints the title of the site -->
        <h1><br>Registration</h1>

        <!-- This is where the error message appear -->
        <?php if (isset($_SESSION['message'])) { ?>
        <h1 style="color: red;"><?php echo $_SESSION['message']; ?></h1>
        <?php } unset($_SESSION['message']); ?>

        <!-- This form inserts the input to registered to the database -->
        <form action="core/handleForms.php" method="POST">

            <!-- Input field for new username -->
            <div class="text_field">
                <label>Type your new username: </label>
                <p><input type="text" placeholder="Type your username here" class="fields" name="username"></p>
            </div>

            <!-- Input field for new password -->
            <div class="pass_field">   
                <label>Type your new password: </label>    
                <p><input type="password" placeholder="Type your password here" class="fields" name="password"></p>
            </div>
            
            <!-- Input field for new staff's first name -->
            <div class="text_field">
                <label>Type your first name: </label>
                <p><input type="text" placeholder="Type your username here" class="fields" name="first_name"></p>
            </div>

            <!-- Input field for new staff's last name -->
            <div class="text_field">
                <label>Type your last name: </label>
                <p><input type="text" placeholder="Type your username here" class="fields" name="last_name"></p>

            <!-- Submit button -->
            <div class = "button_field">
                <p><br><input type="submit" value="Register" id="submitBtn" name="regBtn"></p>
            </div>

            <!-- When this is clicked, it will redirect to the login page -->
            <div class = "registration">
                Already registered? <a href="login.php">Login Page</a>
            </div>
        </form>

    </div>
</body>
</html>
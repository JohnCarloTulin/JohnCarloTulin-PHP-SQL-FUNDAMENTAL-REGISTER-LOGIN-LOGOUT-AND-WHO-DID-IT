<?php 
session_start();
require_once 'core/models.php';
require_once 'core/dbConfig.php';

# If the user does not log in, they will remain on the login page
if(!isset($_SESSION['username'])) {
	header('Location: login.php');
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Employee's Tab</title>
	<link rel="stylesheet" type ="text/css" href="./design/styles.css">
</head>
<body>

	<!-- If the user clicks this, the active session will be unset, and they will be redirected to the login page -->
    <a href="logout.php">Logout</a>
	
	<!-- This is the greeting message for the user who is recorded in the session or has logged in -->
	<h1>Welcome to Tulin Bicycle Shop's Employee Progress Management System, <?php echo $_SESSION['full_name']?>!</h1>
	<p style = "text-align:center">This is where you add the employees and manage their progress</p>

	<!-- This is the form for inserting employee, it will direct to handle forms when insertEmployeebtn clicked -->
	<form action="core/handleForms.php" method="POST">
		
		<!-- Input field for employee's assigned job -->
		<p>
			<label for="firstName">Assigned Job:</label> 
			<input type="text" name="assigned_job">
		</p>

		<!-- Input field for employee's first name -->
		<p>
			<label for="firstName">First Name:</label> 
			<input type="text" name="firstName">
		</p>

		<!-- Input field for employee's last name -->
		<p>
			<label for="firstName">Last Name:</label> 
			<input type="text" name="lastName">
		</p>

		<!-- Input field for employee's date of birth -->
		<p>
			<label for="firstName">Date of Birth:</label> 
			<input type="date" name="dateOfBirth">
		</p>

		<!-- Input field for employee's email -->
		<p>
			<label for="firstName">Email:</label> 
			<input type="text" name="employee_email">
			<input type="submit" value="Submit" name="insertEmployeeBtn">
		</p>
	</form>

	<!-- This is where the output of the input fields appears. The information is fetched using the getAllEmployee function -->
	<?php $getAllemployee = getAllemployee($pdo); ?>
	<?php foreach ($getAllemployee as $row) { ?>

	<div class="container" style="border-style: solid; width: 50%; height: 300px; margin-top: 20px;">
		<h3>Assigned Job: <?php echo $row['assigned_job']; ?></h3>
		<h3>FirstName: <?php echo $row['first_name']; ?></h3>
		<h3>LastName: <?php echo $row['last_name']; ?></h3>
		<h3>Date Of Birth: <?php echo $row['date_of_birth']; ?></h3>
		<h3>Email: <?php echo $row['employee_email']; ?></h3>
		<h3>Date Added: <?php echo $row['date_added']; ?></h3>

	<!-- This section allows the user to update, delete, and edit existing information. This is where CRUD (Create, Read, Update, Delete) operations apply. -->
		<div class="editAndDelete" style="float: right; margin-right: 20px;">
			<a href="viewprogress.php?employee_id=<?php echo $row['employee_id']; ?>">View Progress</a>
			<a href="editemployee.php?employee_id=<?php echo $row['employee_id']; ?>">Edit</a>
			<a href="deleteemployee.php?employee_id=<?php echo $row['employee_id']; ?>">Delete</a>
		</div>
	</div> 

	<?php } ?>
</body>
</html>
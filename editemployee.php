<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Employee</title>
	<link rel="stylesheet" href="./design/editemployee.css">
</head>
<body>

	<!-- This variable fetch all the information of employee through primary key (employee_id) -->
	<?php $getEmployeeByID =getEmployeeByID($pdo, $_GET['employee_id']); ?>
	
	<!-- Prompt message -->
	<h1>Edit the user</h1>
	<form action="core/handleForms.php?employee_id=<?php echo $_GET['employee_id']; ?>" method="POST">

		<!-- Input field for editing employee's assigned job -->
		<p>
			<label for="assignedJob">Assigned Job: </label> 
			<input type="text" name="assignedJob" value="<?php echo $getEmployeeByID['assigned_job']; ?>">
		</p>

		<!-- Input field for editing employee's first name -->
		<p>
			<label for="firstName">First Name: </label> 
			<input type="text" name="firstName" value="<?php echo $getEmployeeByID['first_name']; ?>">
		</p>

		<!-- Input field for editing last name -->
		<p>
			<label for="lastName">Last Name: </label> 
			<input type="text" name="lastName" value="<?php echo $getEmployeeByID['last_name']; ?>">
		</p>

		<!-- Input field for editing employee's date of birth -->
		<p>
			<label for="dateofBirth">Date of Birth: </label> 
			<input type="date" name="dateOfBirth" value="<?php echo $getEmployeeByID['date_of_birth']; ?>">
		</p>

		<!-- Input field for editing employee's email -->
		<p>
			<label for="employee_email">Email: </label> 
			<input type="text" name="employee_email" value="<?php echo $getEmployeeByID['employee_email']; ?>">
			<input type="submit" value="Submit" name="editEmployeeBtn">
		</p>
		
	</form>
</body>
</html>
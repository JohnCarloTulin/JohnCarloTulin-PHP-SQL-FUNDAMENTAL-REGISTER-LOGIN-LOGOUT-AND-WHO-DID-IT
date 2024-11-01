<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete Employee</title>
	<link rel="stylesheet" href="./design/deleteemployee.css">
</head>
<body>

	<!-- Prompt message -->
	<h1>Are you sure you want to delete this employee?</h1>

	<!-- This is where the employee details are displayed when the user is prompted to confirm deletion -->
	<!-- The information is retrieved through 'getEmployeeByID' function, which requires the pdo and employee_id -->
	<?php $getEmployeeByID = getEmployeeByID($pdo, $_GET['employee_id']); ?>
	<div class="container" style="border-style: solid; height: 400px;">
		<h2>Job To Apply: <?php echo $getEmployeeByID['assigned_job']; ?></h2>
		<h2>First Name: <?php echo $getEmployeeByID['first_name']; ?></h2>
		<h2>Last Name: <?php echo $getEmployeeByID['last_name']; ?></h2>
		<h2>Date Of Birth: <?php echo $getEmployeeByID['date_of_birth']; ?></h2>
		<h2>Skills: <?php echo $getEmployeeByID['employee_email']; ?></h2>
		<h2>Date Added: <?php echo $getEmployeeByID['date_added']; ?></h2>

	<!-- This is the delete button. When activated, it will only delete the information of the specific employee without affecting other data -->
		<div class="deleteBtn" style="float: right; margin-right: 10px;">
			<form action="core/handleForms.php?employee_id=<?php echo $_GET['employee_id']; ?>" method="POST">
				<input type="submit" name="deleteEmployeeBtn" value="Delete">
			</form>			
		</div>	

	</div>
</body>
</html>
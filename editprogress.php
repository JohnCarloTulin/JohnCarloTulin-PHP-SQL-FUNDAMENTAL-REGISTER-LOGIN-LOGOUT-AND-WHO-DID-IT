<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Progress</title>
	<link rel="stylesheet" href="./design/editprogress.css">
</head>
<body>

	<!-- When this is clicked it will go back to view progress site -->
	<a href="viewprogress.php?employee_id=<?php echo $_GET['employee_id']; ?>">View The Progress</a>

	<!-- Prompt message -->
	<h1>Edit the employee progress!</h1>
	
	<!-- Fetch the employee's progress details using the primary key (log_id) -->
	<?php $getProgressByID = getProgressByID($pdo, $_GET['log_id']); ?>

	<!-- his form only modifies the specific progress by specifying the corresponding log_id -->
	<form action="core/handleForms.php?log_id=<?php echo $_GET['log_id']; ?>
	&employee_id=<?php echo $_GET['employee_id']; ?>" method="POST">
		<p>
			<!-- Input form for editing an employee's accomplishment -->
			<label for="firstName">Accomplishment: </label> 
			<input type="text" name="edit_accomplishment" 
			value="<?php echo $getProgressByID['accomplishment_of_employee']; ?>">
		</p>
		<p>
			<!-- Input form for editing an employee's accomplishment description -->
			<label for="firstName">Description: </label> 
			<input type="text" name="edit_description" 
			value="<?php echo $getProgressByID['description_of_accomplishment']; ?>">
			<input type="submit" value="Submit" name="editProgressBtn">
		</p>
	</form>
</body>
</html>
<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete Progress</title>
	<link rel="stylesheet" href="./design/deleteprogress.css">
</head>
<body>
	<!-- This is where the progress details are displayed when the user is prompted to confirm deletion -->
	<!-- The information is retrieved through 'getProgressByID' function, which requires the pdo and log_id -->
	<?php $getProgressByID = getProgressByID($pdo, $_GET['log_id']); ?>
	<h1>Are you sure you want to delete this employee's progress?</h1>
	<div class="container" style="border-style: solid; height: 400px;">
		<h2>Skills Of Applicant: <?php echo $getProgressByID['accomplishment_of_employee'] ?></h2>
		<h2>Description: <?php echo $getProgressByID['description_of_accomplishment'] ?></h2>
		<h2>Applicant Name: <?php echo $getProgressByID['project_owner'] ?></h2>
		<h2>Date Added: <?php echo $getProgressByID['date_added'] ?></h2>

		<!-- This is the delete button. When activated, it will only delete the information of the progress of specific employee without affecting other data -->
		<div class="deleteBtn">
			<form action="core/handleForms.php?log_id=<?php echo $_GET['log_id']; ?>&employee_id=<?php echo $_GET['employee_id']; ?>" method="POST">
				<input type="submit" name="deleteProgressBtn" value="Delete">
			</form>				
		</div>	
	</div>
</body>
</html>
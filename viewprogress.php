<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View Progress</title>
	<link rel="stylesheet" href="./design/viewprogress.css">
</head>
<body>

	<!-- When this is clicked, it will return to the homepage, which is the add employees page -->
	<a href="index.php">Return to home</a>

	<!-- A variable for fetching all information related to a specific employee based on the employee_id indicated in the parameter. -->
	<?php $getAllInfoByEmployeeID = getAllInfoByEmployeeID($pdo, $_GET['employee_id']); ?>

	<!-- This indicates which employee the user is accessing -->
	<h1>Employee Name: <?php echo $getAllInfoByEmployeeID['first_name']. " " . $getAllInfoByEmployeeID['last_name']; ?></h1>
	
	<!-- Prompt message -->
	<h1>Add New Progress</h1>
	<form action="core/handleForms.php?employee_id=<?php echo $_GET['employee_id']; ?>" method="POST">
		
		<!-- Input field for inserting employee's accomplishment -->
		<p>
			<label for="Skills">Accomplishment</label> 
			<input type="text" name="accomplishment">
		</p>
		
		<!-- Input field for inserting employee's accomplishment description -->
		<p>
			<label for="Description">Description</label> 
			<input type="text" name="description">
			<input type="submit" value="Submit" name="insertNewProgressBtn">
		</p>
	</form>

	<!-- This table displays information by iterating through the values of each attribute in specific rows, reflecting the available data in the database -->
	<table>
	  <tr>
	    <th>Log ID</th>
	    <th>Accomplishment</th>
	    <th>Description</th>
	    <th>Created By</th>
		<th>Recorded By</th>
		<th>Date Added</th>
		<th>Last Updated By</th>
	    <th>Date Last Edited</th>
		<th>Actions</th>
	  </tr>
	  <?php $getProgressByEmployee = getProgressByEmployee($pdo, $_GET['employee_id']); ?>
	  <?php foreach ($getProgressByEmployee as $row) { ?>
	  <tr>
	  	<td><?php echo $row['log_id']; ?></td>	  	
	  	<td><?php echo $row['accomplishment_of_employee']; ?></td>	  	
	  	<td><?php echo $row['description_of_accomplishment']; ?></td>	  	
	  	<td><?php echo $row['project_owner']; ?></td>
		<td><?php echo $row['recorded_by']; ?></td>	 	
		<td><?php echo $row['date_added']; ?></td>
		<td><?php echo $row['last_updated_by']; ?></td>	 
		<td><?php echo $row['last_updated']; ?></td>
	  	<td>

	  		<!-- This section contains actions that allow the user to choose whether they want to edit or delete progress -->
	  		<a href="editprogress.php?log_id=<?php echo $row['log_id']; ?>&employee_id=<?php echo $_GET['employee_id']; ?>">Edit</a>
	  		<a href="deleteprogress.php?log_id=<?php echo $row['log_id']; ?>&employee_id=<?php echo $_GET['employee_id']; ?>">Delete</a>
	  	</td>	  	
	  </tr>
	<?php } ?>
	</table>

</body>
</html>
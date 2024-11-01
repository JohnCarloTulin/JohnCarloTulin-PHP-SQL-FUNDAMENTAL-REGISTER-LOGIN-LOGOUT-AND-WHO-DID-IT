<?php  

# Function to insert employees into the database
function insertEmployee($pdo, $assigned_job, $first_name, $last_name, 
	$date_of_birth, $employee_email) {

	$sql = "INSERT INTO bike_store_employees (assigned_job, first_name, last_name, 
		date_of_birth, employee_email) VALUES(?,?,?,?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$assigned_job, $first_name, $last_name, 
		$date_of_birth, $employee_email]);

	if ($executeQuery) {
		return true;
	}
}

# Function to update employee details in the database
function updateEmployee($pdo, $assigned_job, $first_name, $last_name, 
	$date_of_birth, $employee_email, $employee_id) {

	$sql = "UPDATE bike_store_employees
				SET assigned_job = ?,
					first_name = ?,
					last_name = ?,
					date_of_birth = ?, 
					employee_email = ?
				WHERE employee_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$assigned_job, $first_name, $last_name, 
		$date_of_birth, $employee_email, $employee_id]);
	
	if ($executeQuery) {
		return true;
	}

}

# Function to delete employee details from the database
function deleteEmployee($pdo, $employee_id) {
	$deleteEmployeeProg = "DELETE FROM progress_of_employees WHERE employee_id = ?";
	$deleteStmt = $pdo->prepare($deleteEmployeeProg);
	$executeDeleteQuery = $deleteStmt->execute([$employee_id]);

	if ($executeDeleteQuery) {
		$sql = "DELETE FROM bike_store_employees WHERE employee_id = ?";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$employee_id]);

		if ($executeQuery) {
			return true;
		}

	}
	
}

# Function to fetch all information of an employee using their employee ID
function getAllEmployeeID($pdo, $employee_id) {
	$sql = "SELECT * FROM bike_store_employees WHERE employee_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$employee_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}

# Function to fetch all information of an employee
function getAllEmployee($pdo) {
	$sql = "SELECT * FROM bike_store_employees";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

# Function to fetch specific employee information using their ID (employee_id — primary key).
function getEmployeeByID($pdo, $employee_id) {
	$sql = "SELECT * FROM bike_store_employees WHERE employee_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$employee_id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}

# Function to retrieve selected employee information based on the provided SQL query
function getProgressByEmployee($pdo, $employee_id) {
	$sql = "SELECT 
				progress_of_employees.log_id AS log_id,
				progress_of_employees.accomplishment_of_employee AS accomplishment_of_employee,
				progress_of_employees.description_of_accomplishment AS description_of_accomplishment,
				progress_of_employees.recorded_by AS recorded_by,
				progress_of_employees.date_added AS date_added,
				progress_of_employees.last_updated_by AS last_updated_by,
				progress_of_employees.last_updated AS last_updated,
				CONCAT(bike_store_employees.first_name,' ',bike_store_employees.last_name) AS project_owner
			FROM progress_of_employees
			JOIN bike_store_employees ON progress_of_employees.employee_id = bike_store_employees.employee_id
			WHERE progress_of_employees.employee_id = ? 
			GROUP BY progress_of_employees.accomplishment_of_employee;
			";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$employee_id]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

# Function to insert progress into the database. It also includes a default timestamp to capture the current time of data insertion.
function insertProgress($pdo, $employee_email_of_applicant, $description_of_accomplishment, $employee_id, $full_name_manager) {
	date_default_timezone_set('Asia/Singapore');
    $currentTimestamp = date('Y-m-d H:i:s');
	
	$sql = "INSERT INTO progress_of_employees (accomplishment_of_employee, description_of_accomplishment, employee_id, recorded_by, last_updated, last_updated_by) VALUES (?,?,?,?,?,?)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$employee_email_of_applicant, $description_of_accomplishment, $employee_id, $full_name_manager, $currentTimestamp, $full_name_manager]);
	if ($executeQuery) {
		return true;
	}
}

# Function to retrieve selected information of progress based on the specified SQL query. It retrives data from a specific row only.
function getProgressByID($pdo, $employee_id) {
	$sql = "SELECT 
				progress_of_employees.log_id AS log_id,
				progress_of_employees.accomplishment_of_employee AS accomplishment_of_employee,
				progress_of_employees.description_of_accomplishment AS description_of_accomplishment,
				progress_of_employees.date_added AS date_added,
				CONCAT(bike_store_employees.first_name,' ',bike_store_employees.last_name) AS project_owner
			FROM progress_of_employees
			JOIN bike_store_employees ON progress_of_employees.employee_id = bike_store_employees.employee_id
			WHERE progress_of_employees.log_id  = ? 
			GROUP BY progress_of_employees.accomplishment_of_employee";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$employee_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}

# Function to update existing progress within the database
function updateProgress($pdo, $edit_accomplishment, $edit_description, $full_name_manager, $log_id) {
	date_default_timezone_set('Asia/Singapore');
    $currentTimestamp = date('Y-m-d H:i:s');

	$sql = "UPDATE progress_of_employees
			SET accomplishment_of_employee = ?,
				description_of_accomplishment = ?,
				last_updated = ?,
				last_updated_by =?
			WHERE log_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$edit_accomplishment, $edit_description, $currentTimestamp, $full_name_manager, $log_id]);

	if ($executeQuery) {
		return true;
	}
}

# Function to delete existing progress from the database
function deleteProgress($pdo, $log_id) {
	$sql = "DELETE FROM progress_of_employees WHERE log_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$log_id]);
	if ($executeQuery) {
		return true;
	}
}

# Function for fetch all information of employees from the database using the ID (primary key)
function getAllInfoByEmployeeID($pdo, $employee_id) {
	$sql = "SELECT * FROM bike_store_employees WHERE bike_store_employees.employee_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$employee_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}
?>

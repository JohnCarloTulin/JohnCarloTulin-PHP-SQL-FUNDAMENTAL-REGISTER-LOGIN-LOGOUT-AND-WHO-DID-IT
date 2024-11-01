<?php require_once 'dbConfig.php'; ?>
<?php require_once 'functions.php'; ?>
<?php require_once 'models.php'; ?>
<?php require_once 'validate.php'; ?>

<?php  
session_start();

# Implementation for the registration button
if (isset($_POST['regBtn'])) {
	$username = sanitizeInput($_POST['username']);
	$password = $_POST['password'];
    $first_name = sanitizeInput($_POST['first_name']);
    $last_name = sanitizeInput($_POST['last_name']);

	if(empty($username) || empty($password) || empty($first_name) || empty($last_name)) {
		$_SESSION['message'] = "Please make sure the input fields are not empty for registration!";
		header('Location: ../register.php');
	}
	
	else {
		if (validatePassword($password)){
			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
			if(addUser($pdo, $username, $password, $first_name, $last_name)) {
				header('Location: ../login.php');
			}

			else {
				header('Location: ../register.php');
				}
			}
			
		else {
			$_SESSION['message'] = "Password should be more than 8 characters and should contain both uppercase, lowercase, and numbers";
			header("Location: ../register.php");
		}
	}
}

# Implementation for the login button
if (isset($_POST['loginBtn'])) {
	$username = sanitizeInput($_POST['username']);
	$password = $_POST['password'];

	if(empty($username) && empty($password)) {
		echo "<script>
		alert('Input fields are empty!');
		window.location.href='../login.php'
		</script>";
	} 

	else {
		if(login($pdo, $username, $password)) {
			header('Location: ../index.php');
		}
		else {
			header('Location: ../login.php');
		}
	}
	
}

# Implementation for the insert employee button
if (isset($_POST['insertEmployeeBtn'])) {

    // It looks for blank fields and redirect if any are discovered.
    if (empty($_POST['assigned_job']) || empty($_POST['firstName']) || 
        empty($_POST['lastName']) || empty($_POST['dateOfBirth']) || 
        empty($_POST['employee_email'])) {
        
        // If any of the fields are blank, it will return to the form
        header("Location: ../index.php");

		// To stop additional execution
        exit;
    }

    // It will insert data into the database if there are no empty fields and the input fields are filled in.
    $query = insertEmployee(
        $pdo, 
        $_POST['assigned_job'], 
        $_POST['firstName'], 
        $_POST['lastName'], 
        $_POST['dateOfBirth'], 
        $_POST['employee_email']
    );

    if ($query) {
        header("Location: ../index.php");
        exit; // Exit after redirection
    }
	else {
        echo "Insertion failed"; // This message can stay if you want to inform about insertion failure
    }
}

# Implementation for the edit employee button
if (isset($_POST['editEmployeeBtn'])) {
	$query = updateEmployee($pdo, $_POST['assignedJob'], $_POST['firstName'], $_POST['lastName'], 
		$_POST['dateOfBirth'], $_POST['employee_email'], $_GET['employee_id']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Edit failed";;
	}

}

# Implementation for the button in delete employee
if (isset($_POST['deleteEmployeeBtn'])) {
	$query = deleteEmployee($pdo, $_GET['employee_id']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Deletion failed";
	}
}

# Implementation for the button in inserting new progress
if (isset($_POST['insertNewProgressBtn'])) {
	
	if (!empty($_POST['accomplishment']) && !empty($_POST['description']) && !empty($_GET['employee_id'])) {
		$query = insertProgress($pdo, $_POST['accomplishment'], $_POST['description'], $_GET['employee_id'], $_SESSION['full_name']);
	
		if ($query) {
			header("Location: ../viewprogress.php?employee_id=" .$_GET['employee_id']);
		}
		else {
			echo "Insertion failed";
		}
	}
	else {
		echo "Please make sure all input fields are not empty before inserting a new project.";
	}

}

# Implementation for the button in editing employees
if (isset($_POST['editEmployeeBtn'])) {

	if (!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['dateOfBirth']) && !empty($_POST['employee_email']) && !empty($_GET['employee_id'])) {
		$query = updateEmployee($pdo, $_POST['firstName'], $_POST['lastName'], 
		$_POST['dateOfBirth'], $_POST['skills'], $_GET['employee_id']);

		if ($query) {
			header("Location: ../index.php");
		}
		else {
			echo "Edit failed";
		}

	}

	else {
		echo "Make sure no input fields are empty before updating!";
	}

}

# Implementation for the button in editing progress
if (isset($_POST['editProgressBtn'])) {
	
	if (!empty($_POST['edit_accomplishment']) && !empty($_POST['edit_description']) && !empty($_GET['log_id'])) {
		$query = updateProgress($pdo, $_POST['edit_accomplishment'], $_POST['edit_description'], $_SESSION['full_name'], $_GET['log_id']);

		if ($query) {
			header("Location: ../viewprogress.php?employee_id=" .$_GET['employee_id']);
		}	
		else {
			echo "Update failed";
		}
	}

}

# Implementation for the button in deleting progress
if (isset($_POST['deleteProgressBtn'])) {
	$query = deleteProgress($pdo, $_GET['log_id']);

	if ($query) {
		header("Location: ../viewprogress.php?employee_id=" .$_GET['employee_id']);
	}
	else {
		echo "Deletion failed";
	}
}

?>
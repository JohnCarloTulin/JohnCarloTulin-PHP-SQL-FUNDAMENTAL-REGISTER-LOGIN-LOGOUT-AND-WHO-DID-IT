<?php  

# Add user's account to the database.
function addUser($pdo, $username, $password, $first_name, $last_name) {
	$sql = "SELECT * FROM bicycle_manager_login WHERE username=?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$username]);

	if($stmt->rowCount()==0) {
		$sql = "INSERT INTO bicycle_manager_login (username,password,first_name,last_name) VALUES (?,?,?,?)";
		$stmt = $pdo->prepare($sql);
		return $stmt->execute([$username, $password, $first_name, $last_name]);
	}
}

# It verifies if the username and password are stored in the database.
function login($pdo, $username, $password) {
	$query = "SELECT * FROM bicycle_manager_login WHERE username=?";
	$stmt = $pdo->prepare($query);
	$stmt->execute([$username]);

	if($stmt->rowCount() == 1) {
		// Returns associative array
		$row = $stmt->fetch();

		// Store user info as a session variable
		$_SESSION['userInfo'] = $row;

		// Get values from the session variable
		$uid = $row['staff_manager_id'];
		$uname = $row['username'];
		$passHash = $row['password'];
		$fname = $row['first_name'];
		$lname = $row['last_name'];

		// Validate password 
		if(password_verify($password, $passHash)) {
			$_SESSION['staff_manager_id'] = $uid;
			$_SESSION['username'] = $uname;
			$_SESSION['first_name'] = $fname;
			$_SESSION['last_name'] = $lname;
			$_SESSION['full_name'] = $fname . " ". $lname;
			$_SESSION['userLoginStatus'] = 1;
			return true;
		}
		else {
			return false;
		}
	}
}

?>
<?php  

# Function to validate password, ensuring it contains lowercase and uppercase letters, numbers, and meets a minimum length of 8 characters
function validatePassword($password) {
    if (strlen($password) > 8) {
        $hasLower = false;
        $hasUpper = false;
        $hasNumber = false;

        for ($i = 0; $i < strlen($password); $i++) {
            if (ctype_lower($password[$i])) {
                $hasLower = true; 
            } elseif (ctype_upper($password[$i])) {
                $hasUpper = true; 
            } elseif (ctype_digit($password[$i])) {
                $hasNumber = true;
            }

            if ($hasLower && $hasUpper && $hasNumber) {
                return true; 
            }
        }
        return false;
    }
    return false;
}

# Function to sanitize input by using trim, stripslashes, and htmlspecialchars
function sanitizeInput($data) {

  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;

}

?>
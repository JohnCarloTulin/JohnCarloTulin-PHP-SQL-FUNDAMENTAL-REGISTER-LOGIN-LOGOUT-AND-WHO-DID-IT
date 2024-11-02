CREATE TABLE bicycle_manager_login (
  staff_manager_id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(1024),
  password VARCHAR(1024),
  first_name VARCHAR(50),
  last_name VARCHAR(50)
);

CREATE TABLE bike_store_employees (
  employee_id INT AUTO_INCREMENT PRIMARY KEY,
  assigned_job VARCHAR(50),
  first_name VARCHAR(50),
  last_name VARCHAR(50),
  date_of_birth VARCHAR(50),
  employee_email TEXT,
  date_added TIMESTAMP TIMESTAMP DEFAULT CURRENT_TIMESTAMP()
);

CREATE TABLE `progress_of_employees` (
  log_id INT AUTO_INCREMENT PRIMARY KEY,
  accomplishment_of_employee VARCHAR(50),
  description_of_accomplishment TEXT,
  employee_id INT(11),
  date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
  recorded_by VARCHAR(50),
  last_updated_by VARCHAR(50),
  last_updated TIMESTAMP
)

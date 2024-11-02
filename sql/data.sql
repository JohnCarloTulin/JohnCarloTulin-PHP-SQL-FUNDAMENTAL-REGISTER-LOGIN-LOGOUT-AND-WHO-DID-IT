CREATE TABLE `bicycle_manager_login` (
  `staff_manager_id` int(100),
  `username` varchar(1024),
  `password` varchar(1024),
  `first_name` varchar(50),
  `last_name` varchar(50)
);

CREATE TABLE `bike_store_employees` (
  `employee_id` int(30),
  `assigned_job` varchar(50),
  `first_name` varchar(50),
  `last_name` varchar(50),
  `date_of_birth` varchar(50),
  `employee_email` text,
  `date_added` timestamp DEFAULT current_timestamp()
);

CREATE TABLE `progress_of_employees` (
  `log_id` int(11),
  `accomplishment_of_employee` varchar(50),
  `description_of_accomplishment` text,
  `employee_id` int(11),
  `date_added` timestamp DEFAULT current_timestamp(),
  `recorded_by` varchar(50),
  `last_updated_by` varchar(50),
  `last_updated` timestamp
)

CREATE TABLE `bike_store_employees` (
  `employee_id` int(30),
  `assigned_job` varchar(50),
  `first_name` varchar(50),
  `last_name` varchar(50),
  `date_of_birth` varchar(50),
  `employee_email` text,
  `date_added` timestamp DEFAULT current_timestamp()
)
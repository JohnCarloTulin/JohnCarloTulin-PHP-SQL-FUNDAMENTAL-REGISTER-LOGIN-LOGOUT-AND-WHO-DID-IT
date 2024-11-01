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
<?php 

//User Tables//
// User Table Creation

function create_table_users() {
$db_connection = connect_to_db();
$sql = "CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`username` varchar(50) NOT NULL,
`password` varchar(255) NOT NULL,
`email` varchar(100) NOT NULL,
`role` varchar(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $db_connection->query($sql);
if (!$result) {
die("Table creation failed: " . $db_connection->error);
}
echo "Table creation succeeded: users<br>";
}

// User Details Table Creation 
function create_table_user_details() {
$db_connection = connect_to_db();
$sql = "CREATE TABLE IF NOT EXISTS `user_details` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`user_id` int(11) NOT NULL,
`detail_key` varchar(255) NOT NULL,
`detail_value` varchar(255) NOT NULL,
`date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
`added_by_user_id` int(11) NOT NULL,
PRIMARY KEY (`id`),
FOREIGN KEY (`user_id`) REFERENCES `users`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $db_connection->query($sql);
if (!$result) {
die("Table creation failed: " . $db_connection->error);
}
echo "Table creation succeeded: user_details<br>";
}

//Job Tables//

// Job Table Creation
function create_table_jobs() {
$db_connection = connect_to_db();
$sql = "CREATE TABLE IF NOT EXISTS `jobs` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`job_number` varchar(50) NOT NULL,
`customer_id` int(11) NOT NULL,
`start_date` date NOT NULL,
`end_date` date NOT NULL,
`status` varchar(50) NOT NULL,
`notes` text,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $db_connection->query($sql);
if (!$result) {
die("Table creation failed: " . $db_connection->error);
}
echo "Table creation succeeded: jobs<br>";
}

// Job Details Table Creation 
function create_table_job_details() {
$db_connection = connect_to_db();
$sql = "CREATE TABLE IF NOT EXISTS `job_details` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`job_id` int(11) NOT NULL,
`detail_key` varchar(255) NOT NULL,
`detail_value` varchar(255) NOT NULL,
`date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
`added_by_user_id` int(11) NOT NULL,
PRIMARY KEY (`id`),
FOREIGN KEY (`job_id`) REFERENCES `jobs`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $db_connection->query($sql);
if (!$result) {
die("Table creation failed: " . $db_connection->error);
}
echo "Table creation succeeded: job_details<br>";
}

// Note Table Creation 
function create_table_notes() {
$db_connection = connect_to_db();
$sql = "CREATE TABLE IF NOT EXISTS `notes` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`note` text NOT NULL,
`date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
`user_id` int(11) NOT NULL,
`job_id` int(11) DEFAULT NULL,
`customer_id` int(11) DEFAULT NULL,
`employee_id` int(11) DEFAULT NULL,
`supplier_id` int(11) DEFAULT NULL,
`subcontractor_id` int(11) DEFAULT NULL,
`bid_id` int(11) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $db_connection->query($sql);
if (!$result) {
die("Table creation failed: " . $db_connection->error);
}
echo "Table creation succeeded: notes<br>";
}


//File Tables//

// Files Table Creation 
function create_table_files() {
$db_connection = connect_to_db();
$sql = "CREATE TABLE IF NOT EXISTS `files` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`filename` varchar(255) NOT NULL,
`filetype` varchar(100) NOT NULL,
`filepath` varchar(255) NOT NULL,
`associated_entity_id` int(11) NOT NULL,
`associated_entity_type` varchar(100) NOT NULL,
`uploaded_by_user_id` int(11) NOT NULL,
`uploaded_on_datetime` datetime NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $db_connection->query($sql);
if (!$result) {
die("Table creation failed: " . $db_connection->error);
}
echo "Table creation succeeded: files<br>";
}

// File Details Table Creation 
function create_table_file_details() {
$db_connection = connect_to_db();
$sql = "CREATE TABLE IF NOT EXISTS `file_details` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`file_id` int(11) NOT NULL,
`detail_key` varchar(255) NOT NULL,
`detail_value` varchar(255) NOT NULL,
`date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
`added_by_user_id` int(11) NOT NULL,
PRIMARY KEY (`id`),
FOREIGN KEY (`file_id`) REFERENCES `files`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $db_connection->query($sql);
if (!$result) {
die("Table creation failed: " . $db_connection->error);
}
echo "Table creation succeeded: file_details<br>";
}

//Customer Tables//

// Customer Table Creation
function create_table_customers() {
$db_connection = connect_to_db();
$sql = "CREATE TABLE IF NOT EXISTS `customers` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`title` varchar(100) NOT NULL,
`first` varchar(100) NOT NULL,
`last` varchar(100) NOT NULL,
`address` varchar(255) NOT NULL,
`city` varchar(50) NOT NULL,
`state` varchar(250) NOT NULL,
`zip` varchar(10) NOT NULL,
`phone` varchar(20) NOT NULL,
`email` varchar(100) NOT NULL,
`salesperson_id` int(11) DEFAULT NULL,
`date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
`added_by_user_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $db_connection->query($sql);
if (!$result) {
die("Table creation failed: " . $db_connection->error);
}
echo "Table creation succeeded: customers<br>";
}

// Customer Contacts Table Creation
function create_table_customer_contacts() {
$db_connection = connect_to_db();
$sql = "CREATE TABLE IF NOT EXISTS `customer_contacts` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`customer_id` int(11) NOT NULL,
`title` varchar(100) NOT NULL,
`first` varchar(100) NOT NULL,
`last` varchar(100) NOT NULL,
`address` varchar(255) NOT NULL,
`city` varchar(250) NOT NULL,
`state` varchar(50) NOT NULL,
`zip` varchar(10) NOT NULL,
`contact_phone` varchar(20) DEFAULT NULL,
`contact_email` varchar(100) DEFAULT NULL,
PRIMARY KEY (`id`),
FOREIGN KEY (`customer_id`) REFERENCES `customers`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $db_connection->query($sql);
if (!$result) {
die("Table creation failed: " . $db_connection->error);
}
echo "Table creation succeeded: customer_contacts<br>";
}

// Customer Details Table Creation 
function create_table_customer_details() {
$db_connection = connect_to_db();
$sql = "CREATE TABLE IF NOT EXISTS `customer_details` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`customer_id` int(11) NOT NULL,
`detail_key` varchar(255) NOT NULL,
`detail_value` varchar(255) NOT NULL,
`date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
`added_by_user_id` int(11) NOT NULL,
PRIMARY KEY (`id`),
FOREIGN KEY (`customer_id`) REFERENCES `customers`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $db_connection->query($sql);
if (!$result) {
die("Table creation failed: " . $db_connection->error);
}
echo "Table creation succeeded: customer_details<br>";
}


//Employee Tables//

// Employees Table Creation
function create_table_employees() {
$db_connection = connect_to_db();
$sql = "CREATE TABLE IF NOT EXISTS employees (
id int(11) NOT NULL AUTO_INCREMENT,
first_name varchar(255) NOT NULL,
last_name varchar(255) NOT NULL,
email varchar(255) NOT NULL,
phone_number varchar(255) NOT NULL,
address varchar(255) NOT NULL,
date_added datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
added_by_user_id int(11) NOT NULL,
PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $db_connection->query($sql);
if (!$result) {
die("Table creation failed: " . $db_connection->error);
}
echo "Table creation succeeded: employees<br>";
}

// Employee Details Table Creation
function create_table_employee_details() {
$db_connection = connect_to_db();
$sql = "CREATE TABLE IF NOT EXISTS employee_details (
id int(11) NOT NULL AUTO_INCREMENT,
employee_id int(11) NOT NULL,
detail_key varchar(255) NOT NULL,
detail_value varchar(255) NOT NULL,
date_added datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
added_by_user_id int(11) NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (employee_id) REFERENCES employees(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $db_connection->query($sql);
if (!$result) {
die("Table creation failed: " . $db_connection->error);
}
echo "Table creation succeeded: employee_details<br>";
}

// Employee Contacts Table Creation
function create_table_employee_contacts() {
$db_connection = connect_to_db();
$sql = "CREATE TABLE IF NOT EXISTS `employee_contacts` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`employee_id` int(11) NOT NULL,
`title` varchar(100) NOT NULL,
`first` varchar(100) NOT NULL,
`last` varchar(100) NOT NULL,
`address` varchar(255) NOT NULL,
`city` varchar(250) NOT NULL,
`state` varchar(50) NOT NULL,
`zip` varchar(10) NOT NULL,
`contact_phone` varchar(20) DEFAULT NULL,
`contact_email` varchar(100) DEFAULT NULL,
PRIMARY KEY (`id`),
FOREIGN KEY (`employee_id`) REFERENCES `employees`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $db_connection->query($sql);
if (!$result) {
die("Table creation failed: " . $db_connection->error);
}
echo "Table creation succeeded: employee_contacts<br>";
}


//Supplier Tables//

// Suppliers Table Creation
function create_table_suppliers() {
$db_connection = connect_to_db();
$sql = "CREATE TABLE IF NOT EXISTS `suppliers` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(255) NOT NULL,
`email` varchar(255) NOT NULL,
`phone` varchar(20) NOT NULL,
`address` varchar(255) NOT NULL,
`created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
`created_by_user_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $db_connection->query($sql);
if (!$result) {
die("Table creation failed: " . $db_connection->error);
}
echo "Table creation succeeded: suppliers<br>";
}

// Supplier Details Table Creation
function create_table_supplier_details() {
$db_connection = connect_to_db();
$sql = "CREATE TABLE IF NOT EXISTS `supplier_details` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`supplier_id` int(11) NOT NULL,
`detail_key` varchar(255) NOT NULL,
`detail_value` varchar(255) NOT NULL,
`date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
`added_by_user_id` int(11) NOT NULL,
PRIMARY KEY (`id`),
FOREIGN KEY (`supplier_id`) REFERENCES `suppliers`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $db_connection->query($sql);
if (!$result) {
die("Table creation failed: " . $db_connection->error);
}
echo "Table creation succeeded: supplier_details<br>";
}

// Supplier Contacts Table Creation
function create_table_supplier_contacts() {
$db_connection = connect_to_db();
$sql = "CREATE TABLE IF NOT EXISTS `supplier_contacts` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`supplier_id` int(11) NOT NULL,
`title` varchar(100) NOT NULL,
`first` varchar(100) NOT NULL,
`last` varchar(100) NOT NULL,
`address` varchar(255) NOT NULL,
`city` varchar(250) NOT NULL,
`state` varchar(50) NOT NULL,
`zip` varchar(10) NOT NULL,
`contact_phone` varchar(20) DEFAULT NULL,
`contact_email` varchar(100) DEFAULT NULL,
PRIMARY KEY (`id`),
FOREIGN KEY (`supplier_id`) REFERENCES `suppliers`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $db_connection->query($sql);
if (!$result) {
die("Table creation failed: " . $db_connection->error);
}
echo "Table creation succeeded: supplier_contacts<br>";
}

//Sub-Contractor Tables//

// Sub-Contractors Table Creation
function create_table_sub_contractors() {
$db_connection = connect_to_db();
$sql = "CREATE TABLE IF NOT EXISTS `sub_contractors` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(255) NOT NULL,
`address` varchar(255) NOT NULL,
`city` varchar(250) NOT NULL,
`state` varchar(50) NOT NULL,
`zip` varchar(10) NOT NULL,
`phone` varchar(20) DEFAULT NULL,
`email` varchar(100) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $db_connection->query($sql);
if (!$result) {
die("Table creation failed: " . $db_connection->error);
}
echo "Table creation succeeded: sub_contractors<br>";
}

// Sub-Contractor Details Table Creation
function create_table_sub_contractor_details() {
$db_connection = connect_to_db();
$sql = "CREATE TABLE IF NOT EXISTS `sub_contractor_details` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`sub_contractor_id` int(11) NOT NULL,
`detail_key` varchar(255) NOT NULL,
`detail_value` varchar(255) NOT NULL,
`date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
`added_by_user_id` int(11) NOT NULL,
PRIMARY KEY (`id`),
FOREIGN KEY (`sub_contractor_id`) REFERENCES `sub_contractors`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $db_connection->query($sql);
if (!$result) {
die("Table creation failed: " . $db_connection->error);
}
echo "Table creation succeeded: sub_contractor_details<br>";
}

// Sub-Contractor Contacts Table Creation
function create_table_sub_contractor_contacts() {
$db_connection = connect_to_db();
$sql = "CREATE TABLE IF NOT EXISTS `sub_contractor_contacts` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`sub_contractor_id` int(11) NOT NULL,
`title` varchar(100) NOT NULL,
`first` varchar(100) NOT NULL,
`last` varchar(100) NOT NULL,
`address` varchar(255) NOT NULL,
`city` varchar(250) NOT NULL,
`state` varchar(50) NOT NULL,
`zip` varchar(10) NOT NULL,
`contact_phone` varchar(20) DEFAULT NULL,
`contact_email` varchar(100) DEFAULT NULL,
PRIMARY KEY (`id`),
FOREIGN KEY (`sub_contractor_id`) REFERENCES `sub_contractors`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $db_connection->query($sql);
if (!$result) {
die("Table creation failed: " . $db_connection->error);
}
echo "Table creation succeeded: sub_contractor_contacts<br>";
}


//MONEY BANK TAbles//

// Banks table creation
function create_table_banks() {
$db_connection = connect_to_db();
$sql = "CREATE TABLE IF NOT EXISTS banks (
id int(11) NOT NULL AUTO_INCREMENT,
bank_name varchar(255) NOT NULL,
routing_number varchar(255) NOT NULL,
account_number varchar(255) NOT NULL,
date_opened datetime NOT NULL,
account_type varchar(255) NOT NULL,
PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $db_connection->query($sql);
if (!$result) {
die("Table creation failed: " . $db_connection->error);
}
echo "Table creation succeeded: banks<br>";
}

// Bank Details Table Creation
function create_table_bank_details() {
$db_connection = connect_to_db();
$sql = "CREATE TABLE IF NOT EXISTS bank_details (
id int(11) NOT NULL AUTO_INCREMENT,
bank_id int(11) NOT NULL,
detail_key varchar(255) NOT NULL,
detail_value varchar(255) NOT NULL,
date_added datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
added_by_user_id int(11) NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (bank_id) REFERENCES banks(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $db_connection->query($sql);
if (!$result) {
die("Table creation failed: " . $db_connection->error);
}
echo "Table creation succeeded: bank_details<br>";
}

// Bank Contacts Table Creation
function create_table_bank_contacts() {
$db_connection = connect_to_db();
$sql = "CREATE TABLE IF NOT EXISTS bank_contacts (
id int(11) NOT NULL AUTO_INCREMENT,
bank_id int(11) NOT NULL,
title varchar(100) NOT NULL,
first_name varchar(100) NOT NULL,
last_name varchar(100) NOT NULL,
address varchar(255) NOT NULL,
city varchar(250) NOT NULL,
state varchar(50) NOT NULL,
zip varchar(10) NOT NULL,
contact_phone varchar(20) DEFAULT NULL,
contact_email varchar(100) DEFAULT NULL,
PRIMARY KEY (id),
FOREIGN KEY (bank_id) REFERENCES banks(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $db_connection->query($sql);
if (!$result) {
die("Table creation failed: " . $db_connection->error);
}
echo "Table creation succeeded: bank_contacts<br>";
}

//Transaction tables
function create_table_bank_transactions() {
$db_connection = connect_to_db();
$sql = "CREATE TABLE IF NOT EXISTS `bank_transactions` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`bank_id` int(11) NOT NULL,
`transaction_type` varchar(50) NOT NULL,
`check_transaction_id` varchar(50) NOT NULL,
`amount` decimal(10,2) NOT NULL,
`date` date NOT NULL,
PRIMARY KEY (`id`),
FOREIGN KEY (`bank_id`) REFERENCES `banks`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $db_connection->query($sql);
if (!$result) {
die("Table creation failed: " . $db_connection->error);
}
echo "Table creation succeeded: bank_transactions<br>";
}

// Inventory table
function create_table_inventory() {
$db_connection = connect_to_db();
$sql = "CREATE TABLE IF NOT EXISTS `inventory` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`job_id` int(11) NOT NULL,
`product_name` varchar(255) NOT NULL,
`product_description` text,
`quantity` int(11) NOT NULL,
`unit_price` decimal(10,2) NOT NULL,
`date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
`added_by_user_id` int(11) NOT NULL,
PRIMARY KEY (`id`),
FOREIGN KEY (`job_id`) REFERENCES `jobs`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $db_connection->query($sql);
if (!$result) {
die("Table creation failed: " . $db_connection->error);
}
echo "Table creation succeeded: inventory<br>";
}

//Pricing Tables//

// Pricing Table Creation
function create_table_pricing() {
$db_connection = connect_to_db();
$sql = "CREATE TABLE IF NOT EXISTS `pricing` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`product_id` int(11) NOT NULL,
`unit_price` decimal(10,2) NOT NULL,
`date_effective` date NOT NULL,
`date_expired` date DEFAULT NULL,
`added_by_user_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $db_connection->query($sql);
if (!$result) {
die("Table creation failed: " . $db_connection->error);
}
echo "Table creation succeeded: pricing<br>";
}

// Price Details Table Creation
function create_table_price_details() {
$db_connection = connect_to_db();
$sql = "CREATE TABLE IF NOT EXISTS `price_details` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`item_id` int(11) NOT NULL,
`detail_key` varchar(255) NOT NULL,
`detail_value` varchar(255) NOT NULL,
`date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
`added_by_user_id` int(11) NOT NULL,
PRIMARY KEY (`id`),
FOREIGN KEY (`item_id`) REFERENCES `pricing`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $db_connection->query($sql);
if (!$result) {
die("Table creation failed: " . $db_connection->error);
}
echo "Table creation succeeded: price_details<br>";
}

// Bids Table Creation
function create_table_bids() {
$db_connection = connect_to_db();
$sql = "CREATE TABLE IF NOT EXISTS `bids` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`customer_id` int(11) NOT NULL,
`user_id` int(11) NOT NULL,
`bid_amount` decimal(10,2) NOT NULL,
`status` enum('active', 'accepted', 'declined') NOT NULL DEFAULT 'active',
`date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
`last_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $db_connection->query($sql);
if (!$result) {
die("Table creation failed: " . $db_connection->error);
}
echo "Table creation succeeded: bids<br>";
}

// Bid Items Table Creation
function create_table_bid_items() {
$db_connection = connect_to_db();
$sql = "CREATE TABLE IF NOT EXISTS `bid_items` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`bid_id` int(11) NOT NULL,
`price_id` int(11) NOT NULL,
`name` varchar(255) NOT NULL,
`description` text,
`unit_price` decimal(10,2) NOT NULL,
`units` decimal(10,2) NOT NULL,
`date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
`added_by_user_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $db_connection->query($sql);
if (!$result) {
die("Table creation failed: " . $db_connection->error);
}
echo "Table creation succeeded: bid_items<br>";
}

// Expense Categories Table Creation
function create_table_expense_categories() {
$db_connection = connect_to_db();
$sql = "CREATE TABLE IF NOT EXISTS `expense_categories` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(255) NOT NULL,
`description` text,
`date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
`added_by_user_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $db_connection->query($sql);
if (!$result) {
die("Table creation failed: " . $db_connection->error);
}
echo "Table creation succeeded: expense_categories<br>";
}

// Expenses Table Creation
function create_table_expenses() {
$db_connection = connect_to_db();
$sql = "CREATE TABLE IF NOT EXISTS `expenses` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`job_id` int(11) NOT NULL,
`expense_category_id` int(11) NOT NULL,
`amount` decimal(10,2) NOT NULL,
`description` text,
`date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
`added_by_user_id` int(11) NOT NULL,
PRIMARY KEY (`id`),
FOREIGN KEY (`job_id`) REFERENCES `jobs`(`id`) ON DELETE CASCADE,
FOREIGN KEY (`expense_category_id`) REFERENCES `expense_categories`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $db_connection->query($sql);
if (!$result) {
die("Table creation failed: " . $db_connection->error);
}
echo "Table creation succeeded: expenses<br>";
}

// Payroll Table Creation
function create_table_payroll() {
$db_connection = connect_to_db();
$sql = "CREATE TABLE IF NOT EXISTS `payroll` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`employee_id` int(11) NOT NULL,
`amount` decimal(10,2) NOT NULL,
`pay_date` date NOT NULL,
`added_by_user_id` int(11) NOT NULL,
PRIMARY KEY (`id`),
FOREIGN KEY (`employee_id`) REFERENCES `employees`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $db_connection->query($sql);
if (!$result) {
die("Table creation failed: " . $db_connection->error);
}
echo "Table creation succeeded: payroll<br>";
}

// Hours Table Creation
function create_table_hours() {
$db_connection = connect_to_db();
$sql = "CREATE TABLE IF NOT EXISTS `hours` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`employee_id` int(11) NOT NULL,
`hours_worked` decimal(10,2) NOT NULL,
`work_date` date NOT NULL,
`added_by_user_id` int(11) NOT NULL,
PRIMARY KEY (`id`),
FOREIGN KEY (`employee_id`) REFERENCES `employees`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $db_connection->query($sql);
if (!$result) {
die("Table creation failed: " . $db_connection->error);
}
echo "Table creation succeeded: hours<br>";
}

// Schedules Table Creation
function create_table_schedules() {
$db_connection = connect_to_db();
$sql = "CREATE TABLE IF NOT EXISTS `schedules` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`employee_id` int(11) NOT NULL,
`start_time` time NOT NULL,
`end_time` time NOT NULL,
`schedule_date` date NOT NULL,
`added_by_user_id` int(11) NOT NULL,
PRIMARY KEY (`id`),
FOREIGN KEY (`employee_id`) REFERENCES `employees`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $db_connection->query($sql);
if (!$result) {
die("Table creation failed: " . $db_connection->error);
}
echo "Table creation succeeded: schedules<br>";
}

// Job Progression Table Creation
function create_table_job_progression() {
$db_connection = connect_to_db();
$sql = "CREATE TABLE IF NOT EXISTS `job_progression` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`job_id` int(11) NOT NULL,
`progression_description` text NOT NULL,
`date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
`added_by_user_id` int(11) NOT NULL,
PRIMARY KEY (`id`),
FOREIGN KEY (`job_id`) REFERENCES `jobs`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $db_connection->query($sql);
if (!$result) {
die("Table creation failed: " . $db_connection->error);
}
echo "Table creation succeeded: job_progression<br>";
}

// Tax Rates Table Creation
function create_table_tax_rates() {
$db_connection = connect_to_db();
$sql = "CREATE TABLE IF NOT EXISTS `tax_rates` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`tax_rate` decimal(10,2) NOT NULL,
`state` varchar(255) NOT NULL,
`county` varchar(255),
`city` varchar(255),
`zip_code` varchar(255),
`added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
`added_by_user_id` int(11) NOT NULL,
`effective_date` date NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $db_connection->query($sql);
if (!$result) {
die("Table creation failed: " . $db_connection->error);
}
echo "Table creation succeeded: tax_rates<br>";
}

// Invoicing Table Creation
function create_table_invoicing_items() {
$db_connection = connect_to_db();
$sql = "CREATE TABLE IF NOT EXISTS `invoicing_items` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`invoicing_id` int(11) NOT NULL,
`description` varchar(255) NOT NULL,
`quantity` int(11) NOT NULL,
`unit_price` decimal(10,2) NOT NULL,
`subtotal` decimal(10,2) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $db_connection->query($sql);
if (!$result) {
die("Table creation failed: " . $db_connection->error);
}
echo "Table creation succeeded: invoicing_items<br>";
}

//Itemized Invoicing 
function create_table_invoicing() {
$db_connection = connect_to_db();
$sql = "CREATE TABLE IF NOT EXISTS `invoicing` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`job_id` int(11) NOT NULL,
`customer_id` int(11) NOT NULL,
`subtotal` decimal(10,2) NOT NULL,
`tax_rate` decimal(10,2) NOT NULL,
`tax` decimal(10,2) NOT NULL,
`total` decimal(10,2) NOT NULL,
`date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
`created_by_user_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $db_connection->query($sql);
if (!$result) {
die("Table creation failed: " . $db_connection->error);
}
echo "Table creation succeeded: invoicing<br>";
}








function int_build_db() { 
$db_tables = array(
    "create_table_users",
    "create_table_user_details",
    "create_table_jobs",
    "create_table_job_details",
    "create_table_notes",
    "create_table_files",
    "create_table_file_details",
    "create_table_customers",
    "create_table_customer_contacts",
    "create_table_customer_details",
    "create_table_employees",
    "create_table_employee_details",
    "create_table_employee_contacts",
    "create_table_suppliers",
    "create_table_supplier_details",
    "create_table_supplier_contacts",
    "create_table_sub_contractors",
    "create_table_sub_contractor_details",
    "create_table_sub_contractor_contacts",
    "create_table_banks",
    "create_table_bank_details",
    "create_table_bank_contacts",
    "create_table_bank_transactions",
    "create_table_inventory",
    "create_table_pricing",
    "create_table_price_details",
    "create_table_bids",
    "create_table_bid_items",
    "create_table_expense_categories",
    "create_table_expenses",
    "create_table_payroll",
    "create_table_hours",
    "create_table_schedules",
    "create_table_job_progression",
    "create_table_tax_rates",
    "create_table_invoicing_items",
    "create_table_invoicing"
);
foreach ($db_tables as $table) {
    if (strpos($table, 'create_table_') === 0) {
      call_user_func($table);
    }
}
}
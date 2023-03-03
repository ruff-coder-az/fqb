<?php
// Create a new database
function create_database($database_name) {
$mysqli = connect_to_dbs();
// Check if connection was successful
if ($mysqli->connect_errno) {
echo "<p>Failed to connect to MySQL Server: " . $mysqli->connect_error . "</p>";
return false;
}
// Check if the database already exists
$result = $mysqli->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$database_name'");
if ($result->num_rows > 0) {
return false;
}
// Create the database
if (!$mysqli->query("CREATE DATABASE $database_name")) {
//  echo "<p>Failed to create database: " . $mysqli->error . "</p>";
return false;
}
// Close database connection
$mysqli->close();
return true;
}

// Create a new table
function create_table($table_name, $columns) {
$mysqli = connect_to_db();

// Check if connection was successful
if ($mysqli->connect_errno) {
echo "<p>Failed to connect to MySQL Server: " . $mysqli->connect_error . "</p>";
return false;
}
// Construct the SQL query
$sql = "CREATE TABLE $table_name (";
foreach ($columns as $column) {
$sql .= "$column, ";
}
$sql = rtrim($sql, ", ");
$sql .= ")";
// Create the table
if (!$mysqli->query($sql)) {
echo "<p>Failed to create table: " . $mysqli->error . "</p>";
return false;
}
// Close database connection
$mysqli->close();
return true;
}



?>
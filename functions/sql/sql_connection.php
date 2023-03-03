<?php 

// Connect to MySQL database
function connect_to_dbs(){
global $db_connect;
$db_connection = new mysqli($db_connect['SERVER-IP'], $db_connect['USER'], $db_connect['PASSWORD']);
return $db_connection;
}
function connect_to_db(){
global $db_connect;
$db_connection = new mysqli($db_connect['SERVER-IP'], $db_connect['USER'], $db_connect['PASSWORD'],$db_connect['DATABASE']);
return $db_connection;
}
// Test connection to database server
function test_dbs_connection() {
    global $db_connect;
$mysqli = connect_to_dbs();
// Check if connection was successful
if ($mysqli->connect_errno) {
echo "<p>Failed to connect to MySQL Server: " . $mysqli->connect_error . "</p>";
} else {
    setup_database();
return '1';
}
// Close database connection
$mysqli->close();
}
?>
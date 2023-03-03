<?php

require_once '../config/global_arrays.php';
require_once 'sql.php';
require_once 'functions.php';

// Get the form data
$username = $_POST['add-username'];
$password = $_POST['add-password'];
$email = $_POST['add-email'];
$role = $_POST['add-role'];

// Add the user to the database
$result = add_user($username, $password, $email, $role);

// Send a response back to the client
if ($result) {
  echo "User added successfully";
} else {
  echo "Failed to add user";
}
?>

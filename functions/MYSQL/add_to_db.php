<?php 

function addRecord_to_db($table, $record) {
    // Establish database connection
    $mysqli = connect_to_db();
    
    // Check if connection was successful
    if ($mysqli->connect_errno) {
        // Connection error
        error_log("Failed to connect to MySQL: " . $mysqli->connect_error);
        return false;
    }
    
    // Prepare the SQL statement using a prepared statement
    $stmt = $mysqli->prepare("INSERT INTO $table VALUES (?)");
    if (!$stmt) {
        // SQL query error
        error_log("Failed to prepare SQL statement: " . $mysqli->error);
        $mysqli->close();
        return false;
    }
    
    // Bind the record parameter to the prepared statement
    $stmt->bind_param("s", $record);
    
    // Execute the prepared statement
    if (!$stmt->execute()) {
        // SQL query error
        error_log("Failed to execute SQL statement: " . $stmt->error);
        $stmt->close();
        $mysqli->close();
        return false;
    }
    
    // Close the prepared statement and database connection
    $stmt->close();
    $mysqli->close();
    
    // Return success
    return true;
}


function addUsers($u) { 
    global $user;
    $user_record = "('".$u['username']."','". $u['email']."','". $u['password']."','".$u['role']."')";
    $user_result = addRecord_to_db("users", $user_record);
    if ($user_result) {
        $user_id = mysqli_insert_id(connect_to_db());
        return $user_id;
    } else {
        return "error";
    }
}

function addUsers_details($id,$item) { 
    global $user;

    $details_record = "($id, '$item[details_key]', '$item[details_value]', NOW(), $user[id])";
        $details_result = addRecord_to_db("user_details", $details_record);
        if ($details_result) {
            return true;
        } else {
            return "error";
        }

}

function handle_form_data($valid_forms) {
    // Get all the data from $_POST
    $data = $_POST;

    // Sanitize the data to prevent injection attacks
    foreach ($data as $key => $value) {
        $data[$key] = htmlspecialchars(strip_tags(trim($value)));
    }

    // Check for the form id and build arrays based on valid forms
    foreach ($data as $key => $value) {
        $form_id = explode('_', $key)[0];

        if (in_array($form_id, $valid_forms)) {
            ${$form_id}[$key] = $value;
        } else {
            echo "Invalid form: $form_id<br>";
        }
    }

    // Return the arrays
    return compact($valid_forms);
}
$valid_forms = array('login', 'addUSER', 'addCUSTOMER');
$form_data = handle_form_data($valid_forms);
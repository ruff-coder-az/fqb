<?php
// Adds a form entry to the db
function addForm($name, $details, $access_lvl, $added_by) {
    // Escape the input parameters to prevent SQL injection
    $name = mysqli_real_escape_string(connect_to_db(), $name);
    $details = mysqli_real_escape_string(connect_to_db(), $details);
    $access_lvl = mysqli_real_escape_string(connect_to_db(), $access_lvl);
    $added_by = mysqli_real_escape_string(connect_to_db(), $added_by);
    
    // Construct the SQL query
    $query = "INSERT INTO app_forms (name, details, access_lvl, created, added_by) 
              VALUES ('$name', '$details', '$access_lvl', NOW(), '$added_by')";
    
    // Execute the query
    $result = mysqli_query(connect_to_db(), $query);
    
    // Check if the query was successful
    if (!$result) {
        error_log("Failed to add form to database: " . mysqli_error(connect_to_db()));
        return false;
    }
    
    // Return the ID of the inserted record
    return mysqli_insert_id(connect_to_db());
}
?>
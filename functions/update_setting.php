<?php
require_once '../config/global_arrays.php';
require_once 'sql.php';
require_once 'functions.php';

if (isset($_POST['id']) && isset($_POST['setting_value'])) {
    $id = (int) $_POST['id'];
    $key = $_POST['label'];
    $setting_value = mysqli_real_escape_string(connect_to_db(), $_POST['setting_value']);
    
    // Update the setting value in the database
    $mysqli = connect_to_db();
    $query = "UPDATE settings SET setting_value = '$setting_value' WHERE id = $id";
    $result = $mysqli->query($query);
    
    if ($result) {
        // Success
        echo $key . " updated successfully";
    } else {
        // Error
        echo "Error updating setting";
    }
}
?>

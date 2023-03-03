<?php 
//addBankRecord('Aqua Essence Pools', '1', '1', '2005-01-01', 'Cash');
//addBankRecord('Wells Fargo', '122105278', '3087711309', '2005-01-01', 'Checking');
//addBankRecord('Chase', '122100024', '853725718', '2005-01-01', 'Checking');

// Adds Accounts to track money
function addBankRecord($bank_name, $routing_number, $account_number, $date_opened, $account_type) {
    // Establish database connection
    $mysqli = connect_to_db();

    // Check if connection was successful
    if ($mysqli->connect_errno) {
        // Connection error
        error_log("Failed to connect to MySQL: " . $mysqli->connect_error);
        return false;
    }

    // Prepare the SQL statement using a prepared statement
    $stmt = $mysqli->prepare("INSERT INTO banks (bank_name, routing_number, account_number, date_opened, account_type) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
        // SQL query error
        error_log("Failed to prepare SQL statement: " . $mysqli->error);
        $mysqli->close();
        return false;
    }

    // Bind the parameters to the prepared statement
    $stmt->bind_param("sssss", $bank_name, $routing_number, $account_number, $date_opened, $account_type);

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
?>
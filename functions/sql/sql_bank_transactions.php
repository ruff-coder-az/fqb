<?php 
// Add Transactions to accounts 
function addBankTransaction($bank_id, $transaction_type, $check_transaction_id, $amount, $date) {
    // Establish database connection
    $mysqli = connect_to_db();

    // Check if connection was successful
    if ($mysqli->connect_errno) {
        // Connection error
        error_log("Failed to connect to MySQL: " . $mysqli->connect_error);
        return false;
    }

    // Prepare the SQL statement using a prepared statement
    $stmt = $mysqli->prepare("INSERT INTO bank_transactions (bank_id, transaction_type, check_transaction_id, amount, date) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
        // SQL query error
        error_log("Failed to prepare SQL statement: " . $mysqli->error);
        $mysqli->close();
        return false;
    }

    // Bind the parameters to the prepared statement
    $stmt->bind_param("issss", $bank_id, $transaction_type, $check_transaction_id, $amount, $date);

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

//addBankTransaction(1, 'deposit', '123456', 100.00, '2023-03-02');
?>
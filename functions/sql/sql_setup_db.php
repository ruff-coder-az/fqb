<?php
function setup_database() {
    create_database('app_db');
    // Check if the settings table exists
    $mysqli = connect_to_db();
    $result = $mysqli->query("SHOW TABLES LIKE 'settings'");
    if ($result->num_rows == 0) {
    // Create the settings table
    $columns = array(
    "id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY",
    "setting_key VARCHAR(30) NOT NULL",
    "setting_value VARCHAR(30) NOT NULL"
    );
    if (!create_table("settings", $columns)) {
    echo "<p>Failed to create settings table</p>";
    return false;
    }
    // Insert some default settings
    $settings = array(
    array("site_name", "My Site"),
    array("site_description", "Welcome to my site!"),
    array("contact_email", "contact@example.com")
    );
    // Add array data for settings
    foreach ($settings as $setting) {
    $key = $setting[0];
    $value = $setting[1];
    $sql = "INSERT INTO settings (setting_key, setting_value) VALUES ('$key', '$value')";
    if (!$mysqli->query($sql)) {
    echo "<p>Failed to insert default setting: " . $mysqli->error . "</p>";
    return false;
    }
    }
    }
    
    // Check if the users table exists
    $result = $mysqli->query("SHOW TABLES LIKE 'users'");
    if ($result->num_rows == 0) {
    // Create the users table
    $columns = array(
    "id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY",
    "username VARCHAR(30) NOT NULL",
    "password VARCHAR(255) NOT NULL",
    "email VARCHAR(50) NOT NULL",
    "role VARCHAR(10) NOT NULL DEFAULT 'user'"
    );
    if (!create_table("users", $columns)) {
    echo "<p>Failed to create users table</p>";
    return false;
    }
    else { 
    create_user_details_table();
    // Define the default admin user's details
    $username = 'admin';
    $password = 'password';
    $email = 'admin@example.com';
    $role = '1';
    // Add the default admin user
    add_user($username, $password, $email, $role);}
    }
    // Close database connection
    $mysqli->close();
    return true;
    }
    
    function create_user_details_table() {
        $mysqli = connect_to_db();
    
        // Construct the SQL query to create the user_details table
        $query = "CREATE TABLE user_details (
            id INT(11) NOT NULL AUTO_INCREMENT,
            linkID INT(11) UNSIGNED NOT NULL,
            detail_type VARCHAR(50) NOT NULL,
            detail_label VARCHAR(50) NOT NULL,
            detail_value TEXT NOT NULL,
            PRIMARY KEY (id),
            FOREIGN KEY (linkID) REFERENCES users(id) ON DELETE CASCADE
        )";
    
        // Execute the query
        if (!$mysqli->query($query)) {
            echo "<p>Failed to create user_details table: " . $mysqli->error . "</p>";
            return false;
        }
    
        // Close database connection
        $mysqli->close();
    
        return true;
    }
    
    function create_contacts_table() {
        $mysqli = connect_to_db();
        $sql = "CREATE TABLE contacts (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(50),
                first VARCHAR(50) NOT NULL,
                middle VARCHAR(50),
                last VARCHAR(50) NOT NULL,
                address VARCHAR(255),
                city VARCHAR(50),
                state VARCHAR(2),
                zip VARCHAR(10),
                phone VARCHAR(20),
                email VARCHAR(50),
                status VARCHAR(20),
                userID INT(6) UNSIGNED,
                FOREIGN KEY (userID) REFERENCES users(id)
                )";
        if ($mysqli->query($sql) === TRUE) {
            echo "Table 'contacts' created successfully";
        } else {
            echo "Error creating table: " . $mysqli->error;
        }
        $mysqli->close();
    }
    
    //create_contacts_table();
    
    function add_user($username, $password, $email, $role) {
    $mysqli = connect_to_db();
    // Check if connection was successful
    if ($mysqli->connect_errno) {
    echo "<p>Failed to connect to MySQL Server: " . $mysqli->connect_error . "</p>";
    return false;
    }
    // Hash the password
    $hashed_password = md5($password);
    // Construct the SQL query
    $sql = "INSERT INTO users (username, password, email, role) VALUES ('$username', '$hashed_password', '$email', '$role')";
    // Insert the user
    if (!$mysqli->query($sql)) {
    echo "<p>Failed to add user: " . $mysqli->error . "</p>";
    return false;
    }
    // Close database connection
    $mysqli->close();
    return true;
    }
    
    function update_user($id, $username, $password, $email, $role) {
        $mysqli = connect_to_db();
        // Check if connection was successful
        if ($mysqli->connect_errno) {
            echo "<p>Failed to connect to MySQL Server: " . $mysqli->connect_error . "</p>";
            return false;
        }
        // Hash the password
        $hashed_password = md5($password);
        // Construct the SQL query
        $sql = "UPDATE users SET username='$username', password='$hashed_password', email='$email', role='$role' WHERE id='$id'";
        // Update the user
        if (!$mysqli->query($sql)) {
            echo "<p>Failed to update user: " . $mysqli->error . "</p>";
            return false;
        }
        // Close database connection
        $mysqli->close();
        return true;
    }

    
    ?>
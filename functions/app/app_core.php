<?php 

function login($username, $password) {
    $conn = connect_to_db();

    // Prepare the SQL statement to retrieve user details from the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE (username = ? OR email = ?) AND password = ?");
    $stmt->bind_param("sss", $username, $username, $password);

    // Execute the SQL statement
    $stmt->execute();

    // Retrieve the user details from the database
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Close the database connection
    $conn->close();

    // Return the user details if the login is successful, or false otherwise
    if ($user) {
        return $user;
    } else {
        return false;
    }
}


function current_user_details() {
    // Check if a session is already started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Check if the user is logged in
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $mysqli = connect_to_db();
        $result = $mysqli->query("SELECT * FROM users WHERE id = $user_id");

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();

            // Fetch user details
            $details_query = "SELECT detail_type, detail_label, detail_value FROM user_details WHERE linkID = $user_id";
            $details_result = $mysqli->query($details_query);

            // Add user details to current_user array
            $user_details = array();
            while ($detail = $details_result->fetch_assoc()) {
                $user_details[$detail['detail_label']] = array(
                    'type' => $detail['detail_type'],
                    'value' => $detail['detail_value']
                );
            }
            $user['details'] = $user_details;

            return $user;
        }
    }

    // Return null if the user is not logged in
    return null;
}



function get_role() {
    global $user;
    $roles = array(
      1 => array('name' => 'Admin', 'max_level' => 1),
      2 => array('name' => 'Owner', 'max_level' => 1),
      3 => array('name' => 'Manager', 'max_level' => 2),
      4 => array('name' => 'Supervisor', 'max_level' => 3),
      5 => array('name' => 'Employee', 'max_level' => 4),
      6 => array('name' => 'Sub Contractor', 'max_level' => 5),
      7 => array('name' => 'Supplier', 'max_level' => 5),
      8 => array('name' => 'Customer', 'max_level' => 6),
      9 => array('name' => 'DEMO', 'max_level' => 7),
    );
  
    if (isset($user['role']) && isset($roles[$user['role']])) {
      return $roles[$user['role']];
    }
    return array('name' => 'NO Auth', 'max_level' => 99);
  }
  
  function has_access($required_level) {
    $role = get_role();
    if ($role != null && $role['max_level'] >= $required_level) {
      return true;
    }
    return false;
  }
 ?> 
<?php 

function display_users() {
    // Connect to the database
    $conn = connect_to_db();

    // Query the users table
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);

    // Loop through each row and echo the username and password
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Username: " . $row["username"] . ", Password: " . $row["password"] . "<br>";
    }

    // Close the database connection
    mysqli_close($conn);
}

?>
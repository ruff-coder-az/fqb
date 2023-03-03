<?php 

function app_settings() {
    // Connect to the database
    $mysqli = connect_to_db();

    // Query the database for all settings
    $result = $mysqli->query("SELECT * FROM settings");

    // If there are no settings, insert some default settings
    if ($result->num_rows == 0) {
        $settings = array(
            array("site_name", "App Config"),
            array("site_description", "Setting up app for use"),
            array("contact_email", "admin@ruff-n-it.tech"),
            array("THEME", "default")
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

        // Query the database again for all settings
        $result = $mysqli->query("SELECT * FROM settings");
    }

    // Build an associative array of the settings
    $settings = array();
    while ($setting = $result->fetch_assoc()) {
        $settings[$setting['setting_key']] = $setting['setting_value'];
    }

    // Return the settings array
    return $settings;
}



?>
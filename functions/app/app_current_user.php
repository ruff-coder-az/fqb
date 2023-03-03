<?php
// Checks the DB Connection and sets up the databse if it is not already done
//if (test_dbs_connection() == '1') { if (!app_settings()){ setup_database(); } } else { echo "ERROR: MYSQL SERVER IS OFFLINE";}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username_email = $_POST['username_email'];
    $password = md5($_POST['password']);
    $cuser = login($username_email,$password);
    if ($cuser !== false) {
        $_SESSION['user_id'] = $cuser['id'];
    } else { echo "login error"; }
}
// Current User access and details
$user = current_user_details();

// Details related to the app Name themeand settings
$app_settings = app_settings();
if (!isset($app_settings['THEME'])) { $app_settings['THEME'] = 'default'; }

?>

<?php
session_start();
// Arrays for file maping within the framework
require_once 'config/global_arrays.php';
// Functions that make the app work
require_once 'functions/sql.php';
require_once 'functions/functions.php';
// Header, Nav , Content, and Footer files for app theme
require_once 'theme/'.$app_settings['THEME'].'/header.php';
// Display Login or Auth user content
if (!isset($_SESSION['user_id'])) { 
    require_once 'theme/'.$app_settings['THEME'].'/login.php';
} else {
    require_once 'theme/'.$app_settings['THEME'].'/nav.php'; 
    require_once 'theme/'.$app_settings['THEME'].'/content.php';
}
require_once 'theme/'.$app_settings['THEME'].'/footer.php';
?>
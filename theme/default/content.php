<?php 
$forms = array(
'add-transaction-form',
'add-user-form',
'messycode'
);

$pages = array(
'dashboard',
'settings',
'messycode'
);
$jscripts = array(
'submit-form',
'messycode'
);
// Form Loop
foreach ($forms as $fn) { 
include_once "theme/default/forms/".$fn.".php";
}
// Pages Loop
foreach ($pages as $fn) { 
include_once "theme/default/pages/".$fn.".php";
}

// JS Loop
foreach ($jscripts as $fn) { 
include_once "theme/default/js/".$fn.".php";
}

?>


<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

session_start();
require_once '../model/dataAccess.php';

// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit();
}

$user = fetch_user_profile($_SESSION['username']);
$tickets = get_user_tickets($user->id);

require_once '../view/includes/a_config.php';
require_once '../view/account/profile_view.php';

?>
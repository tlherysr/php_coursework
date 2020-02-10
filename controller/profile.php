<?php

session_start();
require_once '../model/dataAccess.php';

// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit();
}

$user = fetch_user_profile($_SESSION['name']);

require_once '../view/profile_view.php';

?>
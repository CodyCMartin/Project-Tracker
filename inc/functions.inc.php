<?php
require_once 'db_connect.inc.php';

// error bucket to display any errors
function display_errors($errors = array())
{
	$output = '';
	if (!empty($errors)) {
		$output .= "<div class=\"errors\">";
		$output .= "Please fix the following errors: <br>";
		$output .= $errors;
		// foreach($errors as $error) {
		// $output .= "<li>" . h($error) . "</li>";
		// }
		$output .= "</ul>";
		$output .= "</div>";
	}
	return $output;
}

// Destroys session variables and kicks user to login page
function logout()
{
	if (isset($_SESSION['email'])) {
		session_destroy();
		header('location: ../index1.php');
	} else echo "not destroyed";
}

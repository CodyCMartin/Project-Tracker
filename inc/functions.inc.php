<?php
require_once 'inc/db_connect.inc.php';


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

function logout()
{
	if (isset($_SESSION['email'])) {
		session_destroy();
		header('location: login.php');
	} else echo "not destroyed";
}

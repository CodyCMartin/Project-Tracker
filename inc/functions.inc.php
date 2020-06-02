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

function login()
{
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$errorString = "";
		$email = $db->real_escape_string($_POST['email']);
		$password = hash('sha512', $db->real_escape_string($_POST['password']));

		$sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";


		$result = $db->query($sql);
		if ($result->num_rows == 1) {

			$_SESSION['email'] = $email;
			$row = $result->fetch_assoc();
			$_SESSION['first_name'] = $row['first_name'];
			header('location: gallery.php');
		} else {
			$errorString = 'Incorrect combination please try again';
		}
	}
}

<?php
session_start();
$pageTitle = "{$_SESSION['first_name']}'s Projects";
require_once 'inc/code.inc.php';
require_once 'inc/header.inc.php';

// checking is email is set to block out non signed in users

if (empty($_SESSION['email'])) {
	header('location: login.php');
}

?>

<div class="container">
    <div class="card-columns">

<?php 	

// look into join table to be able to query the below

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM project WHERE user_id='$user_id'";
$result = $db->query($sql);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$_SESSION['client_id'] = $row['client_id'];
		$client_id = $_SESSION['client_id'];		
		echo '<div class="card">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title">' . $row['project_name'] . '</h5>';
		echo '<p class="card-text">'. $row['notes'] . '</p>';
	}
}


$sql = "SELECT first_name FROM client WHERE client_id='$client_id'";
$result = $db->query($sql);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		echo '<p class="card-text"><small class="text-muted">' . $row['first_name'] . '</small></p>';
		echo '</div>';
		echo '</div>';
	}
}
?>
		
	
	

</div>        
</div>




</body>

</html>
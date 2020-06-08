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
<div class="container-fluid main">
	<header class="jumbotron pb-5">
		<h1 class="display-3">Project Tracking</h1>
		<p class="lead">To add a project to track simply click "Add Project" and enter the required info.</p>
		<a class="nav-link" href="createProject.php">Add Project</a>
	</header>
</div>



<div class="container-fluid">
	<div class="card-deck">


		<?php
		$user_id = $_SESSION['user_id'];
		$sql = "SELECT project_name, notes, first_name FROM project AS pr INNER JOIN client cl ON pr.client_id = cl.client_id WHERE pr.user_id = '$user_id'";
		$result = $db->query($sql);

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				echo '<div class="card">
				<div class="card-body">
				<h5 class="card-header">' . $row['project_name'] . '</h5><br>			
				<div class="checkbox"></div>
				<h6 class="card-subtitle mb-2 text-muted">Details</h6>
				<p class="card-text">' . $row['notes'] . '</p>
				<p class="card-text"><small class="text-muted">Client: ' . $row['first_name'] . '</small></p>
				<a href="#" class="card-link">Edit</a>			
				</div>
				</div>';
			}
		}

		?>
	</div>
</div>





</body>

</html>
<?php
session_start();
$pageTitle = "{$_SESSION['first_name']}'s Projects";
require_once 'inc/header.inc.php';


// checking is email session variable. If not, redirect to login page.
if (empty($_SESSION['email'])) {
	header('location: login.php');
}

?>
<script defer src="js/project.js"></script>
<div class="container-fluid main">
	<header class="jumbotron pb-5">
		<h1 class="display-3">Project Tracking</h1>
		<p class="lead">To add a project to track simply click "Add Project" and enter the required info.</p>
		<a class="popUp" href="createProject.inc.php">Add Project</a>
	</header>
</div>



<div class="container-fluid">	
	<div class="card-columns">

		<!-- Using a query to join table to build the output for project display  -->
		<?php
		$user_id = $_SESSION['user_id'];
		$sql = "SELECT project_name, notes, first_name FROM project AS pr INNER JOIN client cl ON pr.client_id = cl.client_id WHERE pr.user_id = '$user_id'";
		$result = $db->query($sql);
		// If any project exist in db, output them into HTML 
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



<form action="inc/createProject.inc.php" method="POST" class="justify-content-center popUpForm">
							<h5>Project Information</h5>
                            <div class="form-group">
                                <label for="project_name" class="sr-only">First Name</label>
                                <input type="text" name="project_name" id="project_name" class="form-control" placeholder="Project Name">
                            </div>
                            <div class="form-group">
                                <label for="client_name" class="sr-only">Client Name</label>
                                <input list="client_name" name="client_name" class="form-control" type="text" placeholder="Add or select client">
                                <datalist id="client_name">
                                    <!-- populates the previous clients drop down based on user id  -->
                                    <?php
                                    $user_id = $_SESSION['user_id'];
                                    $sql = "SELECT * FROM client WHERE user_id='$user_id'";
                                    $result = $db->query($sql);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<option value= '" . $row['first_name'] . "'>";
                                        }
                                    }
                                    ?>
                                </datalist>
                            </div>
                            <div class="form-group">
                                <label for="notes" class="sr-only">Project Notes</label>
                                <textarea name="notes" class="form-control" id="notes" rows="3" placeholder="Project Notes"></textarea>
                            </div>
							<button type="submit" class="btn btn-primary btn-lg" value="Login">Save</button>
							<input type="button" class="closeButton btn btn-primary btn-lg" value="Cancel"></button>  </form>
</body>


<!-- radio button for existing client or new  -->
<!-- <div class="btn-group btn-group-toggle" data-toggle="buttons">
  <label class="btn btn-secondary active">
    <input type="radio" name="options" id="option1" autocomplete="off" checked> Active
  </label>
  <label class="btn btn-secondary">
    <input type="radio" name="options" id="option2" autocomplete="off"> Radio
  </label>
  <label class="btn btn-secondary">
    <input type="radio" name="options" id="option3" autocomplete="off"> Radio
  </label>
</div> -->

</html>
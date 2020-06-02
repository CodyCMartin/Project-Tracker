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

<!-- Sample card creation  -->

<div class="card" style="width: 18rem;">

	<div class="card-body">
		<h5 class="card-title">Project Title</h5>
		<p class="card-text">Project Notes - Lorem ipsum dolor, sit amet consectetur adipisicing elit. Debitis nam beatae numquam, praesentium consectetur non ex modi blanditiis laboriosam error, in asperiores magni? Iusto voluptas sequi labore aliquam nihil culpa!

		</p>
	</div>
	<ul class="list-group list-group-flush">

		<li class="list-group-item">Clients Name</li>
		<li class="list-group-item">Due Date</li>
	</ul>
	<div class="card-body">
		<a href="#" class="card-link">Edit Project</a>
		<a href="#" class="card-link">Delete Project</a>
	</div>
</div>




</body>

</html>
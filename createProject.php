<?php
session_start();

$pageTitle = "Registration";
require_once 'inc/header.inc.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $db->real_escape_string($_POST['first_name']);
    $last_name = $db->real_escape_string($_POST['last_name']);
    $password = hash('sha512', $db->real_escape_string($_POST['password']));
    $email = $db->real_escape_string($_POST['email']);

    $sql = "INSERT INTO user (first_name,last_name,password,email) 
                    VALUES('$first_name','$last_name','$password','$email')";

    echo $sql;
    $result = $db->query($sql);

    if (!$result) {
        $errorString = 'Double check formatting';
    } else {
        header('location: login.php');
    }
}
?>

<section id="cover" class="min-vh-100">
    <div id="cover-caption">
        <div class="container">
            <div class="row text-white">
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
                    <?php if (isset($errorString)) echo display_errors($errorString) ?>
                    <h1 class="display-4 py-2 text-truncate">Project Info</h1>
                    <div class="px-2">
                        <form action="createProject.php" method="POST" class="justify-content-center">
                            <div class="form-group">
                                <label for="project_name" class="sr-only">First Name</label>
                                <input type="text" name="project_name" id="project_name" class="form-control" placeholder="Project Name">
                            </div>
                            <div class="form-group">
                                <label for="client_name" class="sr-only">Client Name</label>
                                <input type="client_name" name="client_name" id="client_name" class="form-control" placeholder="Client Name (optional)">
                            </div>
                            <div class="form-group">
                                <label for="notes" class="sr-only">Project Notes</label>
                                <textarea class="form-control" id="notes" rows="3" placeholder="Project Notes"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg" value="Login">Save</button>
                            <br>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php require 'inc/footer.inc.php'; ?>
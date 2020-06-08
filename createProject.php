<?php
session_start();

$pageTitle = "Create Project";
require_once 'inc/header.inc.php';

//Client info db insert logic
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $db->real_escape_string($_POST['client_name']);
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM client WHERE user_id='$user_id' AND first_name='$first_name'";
    $result = $db->query($sql);
    $res_count = $result->num_rows;

    // If results are not 0, then user already exists in db.
    if ($res_count == 0) {
        $first_name = $db->real_escape_string($_POST['client_name']);
        // echo $user_id;
        // echo $first_name;
        $sql = "INSERT INTO client (user_id,first_name) 
                    VALUES('$user_id','$first_name')";
        //echo "inserted";
        //echo $sql;
        $result = $db->query($sql);
        if (!$result) {
            echo "error";
            $errorString = 'Double check formatting';
        }
        //end of insert
    }
    // pulling client id from db to set session variable for project table insert
    $sql = "SELECT * FROM client WHERE first_name='$first_name'";
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
    $_SESSION['client_id'] = $row['client_id'];
    // echo $_SESSION['client_id'];
}


// inserting project into database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $project_name = $db->real_escape_string($_POST['project_name']);
    $notes = $db->real_escape_string($_POST['notes']);
    $user_id = $db->real_escape_string($_SESSION['user_id']);
    $client_id = ($_SESSION['client_id']);

    $sql = "INSERT INTO project (user_id,client_id,project_name,notes) 
                    VALUES('$user_id','$client_id','$project_name','$notes')";

    //echo $sql;
    $result = $db->query($sql);

    if (!$result) {
        $errorString = 'Double check formatting';
    } else {
        header('location: projects.php');
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
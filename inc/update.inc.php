<?php
require_once 'db_connect.inc.php'; ?>
<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">

</html>
<?php

$project_name = "";
$notes = "";

if (isset($_GET["edit"])) {
    $project_id = $_GET["edit"];
    $result = $db->query("SELECT * FROM project WHERE project_id=$project_id");

    if (count($result) == 1) {
        $row = $result->fetch_array();
        $project_name = $row["project_name"];
        $notes = $row["notes"];
    }
}
?>
<form action="inc/createProject.inc.php" method="POST" class="justify-content-center popUpForm">
    <h5>Project Information</h5>
    <div class="form-group">
        <label for="project_name" class="sr-only">First Name</label>
        <input type="text" name="project_name" id="project_name" value="<?php echo $project_name; ?>" class="form-control" placeholder="Project Name">
    </div>
    <div class="form-group">
        <label for="client_name" class="sr-only">Client Name</label>
        <input list="client_name" name="client_name" class="form-control" type="text" placeholder="Add New or Select Previous Client">
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
        <textarea name="notes" class="form-control" id="notes" rows="3" placeholder="Project Notes"><?php echo $notes; ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary btn-lg" value="Login">Save</button>
    <input type="button" class="closeButton btn btn-primary btn-lg" value="Cancel"></button>
</form>
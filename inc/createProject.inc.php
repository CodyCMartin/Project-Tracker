<!-- This is the logic to input a new project into the database -->
<?php
session_start();
require_once 'db_connect.inc.php';


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
        header('location: ../projects.php');
    }
}


?>





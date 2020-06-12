<?php
require_once 'db_connect.inc.php';

// When edit button is pressed, qeury database to make form fields sticky
if (isset($_GET["edit"])) {
    $project_id = $_GET["edit"];
    $result = $db->query("SELECT project_id, project_name, notes, first_name FROM project AS pr INNER JOIN client cl ON pr.client_id = cl.client_id WHERE pr.project_id = '$project_id'");
$json_array = [];
    while ($row = $result->fetch_array()) {       
        array_push($json_array,["project_name" => $row["project_name"],"notes" => $row["notes"],"project_id" => $row["project_id"],"first_name" => $row["first_name"]]);    
    }
    echo json_encode($json_array);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $project_name = $db->real_escape_string($_POST['project_name']);
    $notes = $db->real_escape_string($_POST['notes']);
    $project_id = ($_POST['project_id']); 

    

    $sql= "UPDATE project
    SET project_name = '$project_name', notes = '$notes'
    WHERE project_id = $project_id";



    //echo $sql;
    $result = $db->query($sql);

    if (!$result) {
        $errorString = 'Double check formatting';
    } else {
        header('location: ../projects.php');
    }
}
?>
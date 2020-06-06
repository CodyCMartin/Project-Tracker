<?php
session_start();

$pageTitle = "Create Project";
require_once 'inc/header.inc.php';

// dealing with client creation into the db
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $client_name = $db->real_escape_string($_POST['client_name']); 
    $user_id = $db->real_escape_string($_SESSION['user_id']);    

    $sql = "INSERT INTO client (user_id,first_name) 
                    VALUES('$user_id','$client_name')";

    //echo $sql;
    $result = $db->query($sql);

    if (!$result) {
        $errorString = 'Double check formatting';
    } else {
        // header('location: login.php');
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $project_name = $db->real_escape_string($_POST['project_name']);
    $notes = $db->real_escape_string($_POST['notes']); 
    $user_id = $db->real_escape_string($_SESSION['user_id']);

    

    $sql = "INSERT INTO project (user_id,project_name,notes) 
                    VALUES('$user_id','$project_name','$notes')";

    //echo $sql;
    $result = $db->query($sql);

    if (!$result) {
        $errorString = 'Double check formatting';
    } else {
        // header('location: login.php');
    }
}  

                                    // $sql = "SELECT * FROM client";  
                                    //      echo $sql;                                  
                                    //     $result = $db->query($sql);
                                        
                                    //     if ($result->num_rows == 1) { 
                                    //         echo "yes theres rows";
                                    //         $row = $result->fetch_assoc(); 
                                    //         echo $row;
                                    //         for ($i=0; $i < count($row) ; $i++) { 
                                    //             echo $row['first_name'];   
                                    //         }
                                                                                         
                                    //         // echo "<option value='" . $row['first_name'] . "'>
                                    //         //   </option>";
                                    //      } 
                                
//  $sql = "SELECT first_name FROM client";


//     $result = $db->query($sql);
//     if ($result->num_rows > 0) {        
//         while($row = $result->fetch_assoc()) {
//             echo "<option value='" . $row['first_name'] . "'>";            
//         }
//       } 
      
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
                                    <?php                                    
                                         $sql = "SELECT * FROM client";


                                         $result = $db->query($sql);
                                         if ($result->num_rows > 0) {        
                                             while($row = $result->fetch_assoc()) {
                                                 echo "<option value= ". $row['client_id'] ."'" . $row['first_name'] . "'>";            
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
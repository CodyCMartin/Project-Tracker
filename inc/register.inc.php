<?php
session_start();
require_once 'db_connect.inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $db->real_escape_string($_POST['first_name']);
    $last_name = $db->real_escape_string($_POST['last_name']);
    $password = hash('sha512', $db->real_escape_string($_POST['password']));
    $email = $db->real_escape_string($_POST['email']);

    $sql = "INSERT INTO user (first_name,last_name,password,email) 
                    VALUES('$first_name','$last_name','$password','$email')";

    //echo $sql;
    $result = $db->query($sql);

    if (!$result) {
        $errorString = 'Double check formatting';
    } else {
        header('location: google.com');
    }
}
?>

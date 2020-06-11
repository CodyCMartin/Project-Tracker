<?php
session_start();
require_once 'db_connect.inc.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errorString = "";
    $email = $db->real_escape_string($_POST['email']);
    $password = hash('sha512', $db->real_escape_string($_POST['password']));

    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";


    $result = $db->query($sql);
    if ($result->num_rows == 1) {

        $_SESSION['email'] = $email;
        $row = $result->fetch_assoc();
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['user_id'] = $row['user_id'];

        header('location: ../projects.php');
    } else {
        $errorString = 'Incorrect combination please try again';
        header('location: ../index1.php');
    }
}

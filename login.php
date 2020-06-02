<?php
session_start();
$pageTitle = 'Login';
require_once 'inc/header.inc.php';
require_once 'inc/functions.inc.php';




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
        header('location: projects.php');
    } else {
        $errorString = 'Incorrect combination please try again';
    }
}

?>

<section id="cover" class="min-vh-100">
    <div id="cover-caption">
        <div class="container">
            <div class="row text-white">
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
                    <?php if (isset($errorString)) echo display_errors($errorString);
                    ?>
                    <h1 class="display-4 py-2 text-truncate">Welcome</h1>
                    <div class="px-2">
                        <form action="login.php" method="POST" class="justify-content-center">
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" required class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg" name="submit" value="Login">Login</button>
                            <br>
                            <br>
                            <p>Not a user? <a href="register.php">Register</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

login()



<?php require 'inc/footer.inc.php'; ?>
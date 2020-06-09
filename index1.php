<?php
session_start();
$pageTitle = "Home";
require_once 'inc/header.inc.php';
?>
<script defer src="js/landingScript.js"></script>

<div class="main-content">
<div class="text1">
    <p class="headerText">Simple Effective<br> Tracking</p>
    <p class="subheader">Deliver on time from anywhere with our project tracker</p>
</div>

<form action="inc/login.inc.php" method="POST" class="justify-content-center popUpFormLogin">
<h5>Login</h5>
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" required class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg" value="Login">Login</button>
							<input type="button" class="closeButton btn btn-primary btn-lg" value="Cancel"></button>                            


</form>

<form action="inc/register.inc.php" method="POST" class="justify-content-center popUpFormReg">
<h5>Register</h5>
                            <div class="form-group">
                                <label for="first_name" class="sr-only">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <label for="last_name" class="sr-only">Last Name</label>
                                <input type="last_name" name="last_name" id="last_name" class="form-control" placeholder="Last Name">
                            </div>
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg" value="Login">Submit</button>
                            <input type="button" class="closeButtonReg btn btn-primary btn-lg" value="Cancel"></button> 
                            
                        </form>
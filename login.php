<?php

if(isset($_POST['submit'])){
    // Take data from the login form
    $username=$_POST['username'];
    $password=$_POST['password'];
   
    // Login Controller object
    include "Database.php";
    include "Models/Login.Model.php";
    include "Controllers/Login.Controller.php";
    $login=new LoginController( $username, $password);

    // Setting cookies if remember me is checked
    $login->rememberMe();

    // Register Error handling i user registration
    $login->loginUser();
    
    
    
    
    // Sendig user to the "Home"
    header("Location:index.php?error=noerrors");
}
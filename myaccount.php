<?php

if (isset($_POST['submit'])) {

        // Take data from the register form
       
        $password = $_POST['password'];
       
        $new_password = $_POST['new_password'];
       
        $repeat_new_password = $_POST['repeat_new_password'];

        // Register Controller object
        include "Database.php";
        include "Models/MyAccount.Model.php";
        include "Controllers/MyAccount.Controller.php";
        $new_password = new MyAccountController($password, $new_password, $repeat_new_password);
        session_start();
        
        $new_password->changePassword();

        // Sendig user to the "Home"
        header("Location: index.php?error=noerrors");
}

<?php

if (isset($_POST['submit'])) {

        // Take data from the register form
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        // Register Controller object
        include "Database.php";
        include "Models/Register.Model.php";
        include "Controllers/Register.Controller.php";
        $register = new RegisterController( $username, $email, $password, $confirm_password );

        // Register Error handling i user registration
        $register->registerUser();

        // Sendig user to the "Home"
        header("Location: index.php?error=noerrors");
}

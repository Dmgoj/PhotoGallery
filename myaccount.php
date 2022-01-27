<?php

if (isset($_POST['submit'])) {

        // Take data from the register form
        $password = $_POST['password'];
        $new_password = $_POST['new_password'];
        $repeat_new_password = $_POST['repeat_new_password'];

                include "Database.php";
        include "Models/MyAccount.Model.php";
        include "Controllers/MyAccount.Controller.php";
        
        $new_password = new MyAccountController($password, $new_password, $repeat_new_password,null);
        session_start();
        $new_password->changePassword();
        header("Location: index.php?error=noerrors");
}

// Delete users account and uploaded images
if (isset($_GET['delete_account'])) {
        $username = $_GET['delete_account'];
        
        include "Database.php";
        include "Models/MyAccount.Model.php";
        include "Controllers/MyAccount.Controller.php";
        
        $delete_user = new MyAccountController(null, null, null,$username);
        $delete_user->deleteAccount();
        header("Location:logout.php");
}

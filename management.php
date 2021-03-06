<?php
session_start();
// Get data from the file upload
if (isset($_POST['submit'])) {
    $image = $_FILES['image'];
    $img_name = $_FILES['image']['name'];
    $img_type = $_FILES['image']['type'];
    $img_tmp_name = $_FILES['image']['tmp_name'];
    $img_error = $_FILES['image']['error'];
    $img_size = $_FILES['image']['size'];

    // Getting extension from image name and defining allowed extensions
    $file_extension = explode('.', $img_name);
    $file_actual_extension = strtolower(end($file_extension));
    $allowed_file_type = array('jpg', 'jpeg', 'png');

    // Create unique name of an image and move it to 'Uploads' folder
    $new_img_name = uniqid() . "." . $file_actual_extension;
    if (in_array($file_actual_extension, $allowed_file_type)) {
        $img_destination = 'uploads/' . $new_img_name;
        move_uploaded_file($img_tmp_name, $img_destination);
    } else {
        header("Location:/views/management.view.php?error='wrongfiletype'");
    }

    // Get username which uploaded image
    if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
        $username = $_SESSION['user'];
    }

    // Management Controller object
    include "Database.php";
    include "Models/Management.Model.php";
    include "Controllers/Management.Controller.php";
    $management = new ManagementController($img_destination, $username);
    $management->uploadImagePath();
    header("Location:/views/management.view.php");
}

// Remove image path from database
if (isset($_POST['remove'])) {
    $img_path= $_POST['image_to_delete'];
    unlink($img_path);
    include "Database.php";
    include "Models/Management.Model.php";
    include "Controllers/Management.Controller.php";
    $remove = new ManagementController($img_path,null);
    $remove->removeImage();
    header("Location:/views/management.view.php");
}

// Count images in database
if (isset($_POST['show_images_count'])) {
    include "Database.php";
    include "Models/Management.Model.php";
    include "Controllers/Management.Controller.php";
    $show_image_count = new ManagementController(null,null);
    $show_image_count->imageCount();
    header("Location:/views/home.view.php?imagecount=" . $show_image_count->imageCount() );
}
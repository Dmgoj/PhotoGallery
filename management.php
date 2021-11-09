<?php

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
    $img_destination = 'uploads/' . $new_img_name;
    move_uploaded_file($img_tmp_name, $img_destination);
    /*
    include "Database.php";
    include "Controllers/Management.Controller.php";
    

    
    */
}

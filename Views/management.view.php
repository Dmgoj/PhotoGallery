<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location:home.view.php");
}

require_once "../Database.php";
require_once "../Models/Management.Model.php";
require_once "../Controllers/Management.Controller.php";

$images=new ManagementController(null, null);
$imagestoshow= $images->showImages();
$users= $images->showUsers();
//var_dump($users);
//die();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="../index.php"><?= $_SESSION['user']; ?></a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </nav>
    <form action="../management.php" method="post" enctype="multipart/form-data">
        <input type="file" id="image" name="image">
        <!-- <input type="hidden" name="MAX_FILE_SIZE" value="100000000" /-->
        <input type="submit" name="submit" value="Upload">
    </form>
    <table>
        <?php foreach ($imagestoshow as $img) {
               echo "<tr><td> <img src='../" . $img['image'] . "' alt='PICTURE' width='100' height='100'><button>REMOVE</button><br>" . $users['username'] ."</td></tr>";
        }?>
    </table>
</body>
</html>
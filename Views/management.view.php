<?php

session_start();
if (!isset($_SESSION['user'])) {
    header("Location:home.view.php");
}

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
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <form action="../management.php" method="post" enctype="multipart/form-data">
        <input type="file" id="image" name="image">
        <!-- <input type="hidden" name="MAX_FILE_SIZE" value="30000" /-->
        <input type="submit" name="submit" value="Upload">
    </form>
</body>
</html>
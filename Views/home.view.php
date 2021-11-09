<?php //session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
<?php if (!isset($_SESSION['user'])) { ?>
    <nav>
        <ul style="display:inline; list-style-type: none;">
            <li><a href="../index.php">Home</a></li>
            <li><a href="views/login.view.php">Login</a></li>
            <li><a href="views/register.view.php">Register</a></li>
        </ul>
    </nav>
<?php } elseif (isset($_SESSION['user'])) {?>
    <nav>
        <ul style="display:inline; list-style-type: none; ">
            <!--<li><a href="../index.php">Home</a></li-->
            <li><a href="../index.php"><?= $_SESSION['user']; ?></a></li>
            <li><a href="views/management.view.php">Management</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
<?php } ?>
    <br>
    <form action="index.php">
        <input type="submit" name="images" value="Images">
    </form>
</body>
</html>
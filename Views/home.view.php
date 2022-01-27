<?php session_start() ?>
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
            <li><a href="/views/login.view.php">Login</a></li>
            <li><a href="/views/register.view.php">Register</a></li>
        </ul>
    </nav>
<?php } elseif (isset($_SESSION['user'])) {?>
    <nav>
        <ul style="display:inline; list-style-type: none; ">
            <li><a href="../index.php"><?= $_SESSION['user']; ?></a></li>
            <li><a href="/views/management.view.php?user=<?php echo $_SESSION['user']?>">Management</a></li>
            <li><a href="/views/myaccount.view.php?user=<?php echo $_SESSION['user']?>">My Account</a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </nav>
<?php } ?>
    <br>
    <form action="../management.php" method='post'>
        <input type="submit" name="show_images_count" value="Images">
    </form>
    <?php if (isset($_GET['imagecount'])) { ?>
    <p> Total number of images:   <strong><?= $_GET['imagecount']; ?></strong> </p>
    <?php } ?>
    
</body>
</html>
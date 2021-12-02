<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php if (!isset($_SESSION['user'])) { ?>
        <nav>
            <ul style="display:inline; list-style-type: none; ">
               <li><a href="../index.php">Home</a></li>
               <li><a href="login.view.php">Login</a></li>
               <li><a href="register.view.php">Register</a></li>
            </ul>
        </nav>
    <?php } elseif (isset($_SESSION['user'])) {?>
        <nav>
            <ul style="display:inline; list-style-type: none; ">
                <li><a href="../index.php"><?= $_SESSION['user']; ?></a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    <?php } ?>
    <br>
    <form action="../login.php" method="post">
        LOGIN:
        <input type="text" name="username" placeholder="Username" value=<?= (isset($_COOKIE['username']) ? $_COOKIE['username'] : ""); ?> >
        <input type="password" name="password" placeholder="Password"  value=<?= (isset($_COOKIE['password']) ? $_COOKIE['password'] : "");?>>
        <input type="checkbox" name="remember">
        Remember me
        <button  type="submit" name="submit">Login</button>
        <a href="register.view.php">Register</a>
    </form>  
</body>
</html>
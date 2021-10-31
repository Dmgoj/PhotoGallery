<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
<nav>
        <ul style="display:inline; list-style-type: none; ">
            <li><a href="../index.php">Home</a></li>
            <li><a href="login.view.php">Login</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <br>
    <form action="../register.php" method="post">
        CREATE ACCOUNT:
        <input type="text" name="username" placeholder="Username">
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="confirm_password" placeholder="Confirm Password">
        <input type="submit" name="submit" value="Submit">
       
    </form>
</body>
</html>
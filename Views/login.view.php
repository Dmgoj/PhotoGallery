<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <nav>
        <ul style="display:inline; list-style-type: none; ">
            <li><a href="../index.php">Home</a></li>
            <li><a href="login.view.php">Login</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <br>
    <form action="../login.php" method="post">
        LOGIN:
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <button  type="submit" name="submit">Login</button>
        <a href="register.view.php">Register</a>
    </form>
</head>
<body>
    
</body>
</html>
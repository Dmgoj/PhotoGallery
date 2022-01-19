<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyAccount</title>
</head>
<body>
    <form action="../myaccount.php" method="post">
        Old Password:<br>
        <input type="password" name="password" placeholder="Enter password"><br>
        New password:<br>
        <input type="password" name="new_password" placeholder="Enter new password"><br>
        Repeat new Password:<br>
        <input type="password" name="repeat_new_password" placeholder="Repeat new password"><br>
        <button type="submit" name="submit">ChangePW</button>
    </form>
    <a href="#">Delete account</a>
</body>
</html>
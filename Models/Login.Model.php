<?php

class LoginModel extends Database
{
    // Checks if user exist in database
    protected function getUser($username,$password)
    {
        $stmt = $this->connect()->prepare('SELECT password FROM users WHERE username = ? OR email = ?;');
        $stmt->execute(array($username,$password));
        
        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("Location:views/login.view.php?error =usernotfound");
            exit();
        }

        $hashed_password = $stmt->fetch();
        $check_password = password_verify($password, $hashed_password['password']);
        
        if (!$check_password) {
            $stmt = null;
            header("Location:views/login.view.php?error = $hashed_password");
            exit();
        } else {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE username = ?  AND password = ?;');
            $stmt->execute(array($username,$hashed_password['password']));    
        
        if($stmt->rowCount() == 0) {
            $stmt =null;
            header("Location:views.login.php?error =usernotfound");
            exit();
        }
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);    
        session_start();
        $_SESSION['user'] = $user[0]['username'];
        }
    }
}

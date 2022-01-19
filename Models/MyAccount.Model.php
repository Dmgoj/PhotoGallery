<?php

class MyAccountModel extends Database
{
    
    private $username;
    // Checks if password is correct    
    protected function checkPassword($password)
    {
        
        $this->username==$_SESSION['user']=[0]['username'];
        $stmt = $this->connect()->prepare('SELECT password FROM users WHERE username = ?;');
        $stmt->execute(array($this->username));
        var_dump($username);
        die();
        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("Location:views/myaccount.view.php?error=wrongpassword");
            exit();
        }

        $hashed_password = $stmt->fetch();
        $check_password = password_verify($password, $hashed_password['password']);
        
        if (!$check_password) {
            $stmt = null;
            header("Location:views/myaccount.view.php?error=wrongpassword1");
            exit();
        }
    }

    //Inserts user into database
    protected function setNewPassword($new_password)
    {
        $stmt=$this->connect()->prepare('INSERT INTO users(username, email, password) VALUES(?, ?, ?);');
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt->execute(array($username, $email, $hashed_password));
        
        $resultCheck;

        if($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }
}
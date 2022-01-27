<?php

class MyAccountModel extends Database
{
    
    private $username;
    
    protected function checkPassword($password)
    {
        
        $this->username=$_SESSION['user'];
        $stmt = $this->connect()->prepare('SELECT password FROM users WHERE username = ?;');
        $stmt->execute(array($this->username));
       
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
        return true;
    }

    protected function setNewPassword($new_password)
    {
        $this->username=$_SESSION['user'];
        $stmt = $this->connect()->prepare('UPDATE users SET password=? WHERE username=?');
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
       
        $stmt->execute(array($hashed_password, $this->username));
        
        
        $resultCheck;

        if($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }

    protected function removeAccount($username)
    {
        //var_dump($username);
        //die();
        //$stmt=$this->connect()->prepare("DELETE FROM users,images WHERE users.username=? and images.user_id= (SELECT id FROM users WHERE username=?);");
        $stmt=$this->connect()->prepare("DELETE FROM users WHERE username=?;");
        $stmt->execute(array($username));
        
        
    }
}
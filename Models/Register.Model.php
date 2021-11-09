<?php

class RegisterModel extends Database
{
    // Checks if user exist in database
    protected function checkUser($username, $email)
    {
        $stmt=$this->connect()->prepare('SELECT username FROM users WHERE username = ? OR email = ?');
        $stmt->execute(array($username, $email));
        
        $resultCheck;

        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }

    // Inserts user into database
    protected function setUser($username, $email, $password)
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
<?php

class MyAccountController extends MyAccountModel
{
    private $password;
    private $db_password; 
    private $new_password;
    private $repeat_new_password;
    
   

    public function __construct($password, $new_password, $repeat_new_password)
    {
        $this->password = trim($password);
        $this->new_password = trim($new_password);
        $this->repeat_new_password = trim($repeat_new_password);
    }

    // Check if password fields are empty
    private function emptyInput()
    {
        $result;
        if (empty($this->password) || empty($this->new_password) || empty( $this->repeat_new_password)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    // Checks if username is alpha-numeric with underscore and atleast 5 and less than 30 characters
    private function invalidPassword()
    {
        $result;
        if ($this->password !== $this->checkPassword($this->password)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    // Check if email is valid
    private function newPasswordMatch()
    {
        $result;
        if($this->new_password !== $this->repeat_new_password) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function newPasswordMatchOld()
    {
        $result;
        if($this->new_password == $this->password) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

  

        // Register user
        public function changePassword()
        {
            if ($this->emptyInput() == false) {
                header("Location:views/myaccount.view.php?error = emptyinput");
                exit();    
            }
            
            if ($this->invalidPassword() == false) {
                header("Location:views/myaccount.view.php?error = invalidpassword");
                exit();    
                }
            
            if ($this->newPasswordMatch() == false) {
                header("Location:views/myaccount.view.php?error = newpasswordnotmatch");
                exit();    
            }
    
            if ($this->newPasswordMatchOld() == false) {
                header("Location:views/myaccount.view.php?error = newpasswordmatchold");
                exit();    
            } 
    
            // If error checks above are passed change user's password
            $this->setNewPassword($this->new_password);
        }
}

?>
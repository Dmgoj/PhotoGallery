<?php

class MyAccountController extends MyAccountModel
{
    private $password;
    private $db_password; 
    private $new_password;
    private $repeat_new_password;
    private $username;
   

    public function __construct($password, $new_password, $repeat_new_password, $username)
    {
        $this->password = trim($password);
        $this->new_password = trim($new_password);
        $this->repeat_new_password = trim($repeat_new_password);
        $this->username = $username;
       
    }

    // Check if password fields are empty
    private function emptyInput()
    {
        return empty($this->password) || empty($this->new_password) || empty( $this->repeat_new_password);
                
    }

    // Checks if username is alpha-numeric with underscore and atleast 5 and less than 30 characters
    private function invalidPassword()
    {
        return $this->checkPassword($this->password);
        
    }

    // Check if email is valid
    private function newPasswordMatch()
    {
      return $this->new_password !== $this->repeat_new_password;
    }

    private function newPasswordMatchOld()
    {
        return $this->new_password == $this->password;
    }

  

        // Register user
        public function changePassword()
        {
            if ($this->emptyInput()) {
                header("Location:views/myaccount.view.php?error = emptyinput");
                exit();    
            }
            
            if (!$this->invalidPassword()) {
                header("Location:views/myaccount.view.php?error = invalidpassword");
                exit();    
                }
            
            if ($this->newPasswordMatch()) {
                header("Location:views/myaccount.view.php?error = newpasswordnotmatch");
                exit();    
            }
    
            if ($this->newPasswordMatchOld()) {
                header("Location:views/myaccount.view.php?error = newpasswordmatchold");
                exit();    
            } 
    
            // If error checks above are passed change user's password
            $this->setNewPassword($this->new_password);
        }

        public function deleteAccount()
        {
            $this->removeAccount($this->username);
            
        }
}

?>
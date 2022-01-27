<?php

class RegisterController extends RegisterModel
{
    private $username;
    private $email;
    private $password;
    private $confirm_password;

    public function __construct($username,$email,$password,$confirm_password)
    {
        $this->username = trim($username);
        $this->email = trim($email);
        $this->password = trim($password);
        $this->confirm_password = trim($confirm_password);
    }

    // Check if registration fields are empty
    private function emptyInput()
    {
    
        return empty($this->username) || empty($this->email) || empty($this->password) || empty($this->confirm_password);
    }

    // Checks if username is alpha-numeric with underscore and atleast 5 and less than 30 characters
    private function invalidUsername()
    {
    
        return preg_match("/^[a-z\d_]{5,30}$/i", $this->username);
    }

    // Check if email is valid
    private function invalidEmail()
    {
    
        return filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }

    // Check if password and confirm password match
    private function passwordMatch()
    {
        
        return $this->password !==  $this->confirm_password;
    }

    // Check if user exist
    private function userExist()
    {
        return $this->checkUser($this->username,$this->email);
    }

        // Register user
        public function registerUser()
        {
            if ($this->emptyInput()) {
                header("Location:views/register.view.php?error = emptyinput");
                exit();    
            }
            
            if (!$this->invalidUsername()) {
                header("Location:views/register.view.php?error = invalidusername");
                exit();    
                }
            
            if (!$this->invalidEmail()) {
                header("Location:views/register.view.php?error = invalidemail");
                exit();    
            }
            
            if ($this->passwordMatch()) {
                header("Location:views/register.view.php?error = passwordnotmatch");
                exit();    
            }
    
            if (!$this->userExist()) {
                header("Location:views/register.view.php?error = useroremailexist");
                exit();    
            } 
    
            // If error checks above are passed insert user
            $this->setUser($this->username, $this->email, $this->password);
        }
}

?>
<?php

class LoginController extends LoginModel
{
    private $username;
    private $password;
    
    public function __construct($username,$password)
    {
        $this->username=trim($username);
        $this->password=trim($password);
    }
    
    // User login
    public function loginUser()
    {
        if ($this->emptyInput()) {
            header("Location:views/login.view.php?error=emptyinput");
            exit();
        }
        $this->getUser($this->username, $this->password);
    }

    // Check if registration fields are empty
    private function emptyInput()
    {
      return  empty($this->username) || empty($this->password);
    }
    
    // Check if "Remember me" checkbox is checked and set cookies 
    public function rememberMe()
    {
        if ($_POST['remember']) {
            $username=$this->username;
            $password=$this->password;
            $time=time() + 3600 * 24 * 30;
            setcookie('username', $username, $time);
            setcookie('password', $password, $time);
        }
    }
}

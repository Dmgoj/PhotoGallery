<?php

class RegisterController extends RegisterModel{
    private $username;
    private $email;
    private $password;
    private $confirm_password;

    public function __construct($username,$email,$password,$confirm_password){
        $this->username=trim($username);
        $this->email=trim($email);
        $this->password=trim($password);
        $this->confirm_password=trim($confirm_password);
    }



    // Check if registration fields are empty
    private function emptyInput(){
        $result;
        if (empty($this->username)||empty($this->email)||empty($this->password)||empty($this->confirm_password)){
            $result=false;
        }else{
            $result=true;
        }
        return $result;
    }

    // Checks if username is alpha-numeric with underscore and atleast 5 and less than 30 characters
    private function invalidUsername(){
        $result;
        if (!preg_match("/^[a-z\d_]{5,30}$/i", $this->username)){
            $result=false;
        }else{
            $result=true;
        }
        return $result;
    }

    // Check if email is valid
    private function invalidEmail(){
        $result;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result=false;
        }else{
            $result=true;
        }
        return $result;
    }

    // Check if password and confirm password match
    private function passwordMatch(){
        $result;
        if($this->password !== $this->confirm_password){
            $result=false;
        }else{
            $result=true;
        }
        return $result;
    }

    // Check if user exist
    private function userExist(){
        $result;
        if(!$this->checkUser($this->username,$this->email)){
            $result=false;
        }else{
            $result=true;
        }
        return $result;
    }

        // Register user
        public function registerUser(){
            if ($this->emptyInput()==false){
                header("Location:views/register.view.php?error=emptyinput");
                exit();    
            }
            
            if ($this->invalidUsername()==false){
                header("Location:views/register.view.php?error=invalidusername");
                exit();    
                }
            
            if ($this->invalidEmail()==false){
                header("Location:views/register.view.php?error=invalidemail");
                exit();    
            }
            
            if ($this->passwordMatch()==false){
                header("Location:views/register.view.php?error=passwordnotmatch");
                exit();    
            }
    
            if ($this->userExist()==false){
                header("Location:views/register.view.php?error=useroremailexist");
                exit();    
            } 
    
            // If error checks above are passed insert user
            $this->setUser($this->username,$this->email,$this->password);
                            
                                               
    
        }
   




}

?>
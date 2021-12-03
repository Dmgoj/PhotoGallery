<?php

class ManagementController extends ManagementModel
{
    private $img_destination;
    private $username;
    
       
    public function __construct($img_destination, $username)
    {
        $this->img_destination = $img_destination;
        $this->username=$username;
    }

    // Upload image path do database
    public function uploadImagePath()
    {
        $this->setImagePath($this->img_destination, $this->username);
    }
   
    // Get image path and username that uploaded image from database
    public function showUsers()
    {
        return $this->getUploadInfo(); 
        
    }
}

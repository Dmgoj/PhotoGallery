<?php

class ManagementController extends ManagementModel
{
    private $img_destination;
    private $username;
    private $img_path;
       
    public function __construct($img_destination, $username)
    {
        $this->img_destination = $img_destination;
        $this->username=$username;
        $this->img_path=$img_destination;
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

    // Remove image path from database
    public function removeImage()
    {
        $this->deleteImage($this->img_path);
    }

    public function imageCount()
    {
        return $this->countImage();
      
       
    }
}

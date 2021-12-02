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

    public function uploadImagePath()
    {
        $this->setImagePath($this->img_destination, $this->username);
    }

    public function showImages()
    {
        return $this->getImages();
        
        //var_dump($this->getImages());
        //die();
    }

    public function showUsers()
    {
        return $this->getUploaderNames(); 
        
    }


}

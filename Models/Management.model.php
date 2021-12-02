<?php

class ManagementModel extends Database
{
    public $test=5;
    protected function setImagePath($img_destination,$username)
    {
        $query1 = $this->connect()->query("SELECT id FROM users WHERE username = '$username'");
        $query1->execute();
        $user_id = $query1->fetch(PDO::FETCH_ASSOC);
        $stmt = $this->connect()->prepare('INSERT INTO images(image, user_id) VALUE (?, ?);');
        $stmt->execute(array($img_destination, $user_id['id']));
    }

    public function getImages()
    {
        $stmt=$this->connect()->query("SELECT image  FROM `images`");
        $stmt->execute();
        $images=$stmt->fetchAll(PDO::FETCH_ASSOC);
       /*var_dump($images);
       var_dump($images[0]['image']);
       die();*/
        return $images;
        
    }
    
    public function getUploaderNames() 
    {
        $stmt=$this->connect()->query("SELECT username FROM users,images WHERE images.user_id=users.id");
        $stmt->execute();
        $names=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $names;
    }
}



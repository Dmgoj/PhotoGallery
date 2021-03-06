<?php

class ManagementModel extends Database
{
    protected function setImagePath($img_destination,$username)
    {
        $query = $this->connect()->query("SELECT id FROM users WHERE username = '$username'");
        $query->execute();
        $user_id = $query->fetch(PDO::FETCH_ASSOC);
        $stmt = $this->connect()->prepare('INSERT INTO images(image, user_id) VALUE (?, ?);');
        $stmt->execute(array($img_destination, $user_id['id']));
    }

    protected function getImages()
    {
        $stmt=$this->connect()->query("SELECT image  FROM `images`");
        $stmt->execute();
        $images=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $images;
    }
    
    protected function getUploadInfo() 
    {
        $stmt=$this->connect()->query("SELECT * FROM users,images WHERE images.user_id=users.id");
        $stmt->execute();
        $names=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $names;
    }

    protected function deleteImage($img_path)
    {
        $stmt=$this->connect()->query("DELETE FROM images WHERE image='$img_path'");
        $stmt->execute();
    }

    protected function countImage()
    {
        $stmt=$this->connect()->query("SELECT * FROM images");
        $stmt->execute();
        
        return $stmt->rowCount();
        
    }
}



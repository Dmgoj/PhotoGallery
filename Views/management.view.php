<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location:home.view.php");
}

require_once "../Database.php";
require_once "../Models/Management.Model.php";
require_once "../Controllers/Management.Controller.php";

$images=new ManagementController(null, null);
$users_and_images= $images->showUsers();

//var_dump($users);
//die();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="../index.php"><?= $_SESSION['user']; ?></a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </nav>
    <form action="../management.php" method="post" enctype="multipart/form-data">
        <input type="file" id="image" name="image">
        <input type="submit" name="submit" value="Upload">
        <hr>
    </form>
    <table>
    
        <?php 
        $b = 0;
        foreach ($users_and_images as $img) {
            
        
            if ($b==0) {echo "<tr>"; }
            
            echo "<td> <img src='../" . $img['image'] . "' alt='PICTURE' width='100' height='100'><br>" . $img['username'];  ?> 
               
               
               <?php if ($_SESSION['user'] == $img['username']){
                   
                    echo "<form action='../management.php' method='post'>
                    <input type='hidden' name='image_to_delete' value='" . $img['image'] . "'>
                    <button name='remove'>REMOVE</button></form>";    
                    }  ?> 
               <?php echo "</td>" ;  

                $b++;
              
              if ($b==4) {echo "</tr>"; $b=0;}
            
       }  
         ?>
        

      -------
    
    </table>
</body>
</html>
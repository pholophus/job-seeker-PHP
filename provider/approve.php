<?php 
    session_start(); 
    $db = mysqli_connect('localhost', 'root', 'mibikaboom', 'muazfyp');
    
    //die($uname);
    
    if (isset( $_GET["app"])) {
        //die($password);
        $id = $_GET["app"];

        mysqli_query($db, "UPDATE jobs SET `condition`='2' WHERE id='$id'");
        $_SESSION['message'] = "Accepted!"; 
        
        header('location: pending.php');
    }
?>
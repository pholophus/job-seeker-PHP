<?php 
    session_start(); 
    $db = mysqli_connect('localhost', 'root', 'mibikaboom', 'muazfyp');
    $uname = $_GET["uname"];
    //die($uname);
    
    if (isset($_POST['update_user'])) {
        $username = $_POST['username'];
        $phone = $_POST['phone'];
        $IC = $_POST['IC'];
        $email = $_POST['email'];
        $password_1 = $_POST['password_1'];
        $password= md5($password_1);
        //die($password);
    
        mysqli_query($db, "UPDATE providers SET username='$username', email='$email', password='$password', phone='$phone', IC='$IC' WHERE username='$uname'");
        $_SESSION['message'] = "Profile updated!"; 
        header('location: list.php');
    }
?>
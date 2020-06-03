<?php 
    session_start(); 
    $db = mysqli_connect('localhost', 'root', 'mibikaboom', 'muazfyp');
    
    //die($uname);
    
    if (isset( $_GET["rej"])) {
        //die($password);
        $id = $_GET["rej"];
        //die($id);

        $uname = $_SESSION['username'];
        //die($uname);
        $query = "SELECT `id` FROM users WHERE `username` ='$uname'";
        $result = mysqli_query($db, $query);
        $n = mysqli_fetch_array($result);
        
        $user_id = $n['id'];

        $query = "UPDATE jobs_users SET `jobid`=$id, `status`=3, `user_id`=0 WHERE `jobid`='$id' AND `user_id`='$user_id' ";
        mysqli_query($db, $query);

        $sql = "SELECT `workers` FROM jobs WHERE id ='$id'";
        $result = mysqli_query($db, $sql);
        $n = mysqli_fetch_array($result);

        $workers = $n['workers'];
        $workers=$workers+1;

        mysqli_query($db, "UPDATE jobs SET `condition`='0', `user_id`= 0, `workers`=$workers WHERE id='$id'");
        $_SESSION['message'] = "Rejected!"; 
        header('location: pending.php');
    }
?>
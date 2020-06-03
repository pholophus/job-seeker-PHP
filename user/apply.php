<?php 
    session_start(); 
    $db = mysqli_connect('localhost', 'root', 'mibikaboom', 'muazfyp');
    
    //die($uname);
    
    if (isset( $_GET["app"])) {
        //die($password);
        $id = $_GET["app"];
        //die($id);
        $uname = $_SESSION['username'];
        //die($uname);
        $query = "SELECT `id` FROM users WHERE `username` ='$uname'";
        $result = mysqli_query($db, $query);
        $n = mysqli_fetch_array($result);
        
        $user_id = $n['id'];

        $query = "INSERT INTO jobs_users (`jobid`, `status`, `user_id`) 
        VALUES('$id', '1', $user_id)";

        mysqli_query($db, $query);
        
        $sql = "SELECT `workers` FROM jobs WHERE id ='$id'";
        $result = mysqli_query($db, $sql);
        $n = mysqli_fetch_array($result);

        $workers = $n['workers'];
        //$workers =(int)$work; */
        //$workers = $work;
        //$workers = intval($work);
        if($workers > 0)
        {
            $workers = $workers-1;
            mysqli_query($db, "UPDATE jobs SET `condition`='1', `workers`=$workers WHERE id='$id'");
            mysqli_query($db, "");
        }

       
        $_SESSION['message'] = "Applied!"; 
        header('location: list.php');
    }
?>
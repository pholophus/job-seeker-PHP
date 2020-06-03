<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
} 
$db = mysqli_connect('localhost', 'root', 'mibikaboom', 'muazfyp');

    $uname = $_SESSION['username'];
    //die($uname);
    $query = "SELECT `id` FROM users WHERE `username` ='$uname'";
    $result = mysqli_query($db, $query);
    $n = mysqli_fetch_array($result);

    $user_id = $n['id'];

    //DIE($user_id);
    $id = array();
    $sql = "SELECT jobid FROM jobs_users WHERE `user_id` = '$user_id' AND (`status` = 2 OR `status` = 1) ";
    $result = mysqli_query($db,$sql);
    while($row = mysqli_fetch_array($result)){
        $id[] = $row['jobid'];
       }
    $ids = join(",",$id);


if($ids == NULL)
{
    if(isset($_POST['category']))
    {
        $category = $_POST['category'];
        //$query = "SELECT provider_id FROM jobs WHERE `condition`='0' AND `category`='$category'";
        $sql = "SELECT * FROM jobs WHERE `category`='$category' AND `workers` > 0";
        $result = mysqli_query($db, $sql);  
    }
    else
    {
        //$query = "SELECT provider_id FROM jobs WHERE `condition`='0'";
        $sql = "SELECT * FROM jobs WHERE `workers` > 0";
        $result = mysqli_query($db, $sql);
    }
}
else
{
    if(isset($_POST['category']))
    {
        $category = $_POST['category'];
        //$query = "SELECT provider_id FROM jobs WHERE `condition`='0' AND `category`='$category'";
        $sql = "SELECT * FROM jobs WHERE `category`='$category' AND `id` AND `workers` > 0 NOT IN ($ids) ";
        $result = mysqli_query($db, $sql);  
    }
    else
    {
        //$query = "SELECT provider_id FROM jobs WHERE `condition`='0'";
        $sql = "SELECT * FROM jobs WHERE `id` AND `workers` > 0 NOT IN ($ids)";
        $result = mysqli_query($db, $sql);
    }
}


?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-8">
        <a href="list.php" class="btn btn-primary">All</a>
        <a href="history.php" class="btn btn-primary">History Jobs</a>
        <form action="" method="post">
            <select name="category">
                <option value="Customer Service">Customer Service</option>
                <option value="Marketing">Marketing</option>
                <option value="Food">Food</option>
                <option value="Hardware">Hardware</option>
            </select>
            <button type="submit">SUBMIT</button>
        </form>


        <?php// echo $_SESSION["username"];?>
            <?php 
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                            echo"<div class='card my-2' style='width: 18rem;'>
                                    <div class='card-header'>
                                        <h5 class='card-title'>Title : ".$row["title"]."</h5>
                                    </div>
                                    <div class='card-body'>
                                        
                                        <p class='card-text'>Description : ".$row["description"]."</p>
                                        <p class='card-text'>Duration : ".$row["startTime"]." to ".$row["endTime"]."</p>
                                        <p class='card-text'>Salary : ".$row["startSalary"]." per ".$row["endSalary"]."</p>
                                        <p class='card-text'>Workers Needed : ".$row["workers"]."</p>
                                        <p class='card-text'>Phone No. : ".$row["phone"]."</p>
                                        <p class='card-text'>Category : ".$row["category"]."</p>
                                    </div>
                                    <div>
                                        <a class='btn btn-primary' href='apply.php?app=".$row['id']."'>Apply</a>
                                    </div>
                                </div>";   
                    }
                } else {
                    echo "0 results";
                }
            ?>
        </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
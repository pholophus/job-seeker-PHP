<?php 
    session_start(); 
    $db = mysqli_connect('localhost', 'root', 'mibikaboom', 'muazfyp');
	$username = $_GET["username"];
    $sql = "SELECT * FROM users WHERE `username` = '$username' ";
    $result = mysqli_query($db, $sql);

        $n = mysqli_fetch_array($result);
        $username = $n['username'];
        $IC = $n['IC'];
        $email = $n['email'];
        $phone = $n['phone'];

?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="updateProfile.php?uname=<?php echo $username;?>">
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
    <div class="input-group">
  	  <label>IC No.</label>
  	  <input type="text" name="IC" value="<?php echo $IC; ?>">
  	</div>
      <div class="input-group">
  	  <label>No. Phone</label>
  	  <input type="text" name="phone" value="<?php echo $phone; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="update_user">Update</button>
  	</div>
  </form>
</body>
</html>
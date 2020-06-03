<?php
	session_start();
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
  
	
  <form method="post" action="job.php">
  	<div class="input-group">
  	  <label>Category</label>
		<select name="category">
			<option value="Customer Service">Customer Service</option>
			<option value="Marketing">Marketing</option>
			<option value="Food">Food</option>
			<option value="Hardware">Hardware</option>
		</select>
  	</div>
    <div class="input-group">
  	  <label>Title</label>
  	  <input type="text" name="title">
  	</div>
    <div class="input-group">
  	  <label>Description</label>
  	  <input type="text" name="description" >
  	</div>
	  <div class="input-group">
  	  <label>Contact No.</label>
  	  <input type="text" name="phone" >
  	</div>
  	<div class="input-group">
  	  <label>Duration</label>
  	  <input type="text" name="startTime" >
		to
	  <input type="text" name="endTime" >
  	</div>
  	<div class="input-group">
  	  <label>Salary</label>
  	  <input type="text" name="startSalary" >
		to
	  <input type="text" name="endSalary" >
  	</div>
  	<div class="input-group">
  	  <label>Workers Needed</label>
  	  <input type="text" name="workers">
  	</div>
	  <input type="hidden" name="condition" value=0>
	  <input type="hidden" name="uname" value="<?php echo $_SESSION['username'];?>">
  	<div class="input-group">
  	  <button type="submit" class="btn" name="job_post">Post</button>
  	</div>
  </form>
</body>
</html>
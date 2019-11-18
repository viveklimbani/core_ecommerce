<?php

session_start();
include ('config.php');

if(isset($_POST['submit']))
{	
	//extract($_POST);
	
	$username = $_POST['username'];	
	$password = $_POST['password'];

	$query = ("SELECT * from users where username = '$username' and password='$password' ");
	$sql = mysqli_query($conn,$query);
	$row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
	//$count = mysqli_num_rows($sql);

	if ($row['user_type_id'] == 1) {

		header("location:admin_dashboard.php");
	}
	elseif ($row['user_type_id'] == 2) {

		header("location:merchant_dashboard.php");
	}
	elseif ($row['user_type_id'] == 3) {

		header("location:customer_dashboard.php");
	}
	elseif ($row['user_type_id'] == 4) {

		header("location:user_dashboard.php");
	}
	else
	{
		echo "Please check your Email-Id or Password";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<style>

	.myform{
		margin: 10px 300px;
		border: 2px solid black;
		border-radius: 10px;
		padding: 10px 50px;
		background: lightblue;
	}
	form div{
		margin: 30px 0;
	}

	body{
		background-image: url("backimg.png");
		background-position: center;
		background-size:200%;
		background-repeat: no-repeat;
	}
	

</style>
<body>
	<div class="container">
		<h2 style="color: white"><b><center>Login Form</center></b></h2>
		<form method="POST" class="myform" enctype="multipart/form-data" action="loginform.php">
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" class="form-control" id="username" placeholder="Enter Username" name="username">
			</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
			</div>
			<div class="checkbox">
				<label><input type="checkbox" name="remember"> Remember me</label>
			</div>
			<button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>

</body>
</html>
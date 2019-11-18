<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<style>
body{
	background-image: url("main.gif");
	background-position: center;
	background-size:200%;
	background-repeat: no-repeat;
}
</style>

	<body>
		<h1 style="background:black; color: white"><center><b>Merchant View</b></center></h1>
	<br><br>

		<div class="container">
		<a href='merchant_view.php'>
			<button class="btn btn-primary"> Manage merchant</button></a>
		<a href='product_addcart.php'>
			<button class="btn btn-primary"> Product Manage</button></a>

		<a href='logout.php'>
			<button class="btn btn-primary btn-danger" style="float:right;">Log Out</button></a><br><br>
			</a><br><br>
		</div>
	</body>
</html>


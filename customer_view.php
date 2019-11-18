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
		background-image: url("table1.jpg");
		background-position: center;
		background-size:200%;
		background-repeat: no-repeat;
	}

</style>
<body>
	<h1 style="background:black; color: white"><center>View Product	</center></h1>
	<br><br>

	<div class="container">
		<a href='customer_dashboard.php'>
			<button class="btn btn-primary" id="back" name="back">Back</button></a>

			<a href='logout.php'>
				<button class="btn btn-primary btn-danger" style="float:right;">Log Out</button></a><br><br>
			</a><br><br>

			<table class="table table-dark" >
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Merachant Name</th>
						<th scope="col">Product Image</th>
						<th scope="col">Price</th>
						<th scope="col">Discount</th>
						<th scope="col">Tax</th>
						<th scope="col">Add To Cart</th>
					</tr>
				</thead>
				<tbody>
					<?php

					$sql = "select * from merchant_details";
					$result = mysqli_query($conn,$sql);

					while($row = mysqli_fetch_assoc($result))
					{

						?>

						<tr>

							<th scope="row"><?php echo $row['id'] ?></th>
							<td><?php echo $row['name'] ?></td>
							<td><img src="<?php echo $row['image'] ?>" style="width: 80px; height:80px;"></td>
							<td><?php echo $row['price'].'/-Rs' ?></td>
							<td><?php echo $row['discount'].'%' ?></td>
							<td><?php echo $row['tax'].'%' ?></td>
							<?php $id = $row['id'] ?>
							<td><a href="customer_show.php" class="btn btn-info btn-lg">
								<span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</td>

							<?php }?>
						</tr>
					</tbody>
				</table>
			</div>
		</body>
		</html>
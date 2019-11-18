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
	<h1 style="background:black; color: white"><center>Admin Table</center></h1>
	<br><br>

	<div class="container">
		<a href='user_add.php'>
			<button class="btn btn-primary"> Add User</button></a>
		<a href='admin_dashboard.php'>
          	<button class="btn btn-primary" id="back" name="back">Back</button></a>

				<a href='logout.php'>
					<button class="btn btn-primary btn-danger" style="float:right;">Log Out</button></a><br><br>
				</a><br><br>

				<table class="table table-dark" border="2px solid black">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">First Name</th>
							<th scope="col">Last Name</th>
							<th scope="col">Email</th>
							<th scope="col">Contact No</th>
							<th scope="col">Gender</th>
							<th scope="col">DOB</th>
							<th scope="col">Country</th>
							<th scope="col">State</th>
							<th scope="col">City</th>
							<th scope="col">Address1</th>
							<th scope="col">Address2</th>
							<th scope="col">Pincode</th>
							<th scope="col">ACTION</th>
						</tr>
					</thead>
					<tbody>
						<?php

						$sql = "select * from user_details";
						$result = mysqli_query($conn,$sql);

						while($row = mysqli_fetch_assoc($result))
						{

							?>

							<tr>
								
								<th scope="row"><?php echo $row['id'] ?></th>
								<td><?php echo $row['firstname'] ?></td>
								<td><?php echo $row['lastname'] ?></td>
								<td><?php echo $row['email'] ?></td>
								<td><?php echo $row['mobile'] ?></td>
								<td><?php echo $row['gender'] ?></td>
								<td><?php echo $row['date_of_birth'] ?></td>
								<td><?php echo $row['country'] ?></td>
								<td><?php echo $row['state'] ?></td>
								<td><?php echo $row['city'] ?></td>
								<td><?php echo $row['address1'] ?></td>
								<td><?php echo $row['address2'] ?></td>
								<td><?php echo $row['pincode'] ?></td>
								<?php $id = $row['id'] ?>

								<td>
									<a href="user_update.php?<?php echo 'id=' .$id; ?>">
										<p style="float:left;" data-placement="top" data-toggle="tooltip" title="Edit"></p>
										<button class="btn btn-primary btn-xs" data-toggle="modal" data-title="Edit" data-target="#edit">
											<span class="glyphicon glyphicon-pencil"></span>
										</button>
									</a>

									<a href="user_delete.php?<?php echo 'id=' .$id; ?>">
										<p style="float:left;" data-placement="top" data-toggle="tooltip" title="Delete"></p>
										<button onclick="return confirm('Are you sure want to delete this item?');" class="btn btn-danger btn-xs" data-toggle="modal" data-title="Delete" data-target="#delete">
											<span class="glyphicon glyphicon-trash"></span>
										</button>
									</a>
								</td>
							<?php }?>
						</tr>
					</tbody>
				</table>
			</div>
		</body>
		</html>
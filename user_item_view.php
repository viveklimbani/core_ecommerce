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
	<h1 style="background:black; color: white"><center>Items Table</center></h1>
	<br><br>

	<div class="container">
		<a href='add_items.php'>
			<button class="btn btn-primary"> Add Items</button></a>
			<a href='admin_dashboard.php'>
				<button class="btn btn-primary" id="back" name="back">Back</button></a>

				<a href='logout.php'>
					<button class="btn btn-primary btn-danger" style="float:right;">Log Out</button></a><br><br>
				</a><br><br>

				<table class="table table-dark" border="2px solid black">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Image</th>
							<th scope="col">ACTION</th>
						</tr>
					</thead>
					<tbody>
						<?php

						$sql = "SELECT * FROM item_image ORDER BY id ASC";
						$result = mysqli_query($conn,$sql);

						while($row = mysqli_fetch_assoc($result))
						{
							$imageURL = 'uploads/'.$row["file_name"];
							?>
							<tr>
								<th scope="row"><?php echo $row['id'] ?></th>
								<td><img src="<?php echo $imageURL; ?>" alt="" style="width: 30px; height:30px;" /></td>
								<?php $id = $row['id'] ?>
								<td>
									<a href="item_delete.php?<?php echo 'id=' .$id; ?>">
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

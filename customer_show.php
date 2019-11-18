<?php

session_start();
include('config.php');
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
	$code = $_POST['code'];
	$result = mysqli_query($conn,"SELECT * FROM `products` WHERE `code`='$code'");
	$row = mysqli_fetch_assoc($result);
	$name = $row['name'];
	$code = $row['code'];
	$price = $row['price'];
	$image = $row['image'];

	$cartArray = array(
		$code=>array(
			'name'=>$name,
			'code'=>$code,
			'price'=>$price,
			'quantity'=>1,
			'image'=>$image)
	);

	if(empty($_SESSION["shopping_cart"])) {
		$_SESSION["shopping_cart"] = $cartArray;
		$status = "<div class='box'>Product is added to your cart!</div>";
	}else{
		$array_keys = array_keys($_SESSION["shopping_cart"]);
		if(in_array($code,$array_keys)) {
			$status = "<div class='box' style='color:red;'>
			Product is already added to your cart!</div>";	
		} else {
			$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
			$status = "<div class='box'>Product is added to your cart!</div>";
		}

	}
}
?>
<html>
<head>
	<title>Product View</title>
	<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
</head>
<style>
	#logout{
		float:right;
		background-color:blue;
		color:white;
		margin-right:30px;
	}
	#back{
		float:right;
		background-color:blue;
		color:white;
		margin-right:30px;
	}
	#add{
		background-color:blue;
		color:white;
		margin-right:30px;
	}
	
</style>
<body>
	<h1 style="background:black; color: white"><center>Product View</center></h1>
	<button class="btn" id="logout" name="logout">Log Out</a></button>
	<a href='customer_dashboard.php'>
		<button class="btn btn-primary" id="back" name="back">Back</button></a>
	</div></h1>
	<div style="width:700px; margin:50 auto;">

		<h2>Product View</h2>   

		<?php
		if(!empty($_SESSION["shopping_cart"])) {
			$cart_count = count(array_keys($_SESSION["shopping_cart"]));
			?>
			<div class="cart_div">
				<a href="cart.php"><img src="cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></a>
			</div>
			<?php
		}

		$result = mysqli_query($conn,"SELECT * FROM `products`");
		while($row = mysqli_fetch_assoc($result)){
			echo "<div class='product_wrapper'>
			<form method='post' action=''>
			<input type='hidden' name='code' value=".$row['code']." />
			<div class='image'><img src='".$row['image']."' /></div>
			<div class='name'>".$row['name']."</div>
			<div class='price'>".$row['price']."Rs/-</div>
			<button type='submit' class='buy'>Buy Now</button>
			</form>
			</div>";
		}
		mysqli_close($conn);
		?>

		<div style="clear:both;"></div>

		<div class="message_box" style="margin:10px 0px;">
			<?php echo $status; ?>
		</div>
	</div>
</body>
</html>

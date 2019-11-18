<?php
include ('config.php'); 

$id = $_REQUEST["id"];

$query = "delete from merchant_details where id = '$id';";
$result = mysqli_query($conn, $query);
if($result)
{
	header('Location:merchant_view.php');
}
?>
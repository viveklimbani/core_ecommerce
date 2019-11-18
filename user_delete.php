<?php
include ('config.php'); 

$id = $_REQUEST["id"];

$query = "delete from user_details where id = '$id';";
$result = mysqli_query($conn, $query);
if($result)
{
	header('Location:user_view.php');
}
?>
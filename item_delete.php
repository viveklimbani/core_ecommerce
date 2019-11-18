<?php
include ('config.php'); 

$id = $_REQUEST["id"];

$query = "delete from item_image where id = '$id';";
$result = mysqli_query($conn, $query);
if($result)
{
	header('Location:user_item_view.php');
}
?>
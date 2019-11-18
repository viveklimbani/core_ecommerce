<?php
if(isset($_POST['submit'])){
    // Include the database configuration file
	include_once 'config.php';

    // File upload configuration
	$targetDir = "uploads/";
	$allowTypes = array('jpg','png','jpeg','gif');

	$statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
	if(!empty(array_filter($_FILES['files']['name']))){
		foreach($_FILES['files']['name'] as $key=>$val){
            // File upload path
			$fileName = basename($_FILES['files']['name'][$key]);
			$targetFilePath = $targetDir . $fileName;

            // Check whether file type is valid
			$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
			if(in_array($fileType, $allowTypes)){
                // Upload file to server
				if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
                    // Image db insert sql
					$insertValuesSQL .= "('".$fileName."', NOW()),";
				}else{
					$errorUpload .= $_FILES['files']['name'][$key].', ';
				}
			}else{
				$errorUploadType .= $_FILES['files']['name'][$key].', ';
			}
		}

		if(!empty($insertValuesSQL)){
			$insertValuesSQL = trim($insertValuesSQL,',');

            // Insert image file name into database
			$sql =("INSERT INTO item_image (file_name, uploaded_on) VALUES $insertValuesSQL");

			$result=mysqli_query($conn,$sql);

			if($sql < 5){
				$errorUpload = !empty($errorUpload)?'Upload Error: '.$errorUpload:'';
				$errorUploadType = !empty($errorUploadType)?'File Type Error: '.$errorUploadType:'';
				$errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType;
				$statusMsg = "Files are uploaded successfully.".$errorMsg;
			}else{
				$statusMsg = "Sorry, there was an error uploading your file.";
			}
		}
	}else{
		$statusMsg = 'Please select a file to upload.';
	}
    // Display status message
	echo $statusMsg;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Manae Items</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="stylesheet" type="text/css" href="css/loginstyle.css"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/   bootstrap-datepicker.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
	<style>
		.myform{
			margin: 10px 300px;
			border: 2px solid black;
			border-radius: 10px;
			padding:  10px 50px;
		}
		form div {
			margin: 3px 0;
		}
		#h1{
			background-color: black;
			height:100px;
			color: white;
			text-align: center;
			padding:20px 20px;
		}
		
		#back{
			float:right;
			background-color:green;
			color:black;
			margin-right:30px;
		}
	</style>
</head>
<body>
	<h1 id="h1">Manage Items <div>
		<a href='user_item_view.php'>
			<button class="btn btn-primary" id="back" name="back">Back</button></a>
		</div>
	</h1>
	<form action="" method="post" enctype="multipart/form-data">
		<br><b>Select Image</b> :<br>
		<input type="file" name="files[]" multiple ><br>
		<input type="submit" name="submit" value="UPLOAD">
	</form>
</body>
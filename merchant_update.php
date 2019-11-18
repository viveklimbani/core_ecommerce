<?php

include("config.php");
if(isset($_POST['logout']))
{
  $logout=$_POST['logout'];
  if($logout)
  {
    header('Location:loginform.php');
  }
}

$id= $_REQUEST["id"];
$query = "select * from merchant_details where id = '$id'"; 
$result =mysqli_query($conn, $query); 
$row=mysqli_fetch_assoc($result); 
$id = $row["id"];

if(isset($_POST['submit']))
{
   // var_dump($_POST);exit;
  $name        = $_POST['name'];
  $price       = $_POST['price'];
  $discount    = $_POST['discount'];
  $tax         = $_POST['tax'];
  $image=$_FILES['fileToUpload'];
  $temp=$image['name'];
  $hello="product-images/".$temp;

   // echo $hello;exit;
  $target_dir = "product-images/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image

  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) 
  {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else 
  {
    echo "File is not an image.";
    $uploadOk = 0;
  }
    // Check if file already exists
  if (file_exists($target_file)) 
  {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }
    // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) 
  {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }
    // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) 
  {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
  } else 
  {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
    {
      echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else 
    {
      echo "Sorry, there was an error uploading your file.";
    }
  }

  $sql = "UPDATE merchant_details set name='$name', image='$hello', price = '$price', discount='$discount', tax='$tax' where id='$id' ";
        //var_dump($sql);exit;
   // echo '<pre>';print_r($sql);

  $result=mysqli_query($conn, $sql);

  if($result)
  {
    header("location:merchant_view.php");
  }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
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
    #logout{
      float:right;
      background-color:green;
      color:black;
      margin-right:30px;
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

  <h1 id="h1">Register Form <div>
    <button class="btn" id="logout" name="logout">Log Out</a></button>
    <a href='merchant_view.php'>
      <button class="btn btn-primary" id="back" name="back">Back</button></a>
    </div></h1>

    <form method="POST" class="myform" enctype="multipart/form-data">
      <div class="form-group">
        <label for="name"><b>Name:</b></label>
        <input type="text"  class="form-control" placeholder="Enter name" name="name" value="<?php echo $row['name'] ?>" >
      </div>

      <div class="form-group">
        <label for="price"><b>Price:</b></label>
        <input type="number" placeholder="Enter price" name="price"  class="form-control" value="<?php echo $row['price'] ?>">
      </div>

      <div class="form-group">
        <label for="discount"><b>Discount</b></label>
        <input type="number" placeholder="Enter discount" name="discount" class="form-control" value="<?php echo $row['discount'] ?>" >
      </div>

      <div class="form-group">
        <label for="tax"><b>Tax</b></label>
        <input type="text" placeholder="Enter tax" name="tax" class="form-control" value="<?php echo $row['tax']?>">
      </div>

      <div class="form-group">
        <label for="image"><b>Image</b></label><br>
        <input type="file" name="fileToUpload" class="form-control" value="img src=<?php echo $row['image']['name'] ?>">
      </div>

      <div>
        <button class="btn btn-primary"  name="submit" id="submit" value="submit">Register</button>
      </div>
    </form>

  </body>
  </html>

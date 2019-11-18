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

if(isset($_POST['submit']))
{
   // var_dump($_POST);exit;
    $firstname      = $_POST['firstname'];
    $lastname       = $_POST['lastname'];
    $email          = $_POST['email'];
    $mobile         = $_POST['mobile'];
    $gender         = $_POST['gender'];
    $dob            = $_POST['date_of_birth'];
    $country        = $_POST['country'];
    $state          = $_POST['state'];
    $city           = $_POST['city'];
    $address1       = $_POST['address1'];
    $address2       = $_POST['address2'];
    $pincode        = $_POST['pincode'];
    
    $sql="INSERT INTO user_details(firstname,lastname,email,mobile,gender,date_of_birth,country,state,city,address1,address2,pincode) values 
    ('$firstname','$lastname','$email','$mobile','$gender','$dob','$country','$state','$city','$address1','$address2','$pincode')";
        //var_dump($sql);exit;
   // echo '<pre>';print_r($sql);

    $result=mysqli_query($conn,$sql);

    if($result)
    {
        header("location:user_view.php");
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
      <a href='user_view.php'>
          <button class="btn btn-primary" id="back" name="back">Back</button></a>
      </div></h1>

      <form method="POST" class="myform" enctype="multipart/form-data">
          <div class="form-group">
            <label for="firstname"><b>Firstname:</b></label>
            <input type="text"  class="form-control" placeholder="Enter Firstname" name="firstname" >
        </div>

        <div class="form-group">
            <label for="lastname"><b>Lastname:</b></label>
            <input type="text" placeholder="Enter Lastname" name="lastname"  class="form-control">
        </div>

        <div class="form-group">
            <label for="email"><b>Email</b></label>
            <input type="Email" placeholder="Enter Email" name="email" class="form-control" >
        </div>

        <div class="form-group">
            <label for="mobile"><b>Mobile No:</b></label>
            <input type="tel" id="mobile" name="mobile" pattern='\d{2}\d{4}\d{4}' placeholder="Enter mobile no" >
        </div>

        <div class="form-group">
            <label for="gender"><b>Gender</b></label><br>
            <label><input type="radio" name="gender" value="male"  checked>Male</label><br>
            <label><input type="radio" name="gender" value="female">Female</label>
        </div>

        <div class="form-group"> 
            <label class="control-label" for="date_of_birth">Date Of Birth</label>
            <input type="text" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="MM/DD/YYY" />
        </div>

        <div class="form-group">
            <label for="country"><b>Country</b></label>
            <select id="country" name="country" >
              <option value="india">India</option>
              <option value="usa">USA</option>
          </select>
      </div>

      <div class="form-group">
        <label for="state"><b>State</b></label>
        <select id="state" name="state" >
          <option value="Gujarat">Gujarat</option>
          <option value="Maharashtra">Maharashtra</option>
          <option value="Karnataka">Karnataka</option>
          <option value="Punjab">Punjab</option>
      </select>
  </div>

  <div class="form-group">
    <label for="city"><b>City</b></label>
    <select id="city" name="city">
      <option value="Rajkot">Rajkot</option>
      <option value="Ahmedabad">Ahmedabad</option>
      <option value="Suart">Surat</option>
      <option value="Suart">Baroda</option>
  </select>
</div>

<div class="form-group">
    <label for="address1">Address1:</label><br>
    <input type="text" name="address1" placeholder="Enter your address.." class="form-control" >
</div>

<div class="form-group">
    <label for="address2">Address2:</label><br>
    <input type="text" name="address2" placeholder="Enter your address.." class="form-control" >
</div>

<div class="form-group">
    <label for="pincode">Pincode No:</label><br>
    <input type="text" name="pincode" placeholder="Enter your pincode.." class="form-control" >
</div>

<div>
    <button class="btn btn-primary"  name="submit" id="submit" value="submit">Register</button>
</div>
</form>

</body>
</html>

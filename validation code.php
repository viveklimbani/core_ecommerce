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
 $fnameErr = $lnameErr  = $emailErr = $mobileErr = $genderErr = $dobErr = $countryErr = $stateErr = $cityErr = $add1Err = $add2Err = $pinErr =  "";
  $firstname = $lastname  = $email = $mobile = $gender = $dob = $country = $state = $city = $address1 = $address2 = $pincode = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(isset($_POST['submit']))
{
   // var_dump($_POST);exit;
      /*$firstname      = $_POST['firstname'];
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
      $pincode        = $_POST['pincode'];*/
//var_dump($_POST["firstname"]);exit;
    if (empty($_POST["firstname"])) {
     $fnameErr = "First Name is required";
   }else {
     $firstname = test_input($_POST["lastname"]);
   }
   if (empty($_POST["firstname"])) {
     $lnameErr = "Last Name is required";
   }else {
     $lastname = test_input($_POST["lastname"]);
   }
   if (empty($_POST["email"])) {
     $emailErr = "Email is required";
   }else {
     $email = test_input($_POST["email"]);

                     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
  if (empty($_POST["mobile"])) {
   $mobileErr = "mobile No is required";
 }else {
   $mobile = test_input($_POST["mobile"]);
 }
 if (empty($_POST["gender"])) {
   $genderErr = "Gender is required";
 }else {
   $gender = test_input($_POST["gender"]);
 }
 if (empty($_POST["date_of_birth"])) {
   $dobErr = "Date Of Birth is required";
 }else {
   $dob = test_input($_POST["date_of_birth"]);
 }
 if (empty($_POST["country"])) {
   $countryErr = "country is required";
 }else {
   $country = test_input($_POST["country"]);
 }
 if (empty($_POST["state"])) {
   $stateErr = "state is required";
 }else {
   $state = test_input($_POST["state"]);
 }
 if (empty($_POST["city"])) {
   $cityErr = "city is required";
 }else {
   $city = test_input($_POST["city"]);
 }
 if (empty($_POST["address1"])) {
   $add1Err = "city is required";
 }else {
   $address1 = test_input($_POST["address1"]);
 }
 if (empty($_POST["address2"])) {
   $add2Err = "city is required";
 }else {
   $address2 = test_input($_POST["address2"]);
 }
 if (empty($_POST["pincode"])) {
   $pinErr = "pincode is required";
 }else {
   $pincode = test_input($_POST["pincode"]);
 }




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
}
    
?>
<?php   function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
} ?>

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
<p><span class = "error">* required field.</span></p>
    <form method="POST" class="myform" enctype="multipart/form-data" action = "<?php 
         echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
      <div class="form-group">
        
        <label for="firstname"><b>Firstname:</b></label>
        <span class = "error">* <?php echo $fnameErr;?></span>
        <input type="text"  class="form-control" placeholder="Enter Firstname" name="firstname" >
        
      </div>

      <div class="form-group">
        <label for="lastname"><b>Lastname:</b></label>
        <span class = "error">* <?php echo $lnameErr;?></span>
        <input type="text" placeholder="Enter Lastname" name="lastname"  class="form-control">
      </div>

      <div class="form-group">
        <label for="email"><b>Email</b></label>
        <span class = "error">* <?php echo $emailErr;?></span>
        <input type="Email" placeholder="Enter Email" name="email" class="form-control" >
      </div>

      <div class="form-group">
        <label for="mobile"><b>Mobile No:</b></label>
        <span class = "error">* <?php echo $mobileErr;?></span>
        <input type="tel" id="mobile" name="mobile" pattern='\d{2}\d{4}\d{4}' placeholder="Enter mobile no" >
      </div>

      <div class="form-group">
        <label for="gender"><b>Gender</b></label><br>
        <span class = "error">* <?php echo $genderErr;?></span>
        <label><input type="radio" name="gender" value="male"  checked>Male</label><br>
        <label><input type="radio" name="gender" value="female">Female</label>
      </div>

      <div class="form-group"> 
        <label class="control-label" for="date_of_birth">Date Of Birth</label>
        <span class = "error">* <?php echo $dobErr;?></span>
        <input type="text" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="MM/DD/YYY" />
      </div>

      <div class="form-group">
        <label for="country"><b>Country</b></label>
        <span class = "error">* <?php echo $countryErr;?></span>
        <select id="country" name="country" >
          <option value="india">India</option>
          <option value="usa">USA</option>
        </select>
      </div>

      <div class="form-group">
        <label for="state"><b>State</b></label>
        <span class = "error">* <?php echo $stateErr;?></span>
        <select id="state" name="state" >
          <option value="Gujarat">Gujarat</option>
          <option value="Maharashtra">Maharashtra</option>
          <option value="Karnataka">Karnataka</option>
          <option value="Punjab">Punjab</option>
        </select>
      </div>

      <div class="form-group">
        <label for="city"><b>City</b></label>
        <span class = "error">* <?php echo $cityErr;?></span>
        <select id="city" name="city">
          <option value="Rajkot">Rajkot</option>
          <option value="Ahmedabad">Ahmedabad</option>
          <option value="Suart">Surat</option>
          <option value="Suart">Baroda</option>
        </select>
      </div>

      <div class="form-group">
        <label for="address1">Address1:</label><br>
        <span class = "error">* <?php echo $add1Err;?></span>
        <input type="text" name="address1" placeholder="Enter your address.." class="form-control" >
      </div>

      <div class="form-group">
        <label for="address2">Address2:</label><br>
        <span class = "error">* <?php echo $add2Err;?></span>
        <input type="text" name="address2" placeholder="Enter your address.." class="form-control" >
      </div>

      <div class="form-group">
        <label for="pincode">Pincode No:</label><br>
        <span class = "error">* <?php echo $pinErr;?></span>
        <input type="text" name="pincode" placeholder="Enter your pincode.." class="form-control" >
      </div>

      <div>
        <button class="btn btn-primary"  name="submit" id="submit" value="submit">Register</button>
      </div>
    </form>
    <?php
         echo "<h2>Your given values are as:</h2>";
         echo $firstname;
         echo "<br>";

         echo $firstname;
         echo "<br>";
         
         echo $email;
         echo "<br>";
         
         echo $mobile;
         echo "<br>";
         
         echo $gender;
         echo "<br>";

         echo $dob;
         echo "<br>";

         echo $country;
         echo "<br>";

         echo $state;
         echo "<br>";

         echo $city;
         echo "<br>";

         echo $address1;
         echo "<br>";

         echo $address2;
         echo "<br>";

         echo $pincode;
      ?>

  </body>
  </html>


if ($firstname == "") {
     $fnameErr = "First Name is required";
   }else { 
     $firstname = test_input($_POST["firstname"]);
   }
   if ($lastname == "") {
     $lnameErr = "Last Name is required";
   }else {
     $lastname = test_input($_POST["lastname"]);
   }
   if ($email == "") {
     $emailErr = "Email is required";
   }else {
     $email = test_input($_POST["email"]);

                     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
  if ($mobile == "") {
   $mobileErr = "mobile No is required";
 }else {
   $mobile = test_input($_POST["mobile"]);
 }
 if ($gender == "") {
   $genderErr = "Gender is required";
 }else {
   $gender = test_input($_POST["gender"]);
 }
 
 if ($address1 == "") {
   $add1Err = "city is required";
 }else {
   $address1 = test_input($_POST["address1"]);
 }
 if ($address2 == "") {
   $add2Err = "city is required";
 }else {
   $address2 = test_input($_POST["address2"]);
 }
 if ($pincode == "") {
   $pinErr = "pincode is required";
 }else {
   $pincode = test_input($_POST["pincode"]);
 }
 
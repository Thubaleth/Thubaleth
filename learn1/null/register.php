<?php
namespace Phppot;

use Phppot\CountryState;
require_once __DIR__ . '/Model/CountryStateCity.php';
$countryStateCity = new CountryStateCity();
$provinceResult = $countryStateCity->getAllProvinces();
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Registration Form</title>
    <link rel="stylesheet" href="style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>
<head>
<TITLE>E-Learning System</TITLE>
<head>
<link href="./assets/css/style.css" rel="stylesheet" type="text/css" />
<script src="./vendor/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="./assets/js/ajax-handler.js" type="text/javascript"></script>
</head>
<body>

<div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="#">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Username</span>
            <!--<input type="text" placeholder="Enter your name" required>-->
			<input class="input-box" name="username" type="text" placeholder = "Username" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input class="input-box" name="password" type="password" placeholder = "password" required>
          </div>
          <div class="input-box">
            <span class="details">Firstname</span>
            <input class="input-box" name="firstname" type="text" placeholder = "firstname" required>
          </div>
          <div class="input-box">
            <span class="details">Lastname</span>
            <input class="input-box" name="lastname" type="text" placeholder = "lastname" required>
          </div>
		  <div class="input-box">
            <span class="details">Email</span>
            <input class="input-box" name="email" type="text" placeholder = "email" required>
          </div>
		  <div class="input-box">
            <span class="details">Contact</span>
            <input class="input-box" name="contact" type="text" placeholder = "contact" required>
          </div>
		  <div class="input-box">
            <span class="details">Address</span>
            <input class="input-box" name="address" type="text" placeholder = "address" required>
          </div>
		  <div class="input-box">
            <label>Province:</label><br /> <select name="province"
                id="province-list" class="demoInputBox"
                onChange="getSchool(this.value);">
                <!--<option value disabled selected>Select Province</option> -->
<?php
foreach ($provinceResult as $province) {
    ?>
<option value="<?php echo $province["provID"]; ?>"><?php echo $province["provName"]; ?></option>
<?php
}
?>
</select>
        </div>
		
		 <div class="input-box">
            <label>School:</label><br /> <select name="school"
                id="school-list" class="demoInputBox">
                <!--<option value="">Select School</option>-->
            </select>
        </div>
        

		
         <!-- <div class="input-box">
            <span class="details">Password</span>
            <input type="text" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="text" placeholder="Confirm your password" required>
          </div>
        </div>-->
       
	   
	   
        <div class="button">
          <input href="Learn/admin/index.php"  type="submit" value="Register">
        </div>
   
       
         <div class="button">
	
	     <a href="indexx.php" type="button" class="btn btn-success btn-lg">Go Back</a>
		<div/>
    
</body>
</html>



<?php
if (isset($_POST['Register'])){
$username = $_POST['username'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['Email'];
$contact = $_POST['contact'];
$address = $_POST['address'];
$province = $_POST['province'];
$school = $_POST['school'];


$query = mysqli_query($conn,"select * from users where username = '$username' and password = '$password' and firstname = '$firstname'  and lastname='$lastname' and email='$email' and contact='$contact' 
and address='$address' and province='$province' and school='$school'")or die(mysqli_error());
$count = mysqli_num_rows($query);

if ($count > 0){ ?>
<script>
alert('Data Already Exist');
</script>
<?php
}else{
mysqli_query($conn,"insert into users (username,password,firstname,lastname,lastname,email,contact,address,province,school) values('$username','$password','$firstname','$lastname','$password','$email','$contact','$address','$province','$school')")or die(mysqli_error());

mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_username','Add User $username')")or die(mysqli_error());
?>
<script>
window.location = "Learn/admin/index.php";
</script>
<?php
}
}
?>
<?php include('dbcon.php'); ?>
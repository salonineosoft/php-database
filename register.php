<?php
//extract($_POST);
//include("database.php");
$conn = mysqli_connect("localhost","root","","myproject");

if(isset($_POST['save'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['pass'];
    $age=$_POST['age'];
    $city=$_POST['city'];

    $temp=$_FILES['image']['tmp_name'];
    $fname=$_FILES['image']['name'];

   
   $fn=$fname;

   $query=mysqli_query($conn,"SELECT * FROM users where email='$email'");
if(mysqli_num_rows($query)>0)
{
    echo"Email Id Already Exists"; 
	exit;
}
else{

    mkdir("users/" .$email);
    move_uploaded_file($temp,"users/$email/$fn");

    $img="users/$email/$fn";
    echo $img;

    $sql ="insert into users(name,email,password,age,city,image) values('$name','$email','$password','$age','$city','$img')";
    
    $query_run = mysqli_query($conn,$sql);

}

if($query_run)
{
   echo "registered";
//    header("location:welcome.php");
}
else
{
    echo "error try again";
}
}
?>









<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="assests/css/style.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>
<body>
<div class="signup-form">

    <form method="post" enctype="multipart/form-data">
		<h2>Register</h2>
		<p class="hint-text">Create your account</p>
        <div class="form-group"> NAME:
			<div class="row">
			 <div class="col"><input type="text" class="form-control" name="name" placeholder="First Name" required="required"></div>
				<!--<div class="col"><input type="text" class="form-control" name="uname" placeholder="Last Name" required="required"></div>-->
			</div>        	
        </div>
        <div class="form-group">
        	EMAIL:<input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
		<div class="form-group">
          PASSWORD  <input type="password" class="form-control" name="pass" placeholder="Password" required="required">
        </div>
		<!-- <div class="form-group">
            <input type="password" class="form-control" name="cpass" placeholder="Confirm Password" required="required">
        </div> -->
        <div class="form-group">
        	AGE:<input type="age" class="form-control" name="age" placeholder="age" required="required">
        </div>
        <div class="form-group">
        CITY:	<input type="city" class="form-control" name="city" placeholder="city" required="required">
        </div>
        <div class="form-group">
         IMAGE:   <input type="file" name="image" required>
            <!-- <input type="submit" name="upload" value="Upload" class="btn"> -->
        </div>        
        <!-- <div class="form-group">
			<label class="form-check-label"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> & <a href="#">Privacy Policy</a></label>
		</div> -->
		<div class="form-group">
            <button type="submit" name="save" class="btn btn-success btn-lg btn-block">Register Now</button>
        </div>
        <div class="text-center">Already have an account? <a href="login.php">Sign in</a></div>
    </form>
	
</div>
</body>
</html>
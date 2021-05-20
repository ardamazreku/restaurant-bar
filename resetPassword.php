<?php
require "includes/functions/connect.php";

if(!isset($_GET["code"])){

  exit("Can't find page!");
}
$code = $_GET["code"];
$getEmailQuery = mysqli_query($connect,"SELECT email FROM resetpsw WHERE code = '$code'");
if(mysqli_num_rows($getEmailQuery) == 0){

    exit("Can't find page");
}

if(isset($_POST["password"])) {
  $psw = $_POST["password"];

  $row = mysqli_fetch_array($getEmailQuery); //we get the data from $getEmailQuery
  $email = $row["email"];

  $query = mysqli_query($connect, "UPDATE perdoruesi SET password = '$psw' WHERE email='$email'");

  if($query){
  $query = mysqli_query($connect, "DELETE FROM resetpsw WHERE code='$code'");

echo '<script type="text/javascript">';
echo 'alert("Passwordi i ri u shtua me sukses")';
echo' </script>';
  }
  else{
    exit("Diqka shkoi gabim");
  }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title> Log In </title>
    <meta name="keywords" content="Restaurant Name">
    <meta name="description" content="The description of the restaurant.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='shortcut icon' type='image/x-icon' href='images/logo.png'/>
    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="style/signup.css">
	<!--icon-->
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
    <body>
        <nav class="nav-part"> <!-- pjesa e navigimit -->
            <a href="index.php">
            <p style="color:white"> RESTAURANT BAR & FOOD DELIVERY </p></a>
            <ul class="nav-links">
  	        <?php include "Includes/template/nav.php";?>
            <li><a href="signup.php">SIGN UP</a></li>  
            </ul>
            <div class="mobile-menu">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        </nav> <!-- fundi i nav -->

        <!-- pjesa e dyte -->
        <div class="thecontainer" style="padding:50px; margin-bottom:-40px"> <!-- div i pergjithshem -->
            <div class="row"> <!-- rreshti web responsive -->
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12" style="margin-left:35%; z-index:0">
                <br /><br />
                <div class="main-login main-center">
				<form class="form-horizontal" method = "POST">
                    
				<!--Email-->
				<div class="form-group">
				<label for="eml" class="cols-sm-2 control-label">Email</label>
				<div class="cols-sm-10">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
				<input type="password" class="form-control" name="password"  placeholder="New Password">
				</div>
				 </div>
				</div>

				<div class="form-group ">
				    <input type="submit" name="submit" value="Update Password"  class="btn btn-primary btn-lg btn-block login-button">
                </div>
				</form>
                </div>
            </div>
            </div>
        </div> <!-- fundi i div-it te pergjithshem -->
        <?php include "Includes/template/footer.php";?>
        <!-- bootstrap js -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
         <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    </body>
</html>
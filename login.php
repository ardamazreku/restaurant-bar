<?php //startimi i sesionit
session_start();

//nese perdoruesi nuk eshte kyq, atehere paraqitja kete pamje te kesaj web faqeje
if(!isset($_SESSION['emaili'])) {

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
    <style>
        .login {
            margin-left: 35%;
            z-index: 0;
    }
        .form-group label {
            color:black;   
        }
    @media screen and (max-width: 770px) {
        .login {
          margin-left: 25%;
        }
    }
    @media screen and (max-width: 420px) {
        .login {
          margin-left: 0%;
        }
    }
    </style>
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
			<?php
          $emaili = "";

					$errorGeni = $errorEmaili = $errorEmaili = $errorEmaili  =$errorPasswordi =$errorPasswordi= "";

				  $emaili = $pass = "";

					//kushti if ne kete rast do te plotesohet vetem pasi klikohet butoni Submit ne formen
					if($_SERVER['REQUEST_METHOD'] == 'POST') {
						//POST
						include 'includes/validate/loginValidate.php';
					}
        ?>
        <!-- pjesa e dyte -->
         <div class="row" style="background-image:url('images/background1.jpeg'); padding-bottom:5%"> <!-- rreshti web responsive -->
          <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 login">
          <br /><br />
           <div class="main-login main-center">
    				<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'];?>" method = "POST">
                    <center> <span style="color:black"> SIGN IN </span></center>
    				<!--Email-->
    				<div class="form-group">
    				<label for="eml" class="cols-sm-2 control-label">Email</label>
    				<div class="cols-sm-10">
    				<div class="input-group">
    				<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
    				<input type="text" class="form-control" name="emailLogin" value="<?php echo $emaili; ?>"  placeholder="Email"/>
    				</div>
    				</div>
    				<?php echo "<span class='error'>$errorEmaili<span>";?>
    				</div>

    				<!--Password-->
    				<div class="form-group">
    				<label for="psw" class="cols-sm-2 control-label required">Password</label>
    				<div class="cols-sm-10">
    				<div class="input-group">
    				<span class="input-group-addon"><i class='fas fa-lock' style='font-size:14px'></i></span>
    				<input type="password" class="form-control" name="passLogin"  placeholder="Password"/>
    				</div>
    				</div>
    				<?php
    				echo "<span class='error'>$errorPasswordi<span>";
    			    ?>
    				</div>
                    <div class="cols-sm-10">
                    <div class="input-group">
                      <center>
                      <a href = "request.php"><p style = 'font-size:15px'>Forgot Password?</p></a>
                      </center>
                    </div>
                    </div>
    				<div class="form-group ">
    				    <input type="submit" name="register" value="Login"  class="btn btn-primary btn-lg btn-block login-button">
                        <?php echo "<span class='error'>$errorGeni<span>";?>
            </div>
            <span style="color:black"> Don't have an account? <a href="signup.php"> Sign Up here!</a></span>
    				</form>
         </div>
       </div>
      </div>
        <?php include "Includes/template/footer.php";?>
        <!-- javascript -->
        <script src="javascript/app.js"></script>
        <!-- bootstrap js -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
         <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    </body>
</html>
<?php
}

else {
	//nese perdoruesi eshte i kyqur, atehere ridrejtoje ne faqen baze pas kyqjes
	header("Location: index.php");
}
?>

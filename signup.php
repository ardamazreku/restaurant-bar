<?php //startimi i sesionit
session_start();

//nese perdoruesi nuk eshte kyq, atehere paraqitja kete pamje te kesaj web faqeje
if(!isset($_SESSION['emaili'])) {

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title> Sign Up </title>
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
            </ul>
            <div class="mobile-menu">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        </nav> <!-- fundi i nav -->
			<?php
					$errorGen = $errorName = $errorName=$errorSurname =$errorSurname= $errorEmail = $errorEmail = $errorEmail  =$errorPassword=$errorPassword=$errorPassTooltip=$errorConfirmPassword= "";

					$name = $surname = $email = $password = $ConfirmPassword="";

					//kushti if ne kete rast do te plotesohet vetem pasi klikohet butoni Submit ne formen
					if($_SERVER['REQUEST_METHOD'] == 'POST') {
						//POST

						include 'registerKlienti.php';
					}
					?>
        <!-- pjesa e dyte -->
          <div class="row" style="background-image:url('images/background1.jpeg'); padding-bottom:5%"> <!-- rreshti web responsive -->
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 login">
            <br /><br />
            <div class="main-login main-center">
            <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'];?>" method = "POST">
            <center> <span style="color:black">SIGN UP</span></center>
    				<!--Emri-->
    				<div class="form-group">
    					<label for="name" class="cols-sm-2 control-label">Name</label>
    				<div class="cols-sm-10">
    				<div class="input-group">
    				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" name="name" value="<?php echo $name;?>"  placeholder="Name"/>
    				</div>
    				</div>
                    <?php echo "<span class='error'>$errorName<span>";?>
    				</div>

    				<!--Mbiemri-->
    				<div class="form-group">
    				<label for="name" class="cols-sm-2 control-label">Surname</label>
    				<div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" name="surname" value="<?php echo $surname; ?>" placeholder="Surname"/>
    				    </div>
    				</div>
    				    <?php echo "<span class='error'>$errorSurname<span>";?>
    				</div>

    				<!--Email-->
    				<div class="form-group">
    				<label for="email" class="cols-sm-2 control-label">Email</label>
    				<div class="cols-sm-10">
    				<div class="input-group">
    				<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
    				<input type="text" class="form-control" name="email" value="<?php echo $email; ?>"  placeholder="Email"/>
    				</div>
    				 </div>
    				<?php echo "<span class='error'>$errorEmail<span>";?>
    				</div>

    				<!--Password-->
    				<div class="form-group">
    				<label for="password" class="cols-sm-2 control-label required">Password</label>
    				<div class="cols-sm-10">
    				<div class="input-group">
    				<span class="input-group-addon"><i class='fas fa-lock' style='font-size:14px'></i></span>
    				<input type="password" class="form-control" name="password" value="<?php echo $password; ?>"  placeholder="Password"/>
    				</div>
    				  </div>
    				<?php
    				echo "<span class='error'>$errorPassword<span>";
    				echo"<br>";
    				echo "<span class='error'>$errorPassTooltip<span>";?>
    				</div>

    				<!--Confirm Password-->
    				<div class="form-group">
    				<label for="password" class="cols-sm-2 control-label required">Confirm password</label>
    				<div class="cols-sm-10">
    				<div class="input-group">
    				<span class="input-group-addon"><i class='fas fa-lock' style='font-size:14px'></i></span>
    				<input type="password" class="form-control" name="ConfirmPassword" value="<?php echo $ConfirmPassword; ?>"  placeholder="Confirm password"/>
    				</div>
    				  </div>
    				<?php echo "<span class='error'>$errorConfirmPassword<span>"; ?>
    				<?php echo "<span class='error'>$errorGen<span>";?>
    				</div>
    				<div class="form-group ">
    				<input type="submit" name="register" value="Register"  class="btn btn-primary btn-lg btn-block login-button">
    				</div>
    				</form>
            </div>
          </div>
        </div>
        <?php include "Includes/template/footer.php";?>
        <!-- javascript -->
        <script src="javascript/app.js"></script>
        <!-- bootstrap js -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
<?php
}

else {
	//nese perdoruesi eshte i kyqur, atehere ridrejtoje ne faqen baze pas kyqjes
	header("Location: index.php");
}
?>

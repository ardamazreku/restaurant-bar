<?php

//startimi i sesionit
session_start();

//nese perdoruesi eshte kyq
if(isset($_SESSION['emaili']) && isset($_SESSION['roli'])) {
	//nese perdoruesi eshte admin, atehere paraqitja kete pamje te kesaj web faqeje
	if($_SESSION['roli'] == 1) {
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title> RESTAURANT BAR & FOOD DELIVERY</title>
    <meta name="keywords" content="Restaurant Name">
    <meta name="description" content="The description of the restaurant.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel='shortcut icon' type='image/x-icon' href='images/logo.png'/>
    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gentium+Basic&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="style/animate.css">
    <link rel="stylesheet" type="text/css" href="style/contact.css">
     <!-- css -->
    <link rel="stylesheet" type="text/css" href="style/index.css">
</head>
    <body style="background:white;">
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
			</nav> <br /><!-- fundi i nav -->

      <div class="container">
          <div class="row">
      		<div class="col-12"><br />
      <center>  <h1 style="color:black">Delete Roli</h1></center><br>
      </div>
        		<div class="col-12">
              <center><button style="background:navy;color:white;border:none" onClick="location.href='registerRoli.php'"type="button" class="btn btn-default">Register</button>
       </center><br>
       </div>
                    <br><br>
           <div style="color:black">
        
          <?php
          include "Includes/functions/selectDeleteRoli.php";?>
           
                  </div>
         
  </div></div>
              
  <br>  <br>  <br>
      <?php include "Includes/template/footer.php";?>
      <script src="javascript/app.js"></script>
      <!-- bootstrap js -->
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
      </html>

      <?php
      }
      //nese perdoruesi nuk eshte admin ridrejtoje ne faqen baze pas kyqjes
      else {
      header("Location: index.php");
      }
      }
      //nese perdoruesi nuk eshte kyq ridrejtoje ne faqen e logimit
      else {
      header("Location: login.php");
      }
      ?>

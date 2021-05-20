<?php

//startimi i sesionit
session_start();

//nese perdoruesi eshte kyq ne sistem, atehere paraqitja kete pamje te web faqes
if(isset($_SESSION['emaili'])) {

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title> Contact Us </title>
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="style/signup.css">
	<!--icon-->
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
    <body style="background-color:lightgrey">
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
		  <?php if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //POST
            include 'includes/functions/contactklienti.php';
            }
            ?>
<div class="container" style="padding:4%; background-color:lightgrey; color:black">
    <h2 class="h1-responsive font-weight-bold">Contact us</h2>
    <div class="row">
        <div class="col-md-9 mb-5">
            <form id="contact-form" name="contact-form" action="contact.php" method="POST">
			<div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <input type="text" id="email" name="email" class="form-control">
                            <label for="email" class="">Your email</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form">
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                            <label for="message">Your message</label>
                        </div>
                    </div>
                </div>
            </form>
            <div class="text-center text-md-left">
                <a class="btn btn-primary send" onclick="document.getElementById('contact-form').submit();" style="color:white">Send</a>
            </div>
            <div class="status"></div>
        </div>
        <div class="col-md-3 text-center">
            <ul class="list-unstyled mb-0">
                <li><i class="fas fa-map-marker-alt fa-2x"></i>
                    <p>Prizren,20000, Kosova</p>
                </li>

                <li><i class="fas fa-phone mt-4 fa-2x"></i>
                    <p>+38349876679</p>
                </li>

                <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                    <p>restaurantdelivery@gmail.com</p>
                </li>
            </ul>
        </div>
    </div>
</div>
        <?php include "Includes/template/footer.php";?>  
        <script>
        $(document).ready(function(){
            $(".addItemBtn").click(function(e){
            e.preventDefault();
            var $form = $(this).closest(".form-submit");
            var pid = $form.find(".pid").val();
            var pname = $form.find(".pname").val();
            var pdescription = $form.find(".pdescription").val();
            var pprice = $form.find(".pprice").val();
            var pimage = $form.find(".pimage").val();
            var pcategory = $form.find(".pcategory").val();
            var pcode = $form.find(".pcode").val();
            
            var pqty = $form.find(".pqty").val();

            $.ajax({
                url: 'includes/functions/action.php',
                method: 'post',
                data: {pid: pid,pname: pname, pdescription: pdescription, pprice: pprice, pqty:pqty, pimage: pimage,pcategory: pcategory,pcode: pcode},
                success:function(response) {
                    $("#message").html(response);
                    load_cart_item_number();
                }

                });
            });
            
            load_cart_item_number();
            
            function load_cart_item_number() {
              $.ajax({
                url: 'includes/functions/action.php',
                method: 'get',
                data: {
                  cartItem: "cart_item"
                },
                success: function(response) {
                  $("#cart-item").html(response);
                  load_cart_item_number();
                }
              });
            }
        });    
        </script>            
        <!-- javascript -->
        <script src="javascript/app.js"></script>
        <!-- bootstrap js -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>

<?php
}
else {
	header("Location: login.php");
}

?>
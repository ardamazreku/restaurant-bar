<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$result = "";
if(isset($_POST['submit'])){
  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';

  $mail = new PHPMailer;
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
  $mail->SMTPAuth = true; // Enable SMTP authentication
  $mail->Username = 'fooddeliveryrestaurant@gmail.com'; // SMTP username
  $mail->Password = 'fooddelivery123'; // SMTP password
  $mail->SMTPSecure = 'tls'; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
  $mail->Port = 587; // TC

  $mail->setFrom($_POST['email'],$_POST['emri']);
  $mail->addAddress('fooddeliveryrestaurant@gmail.com');
  $mail->addReplyTo($_POST['email'],$_POST['emri']);

  $mail->isHTML(true);
  $mail->Subject = 'Form Submission: '.$_POST['subject'];
  $mail->Body = '<p> Emri: '.$_POST['emri']. '<br> <br> Emaili: '.$_POST['email']. '<br> <br> Mesazhi: '.$_POST['msg'].'</p>';

if(!$mail->send()){
  $result= "<h4 style = color:red>Diqka shkoi gabim. Ju lutem provoni perseri</h4>";
}
  else{
    $result = "<h4 style = color:#17a320>Faleminderit ".$_POST['emri']." qe na kontaktuat. Ne do ju pergjigjemi se shpejti</h4>";
  }
}

?>

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
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="style/signup.css">
  	<!--icon-->
  	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <style>
    .login {
      margin-left: 35%;
      z-index: 0;
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
    <body style="color:black; background-color:lightgray;">
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
        <!-- pjesa e dyte -->
            <div class="row"> <!-- rreshti web responsive -->
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 login">
                <br />
                <div class="main-login main-center" style="background-color:#fafafa">
                <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'];?>" method = "POST">
                    <center> <span style="color:black"> CONTACT US </span></center>
                    <h5><?= $result; ?></h5>
              <form action ="" method = "POST">
                <label for="emri" class="cols-sm-2 control-label" style="font-size: 18px;">Emri dhe Mbiemri</label>
                <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" class="form-control" name="emri" placeholder="Name and Surname">
              </div>
              </div>
              <br />
              <label for="email" class="cols-sm-2 control-label" style="font-size: 18px;">Emaili</label>
              <div class="cols-sm-10">
              <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                <input type="email" class="form-control" name="email" placeholder="Email">
              </div>
              </div>
              <br />
              <label for="subject" class="cols-sm-2 control-label" style="font-size: 18px;">Subjekti</label>
              <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon"><i class="fas fa-arrow-right" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="subject" placeholder="Subject">
              </div>
              </div>
              <br />
              <label for="mesazhi" class="cols-sm-2 control-label" style="font-size: 18px;">Mesazhi</label>
              <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon"><i class="fas fa-envelope-open" aria-hidden="true"></i></span>
                <textarea name = "msg" id = "msg" placeholder="Write your mesagge..." cols = "34" rows = "8" style="color:black;"></textarea>
              </div>
              </div>
              <div class="form-group ">
                <input type="submit" name="submit" id = "submit" value="Send"  class="btn btn-primary btn-lg btn-block login-button">
                <div class="col-md-3 text-center">
                </div>
              </div>
              </form>
              </form>
        </div>
      </div>
                    
              <div class="col-md-3 text-center">
              <br /><br />
              <i class="fas fa-map-marker-alt fa-2x"></i>
                            <p>Prizren,20000, Kosova</p>


                        <i class="fas fa-phone mt-4 fa-2x"></i>
                            <p>+38349876679</p>


                  <i class="fas fa-envelope mt-4 fa-2x"></i>
                            <p>fooddeliveryrestaurant@gmail.com</p>
              </div>
              </div>
<?php include "Includes/template/footer.php";?>
<!-- javascript -->
<script src="javascript/app.js"></script>
<!-- bootstrap js -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
</body>
</html>
<?php
}
else {
	header("Location: login.php");
}

?>

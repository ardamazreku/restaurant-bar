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
    <title> Menu </title>
    <meta name="keywords" content="Restaurant Name">
    <meta name="description" content="The description of the restaurant.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- jQuery -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="style/shop.css">
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
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0">
            <video class="col-lg-12 col-md-12 col-sm-12 col-xs-12" autoplay muted loop>
                <source src="images/video/restaurant.mp4" type="video/mp4">
                <source src="images/video/restaurant.mp4">
            </video>
        </div>
    </div>
	<div class="container" style="margin-top:3%">
 	 <div class="row">
	 	<div class="col-sm-3">
  		    <button  class="btn btn-lght" style="color:rgb(246, 177, 49);height:50px;font-weight:bold" onclick="loadpage('signature.php')">SIGNATURE DISHES</button>
		</div>
		<div class="col-sm-3">
		  <button class="btn btn-lght" style="color:rgb(246, 177, 49);height:50px;font-weight:bold" onclick="loadpage('fastfood.php')">FAST FOOD</button>
		</div>
		<div class="col-sm-3">
		  <button class="btn btn-lght" style="color:rgb(246, 177, 49);height:50px;font-weight:bold" onclick="loadpage('beverages.php')">BEVERAGES</button>
		</div>
		<div class="col-sm-3">
		  <button  class="btn btn-lght" style="color:rgb(246, 177, 49);height:50px;font-weight:bold" onclick="loadpage('dessert.php')">DESSERT</button>
		</div>
     </div>
	</div>
	<div class="container" id="pjesa3" style="margin-top:50px">
 	 <div class="row">
        <?php
        require "includes/functions/connect.php";
        $stmt = $connect->prepare("SELECT * FROM ushqimi");
        $stmt->execute();
        $result = $stmt->get_result();

        while($row = $result->fetch_assoc()):
        ?>
        <div class='col-lg-3 col-md-6 col-sm-12 col-xs-12' style='margin-bottom:10px'>
            <div id='message'></div>
                 <img src="<?= $row['fotografia']?>" class="img-fluid img-thumbnail" style="width:250px"><br>
                 <h3><b><?= $row['emri']?></b></h3>
                 <p><?= $row['pershkrimi']?></p>
                 <p style='color:rgb(246, 177, 49);'><?= number_format($row['cmimi'],2)?> €</p>
                <form action="" class="form-submit">
                    <p>Sasia:</p>
                    <input type="number" style="width:55px" class="form-control pqty" value="<?= $row['sasia'] ?>">
                    <input type='hidden' class='pid' value='<?= $row['id'] ?>'>
                    <input type='hidden' class='pcode' value='<?= $row['kodi'] ?>'>
                    <input type='hidden' class='pname' value='<?= $row['emri'] ?>'>
                    <input type='hidden' class='pdescription' value='<?= $row['pershkrimi'] ?>'>
                    <input type='hidden' class='pprice' value='<?= $row['cmimi'] ?>'>
                    <input type='hidden' class='pimage' value='<?= $row['fotografia'] ?>'>
                    <input type='hidden' class='pcategory' value='<?= $row['kategoria'] ?>'>
                    <br>
                    <button class="btn btn-info btn-block addItemBtn" style="background-color:grey; border:grey; width:50px"><i class="fas fa-cart-plus"></i></button>
                </form>
         </div>
         <?php endwhile; ?>
        <?php //include "Includes/functions/selectUshqimiSignature.php";?>
	 </div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
        <?php include "Includes/template/footer.php";?>
		<script>
		function loadpage(page){
            $.ajax({
            url:page,
            beforeSend:function(){
              $('#pjesa3').html("Please wait...");
            },
            success:function(data){
              $('#pjesa3').html(""); // to empty previous page contents.
              $('#pjesa3').html(data);
            }
          });
        }
        </script>
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
                }
              });
            }
        });
        </script>
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
	header("Location: login.php");
}

?>

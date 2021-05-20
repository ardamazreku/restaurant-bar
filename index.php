<?php

//startimi i sesionit
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title> Restaurant Name Bar &amp; Grill </title>
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
    <!-- jQuery -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">    
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="style/index.css">
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

            <!-- photo slides -->
            <div class="mySlides fadee">
                <img src="images/pic1.jpg" class="photo" alt="restaurant-name bar&grill">
            </div>
            <div class="mySlides fadee">
                <img src="images/pic2.jpg" class="photo" alt="restaurant-name bar&grill">
            </div>

            <div class="mySlides fadee">
                <img src="images/pic3.jpg" class="photo" alt="restaurant-name bar&grill">
            </div>

            <div class="mySlides fadee">
                <img src="images/pic4.jpg" class="photo" alt="restaurant-name bar&grill">
            </div>
        
            <div class="mySlides fadee">
                <img src="images/pic8.jpg" class="photo" alt="restaurant-name bar&grill">
            </div>

        <!-- pikat e fotove -->
        <div style="text-align:center">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>

        <!-- pjesa me background image -->
        <div class="div1">
            <div class="content1 fde"> <!-- teksti mbi div -->
                <h1>Rreth nesh... </h1>
                <p> Ne përpiqemi të krijojmë një përvojë të vlerësuar dhe dinamike të ngrënies, me një përkushtim të veçantë për trashëgiminë tonë shumëvjeçare. </p>
            </div>
        </div>

        <br>
        <div class="thecontainer"> <!-- div i pergjithshem -->
        <div class="row">
            <div class="div-pjesa1 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1>Një përvojë unike e kuzhinës </h1>
                <center><h3 style="line-height: normal;">Biftekët perfekte. Një nga koleksionet më të mëdha të verërave në Kosovë.<br> Shumëllojshmëri e madhe e ëmbëlsirave.<br> Bodrum vere dhe turne kuzhine në dispozicion për të gjithë mysafirët.</h3></center>
                <p>Restauranti ynë nderon sot traditën shumëvjeçare duke ofruar: ushqim cilësor me një menu të përgatitur nga kuzhina dhe kuzhinierët me përvojë shumëvjeçare; mjedis modern dhe relaksues për të respektuar secilin person; si dhe shërbim superior për t’i befasuar çdo herë.Po ashtu ajo që na dallon nga të tjerët është se ne ofrojmë porosi online dhe transport në rrethinën e Prizrenit.</p>
            </div>
        </div>

        <!-- pjesa e dyte -->
        <br>
        <a href='shop.php'><h1 style="text-align: center; color:white"> MENU </h1></a>
        <div class="row content2"> <!-- rreshti -->
            <div class="col-lg-3 col-md-6 col-sm-12"s>
                <img src="images/pic10.jpg" class="img-fluid img-smaller" alt="restaurant-name bar&grill">
                <p class="p-menu"> STEAKHOUSE MENU </p>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
                <img src="images/pic6.jpg" class="img-fluid img-smaller" alt="restaurant-name bar&grill">
                <p class="p-menu"> BEVERAGES </p>
            </div>

             <div class="col-lg-3 col-md-6 col-sm-12">
                <img src="images/pic11.jpg" class="img-fluid img-smaller" alt="restaurant-name bar&grill">
                <p class="p-menu"> FAST FOOD </p>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
                <img src="images/pic12.jpg" class="img-fluid img-smaller" alt="restaurant-name bar&grill">
                <p class="p-menu"> DESSERTS </p>
            </div>
        </div> <!-- fundi i rreshtit -->
    </div> <!-- fundi i div-it te pergjithshem -->
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
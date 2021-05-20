<?php

//startimi i sesionit
session_start();

?>
<!DOCTYPE html> 
<html>
<head>
    <meta charset="UTF-8"/> 
    <title> About Us - Restaurant Bar &amp; Grill</title>
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="style/animate.css">
    <link rel="stylesheet" type="text/css" href="style/contact.css">
</head>
    <body>
    <nav class="nav-part"> <!-- pjesa e navigimit -->
        <a href="index.php">
        <p> RESTAURANT BAR & FOOD DELIVERY </p></a>
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
        <div class="theheader col-lg-12 col-md-12 col-sm-12 col-xs-12">
        </div>
    </div>
    <div class ="thecontainer">
        <div class ="row"> <!-- pjesa e pare e menu food reservation -->
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"s>
                <h1 class="menu-txt"> CONTACT </h1>
                <p> Address <br>
                Rr.Tirana, Prizren <br><br>
                Contact us <br>
                038 230 300 <br>
                fooddeliveryrestaurant@gmail.com <br><br>
                E Hene – E Merkure: 12:00 – 15:00,<br> 18:00 – 22:00 (bar open all day) <br>
                E Enjte – E Premte: 12:00 – 15:00,<br> 18:00 – 23:00 (bar open all day) <br>
                E Shtune: 17:30 – 23:00 <br>
                E Diel: 17:30 – 22:00 <br><br></p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="background-color:white; color:black">
                <h1 class="menu-txt"> INFORMATION </h1>
                <p>Orari i Rezervimeve <br><br>

                E Hene – E Premte, nga 09:00 <br>
                E Shtune & E Diel, nga 14:00 <br><br>

                Payment<br><br>

                Ne pranojmë pagesa duke përdorur të gjitha kartat kryesore të kreditit (përfshirë UnionPay) dhe Eftpos. Ju lutemi vini re se të gjitha pagesat e kartave të kreditit do të pësojnë një tarifë përpunimi prej 1.5%. Një shtesë prej 10% zbatohet të dielave dhe 15% për festat zyrtare.<br><br>

                Ne po ashtu pranojmë Good Food Gift Cards.<br><br></p>
            </div>   
            <div class="div-menures col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <center>
                    <h3 class="menu-txt"> PLACE</h3>
                    <p>Galeria Shopping Mall, Prizren</p><br><br>
                    <p><strong>Opening Hours</strong></p>
                    <p>E Diel – E Premte: 12:00 – 15:00,<br> 18:00 – 23:00<br />
                    E Shtune: 18:00 – 23:00 </p><br><br>
                    <p><strong>Rezervoni për 5 ose më shumë persona?</strong><br />
                    Na thirrni në numrin: <a href="tel:+61386481900">+38230300</a></p>
                </center>    
            </div>
        </div>
        <br>
        <div class="row"> <!-- pjesa e dyte -->
            <div class="mapouter col-lg-7 col-md-12 col-sm-12 col-xs-12">
                <div class="gmap_canvas">
                    <iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=hyska&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>   
                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                <h1> WORK AT RESTAURANT'S DINING GROUP </h1><br>
                <p>Ne e pranojmë që pasuritë tona më të vlefshme janë stafi ynë dhe krenohemi me një program trajnimi që synon zhvillimin e liderëve të ardhshëm të industrisë. Një pozicion në restaurantin tonë vjen me mundësinë e përparimit në karrierë nëpër vende të shumta, mundësi jashtë shtetit dhe joshjen për të punuar me disa nga shefat dhe prodhuesit kryesorë të Kosovës.</p>
            </div>
        </div>
        
        <br>
        
        <div class ="row"> <!-- pjesa e pare e menu food reservation -->
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <h1 class="menu-txt"> CHEFS </h1>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <center><img src="images/chef1.JPG" class="img-fluid">
                <h3> Chef Name </h3></center>
                <p>Chef/Name është një nga shefat kryesorë dhe shefat më me ndikim të Australisë. Duke hapur Rockpool në 1989 me qëllimin për të krijuar një nga restorantet më të mira të Australisë, Perry ka vazhduar të fitojë një listë të gjatë çmimesh, si këtu ashtu edhe jashtë saj.<br>
                Chef/Name është Ambasadori i Markave i Rockpool Dining Group, duke punuar në një numër në rritje restorantesh, duke përfshirë Rockpool Bar & Grill në Sydney, Melbourne dhe Perth, Spice Temple në Sydney dhe Melbourne, Rosetta Ristorante në Melbourne dhe Sydney, Saké Restaurant & Bar në Sydney , Melburn dhe Brisane.</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <center><img src="images/chef2.JPG" class="img-fluid">
                <h3> Chef Name </h3></center>
                <p>Karriera e gatimit të Chef/Name filloi në disa nga kuzhinat më të vlerësuara të Sidneit, duke përfshirë Catalina dhe Flying Fish, ku ai përsosi një njohuri tashmë mbresëlënëse për të gjitha gjërat e detit. Ai u bashkua me Rockpool Bar & Grill në vitin e tij të hapjes, ku ndihmoi në zhvillimin e programit të peshkut dhe prodhimeve të detit në restorant. Talenti i tij i kuzhinës dhe qasja e tij pa kompromis ndaj cilësisë së prodhimeve e panë atë të merrte frenat si Shef Shef në 2013.</p>
            </div>
        </div>    
        </div> <!-- fundi i divit te pergjithsem -->
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
        <!-- javascript navbar -->
        <script src="javascript/app.js"></script>
        <!-- bootstrap js -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    
    </body>
</html>        
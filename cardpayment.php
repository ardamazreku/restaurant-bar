<?php

//startimi i sesionit
session_start();

//nese perdoruesi eshte kyq ne sistem, atehere paraqitja kete pamje te web faqes
if(isset($_SESSION['emaili'])) {
    require 'includes/functions/connect.php';
    $emaili = $_SESSION['emaili'];
	$grand_total = 0;
	$allItems = '';
	$items = [];

	$sql = "SELECT CONCAT(emri, '(',sasia,')') AS sasia, totali FROM shporta WHERE email='$emaili'";
	$stmt = $connect->prepare($sql);
	$stmt->execute();
	$result = $stmt->get_result();
	while ($row = $result->fetch_assoc()) {
	  $grand_total += $row['totali'];
	  $items[] = $row['sasia'];
	}
	$allItems = implode(', ', $items);                            
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pagesa me Kredit Kartele</title>
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/styles.css">
    <style>
        .visa {
            width:50%;
            float:left
        }
        .bottom {
            margin-top:-12%;
        }
        @media screen and (max-width: 420px) {
            .visa {
                width:47%;
            }
            .bottom {
                margin-top:-20%;
            }
            .payment {
                margin:12%;
            }
        }
    </style>
</head>
    <body style="background-color:rgba(46, 49, 49, 1)">
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
        <div class ="container">
            <div class="row">
            <!-- top -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="payment p-3 mb-2 text-center" style="color:black">
                  <h6 class="lead"><b>Produkti/et : </b><?= $allItems; ?></h6>
                  <h6 class="lead"><b>Pagesa e transportit : </b>Free</h6>
                  <h3><b>Totali i pergjithshem : </b><?= number_format($grand_total,2) ?> &euro;</h3>
                </div>
                  <input type="hidden" name="products" value="<?= $allItems; ?>">
                  <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
                </div>
            </div>    
            <!-- bottom -->    
            <div class="row bottom">
            <div class="wrapper" style="padding-bottom:1%">
		    <div class="payment">

				<?php
						$cnumber = $emrimbiemri = $expdate = $cvc = $errorGen = "";
						if($_SERVER['REQUEST_METHOD'] == 'POST') {
							//POST
							include 'kreditkartela.php';
						}
				?>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method ="POST">
                  <div class="card space icon-relative">
                    <label class="label">Card holder:</label>
                    <input type="text" name="emrimbiemri" class="input" placeholder="Emri Mbiemri" value="<?php echo $emrimbiemri;?>">
                    <i class="fas fa-user"></i>
                  </div>
                  <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">      
                  <div class="card space icon-relative">
                      <br><i class="far fa-credit-card"><label class="label">Credit Card</label></i>&nbsp;
                  </div>
                  </div>      
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-top:5%">
                    <img src="images/visa.jpg" class="img-fluid img-thumbnail visa">
                    <img src="images/mastercard.jpg" class="img-fluid img-thumbnail visa">
                  </div>  
                  </div>     
                  <div class="card space icon-relative">
                    <label class="label">Card number:</label>
                    <input type="text" name="cnumber" class="input" data-mask="0000 0000 0000 0000" placeholder="0000 0000 0000 0000" value="<?php echo $cnumber;?>">
                    <i class="far fa-credit-card"></i>
                  </div>
                  <div class="card-grp space">
                    <div class="card-item icon-relative">
                      <label class="label">Expiry date:</label>
                      <input type="text" name="expdate" class="input" data-mask="00 / 00"  placeholder="MM / YY" value="<?php echo $expdate;?>">
                      <i class="far fa-calendar-alt"></i>
                    </div>
                    <div class="card-item icon-relative">
                      <label class="label">Card Code (CVC):</label>
                      <input type="text" class="input" data-mask="000" placeholder="CVC" name="cvc" value="<?php echo $cvc;?>">
                      <i class="fas fa-lock"></i>
                    </div>
                  </div>
                  <center><?php echo "<span style='color:red'>$errorGen<span>";?></center>
                  <input type="submit" name="register" value="Place Order" class="btn btn-primary btn-lg btn-block login-button">
                </form>
		    </div>
        </div> 
        </div>   
        </div>    
        <?php include "includes/template/footer.php" ?>
		<!-- javascript -->
		<script src="javascript/app.js"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</body>
</html>
<?php
}
else {
	header("Location: login.php");
}

?>

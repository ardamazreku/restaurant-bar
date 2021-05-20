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
    <title> Shporta &amp; Porosia </title>
    <meta name="keywords" content="Restaurant Name">
    <meta name="description" content="The description of the restaurant.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='shortcut icon' type='image/x-icon' href='images/logo.png'/>
    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- jQuery -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="style/shporta.css">
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
         <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div style="display:<?php if (isset($_SESSION['showAlert'])) {
                  echo $_SESSION['showAlert'];
                } else {
                  echo 'none';
                } unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong><?php if (isset($_SESSION['message'])) {
                  echo $_SESSION['message'];
                } unset($_SESSION['showAlert']); ?></strong>
                </div><br>
                <div class="table-responsive-sm table-responsive-lg table-responsive-md">
                  <table class="table table-light table-hover">
                   <div class="row">
                    <thead>
                        <tr scope="row">
                        <td colspan="6">
                          <h1 style="color:black"><center> SHOPPING CART</center></h1>
                        </td>
                      </tr>
                    </thead>
                   </div>
                    <div class="row">
                      <tr scope="row" class="thead-light">
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col">Cmimi</th>
                        <th scope="col">Sasia</th>
                        <th scope="col">Totali</th>
                        <th scope="col"></th>
                      </tr>
                    </div>
                    <tbody>
                      <?php
                        require 'includes/functions/connect.php';
                        $emaili = $_SESSION['emaili'];
                        $stmt = $connect->prepare("SELECT * FROM shporta WHERE email = '$emaili'");
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $grand_total = 0;
                        while ($row = $result->fetch_assoc()):
                      ?>
                    <div class="row">
                      <tr scope="row">
                        <input type="hidden" class="pid" value="<?= $row['sh_id'] ?>">
                        <td><img src="<?= $row['fotografia'] ?>" width="120"></td>
                        <td><?= $row['emri'] ?></td>
                        <td>
                          <?= number_format($row['cmimi'],2); ?> €
                        </td>
                        <input type="hidden" class="pprice" value="<?= $row['cmimi'] ?>">
                        <td>
                          <input type="number" class="form-control itemQty" value="<?= $row['sasia'] ?>" style="width:75px; font-size:18px">
                        </td>
                        <td><?= number_format($row['totali'],2); ?> €</td>
                        <td scope="row">
                          <a href="includes/functions/action.php?remove=<?= $row['sh_id'] ?>" class="text-danger lead" onclick="return confirm('A jeni te sigurte qe deshironi ta fshini kete produkt?');"><i class="fas fa-trash-alt"></i></a>
                        </td>
                      </tr>
                      <?php $grand_total += $row['totali']; ?>
                      <?php endwhile; ?>
                    </div>
                    <div class="row">
                      <tr scope="row">
                        <td colspan="2" scope="row">
                          <a href="shop.php" class="btn btn-dark" style="width:160px"><i class="fas fa-cart-plus"></i><span style="font-size:20px">Vazhdo blerjen </span></a>
                        </td>
                        <td colspan="2"><b>Totali i pergjithshem</b></td>
                        <td><b><?= number_format($grand_total,2); ?> €</b></td>
                        <td scope="row">
                            <a href="checkout.php" class="btn btn-dark <?= ($grand_total > 1) ? '' : 'disabled'; ?>" style="width:100px"><i class="far fa-credit-card"></i>&nbsp;&nbsp;<span style="font-size:20px">Pagesa</span></a>
                        </td>
                      </tr>
                    </div>
                    </tbody>
                  </table>
                </div>
            </div>
         </div>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
        <?php include "Includes/template/footer.php";?>
        <!-- bootstrap js -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
          <script type="text/javascript">
          $(document).ready(function() {

            // Change the item quantity
            $(".itemQty").on('change', function() {
              var $el = $(this).closest('tr');

              var pid = $el.find(".pid").val();
              var pprice = $el.find(".pprice").val();
              var qty = $el.find(".itemQty").val();
              location.reload(true);
              $.ajax({
                url: 'includes/functions/action.php',
                method: 'post',
                cache: false,
                data: {
                  qty: qty,
                  pid: pid,
                  pprice: pprice
                },
                success: function(response) {
                  console.log(response);
                }
              });
            });

            // Load total no.of items added in the cart and display in the navbar
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
    </body>
</html>
<?php
}
else {
	header("Location: login.php");
}

?>

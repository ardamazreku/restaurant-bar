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
  <style>

  #porosia{
    font-family:Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  #porsia td, #porosia th{
    border:1px solid #ddd;
    padding: 15px;
  }

  #porosia th{
    padding:15px;
    text-align: left;
    background-color: #c48f31;
    color: white;
  }
  </style>
  <meta charset="UTF-8"/>
  <title> Porositë </title>
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

<body style="background-color:white; color:black;font-size: 15px;">
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

          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0">
            <br /><br />


  <form action = "#" method="post">
    <input type = "date" name = "start_date" style =  "width: 45%; padding: 12px 20px; margin: 8px 0; border: 1px solid #ccc;box-sizing: border-box;">
    <input type = "date" name = "last_date" style =  "width: 45%; padding: 12px 20px; margin: 8px 0;  border: 1px solid #ccc;box-sizing: border-box;">
    <input type = "submit" name = "search" style =   "width: 7%; padding: 12px 20px; margin: 8px 0; border: 1px solid #ccc;box-sizing: border-box; color:white; background-color:black;cursor:pointer;" >
</form>
<br />
  <table id = "porosia">
        <br />
          <tr>
            <th>ID e Porosise</th>
            <th>Emaili i Perdoruesit</th>
            <th>Numri i Tel</th>
            <th>Adresa e Perdoruesit</th>
            <th>Gjendja aktuale e Porosise</th>
            <th>Emri i Porosise</th>
            <th>Cmimi</th>
            <th>Menyra e Pageses</th>
            <th>Data e Porosise</th>
    <?php
    include_once("includes/functions/connect.php");
  if(isset($_POST['search'])){
    $start_date = $_POST['start_date'];
    $last_date = $_POST['last_date'];
    $query =  "SELECT * FROM porosia WHERE data BETWEEN '$start_date' AND '$last_date' ORDER BY data";
    $result = $connect-> query($query);
    if($result->num_rows > 0)
    {
      while ($row = $result->fetch_assoc())
      {
        ?>

          <tr>
        <td style = "border:1px solid #ddd;padding: 15px;" ><?php echo $row['id']?></td>
        <td style = "border:1px solid #ddd;padding: 15px;" ><?php echo $row['email']?></td>
        <td style = "border:1px solid #ddd;padding: 15px;" ><?php echo $row['tel']?></td>
        <td style = "border:1px solid #ddd;padding: 15px;" ><?php echo $row['adresa']?></td>
        <td style = "border:1px solid #ddd;padding: 15px;" ><?php echo $row['gjendjaaktuale']?></td>
        <td style = "border:1px solid #ddd;padding: 15px;" ><?php echo $row['emri_u']?></td>
        <td style = "border:1px solid #ddd;padding: 15px;" ><?php echo $row['cmimi']?></td>
        <td style = "border:1px solid #ddd;padding: 15px;" ><?php echo $row['pagesa']?></td>
        <td style = "border:1px solid #ddd;padding: 15px;" ><?php echo $row['data']?></td>
      </tr>
      <?php
      }
    }
  }
      ?>
       </table>
       <br /><br /><br /><br />
       <?php include "Includes/template/footer.php";?>
         <!-- javascript -->
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

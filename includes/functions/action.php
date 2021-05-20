<?php
session_start();
require 'connect.php';

if(isset($_POST['pid'])) {
    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $pdescription = $_POST['pdescription'];
    $pprice = $_POST['pprice'];
    $pimage = $_POST['pimage'];
    $pcategory = $_POST['pcategory'];
    $pcode = $_POST['pcode'];
    $pqty = $_POST['pqty'];
    $totali = $pprice * $pqty;
    $emaili = $_SESSION['emaili'];

    $stmt = $connect->prepare("SELECT kodi FROM shporta WHERE kodi=?");
    $stmt->bind_param("s",$pcode);
    $stmt->execute();
    $res = $stmt->get_result();
    $r = $res->fetch_assoc();
    $code = $r['kodi'] ?? '';

    if(!$code){
        $query = $connect->prepare("INSERT INTO shporta (email,emri,pershkrimi,cmimi,fotografia,sasia,totali,kategoria,kodi) VALUES (?,?,?,?,?,?,?,?,?)");
$query->bind_param("sssdsidss",$emaili,$pname,$pdescription,$pprice,$pimage,$pqty,$totali,$pcategory,$pcode);
        $query->execute();

            echo '<script type="text/javascript">';
            echo 'alert("Produkti u shtua ne shporte!")';
            echo '</script>';
    }
	else if($code) {
		        $query = $connect->prepare("INSERT INTO shporta (email,emri,pershkrimi,cmimi,fotografia,sasia,totali,kategoria,kodi) VALUES (?,?,?,?,?,?,?,?,?)");
$query->bind_param("sssdsidss",$emaili,$pname,$pdescription,$pprice,$pimage,$pqty,$totali,$pcategory,$pcode);
        $query->execute();

            echo '<script type="text/javascript">';
            echo 'alert("Produkti u shtua ne shporte!")';
            echo '</script>';
	}
    else {
		    echo '<script type="text/javascript">';
            echo 'alert("Produkti ekziston ne shporte!")';
            echo '</script>';
	}
}
	// Get no.of items available in the cart table
	if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
      $emaili = $_SESSION['emaili'];
	  $stmt = $connect->prepare("SELECT * FROM shporta WHERE email = '$emaili'");
	  $stmt->execute();
	  $stmt->store_result();
	  $rows = $stmt->num_rows;

	  echo $rows;
	}

    // Remove single items from cart
	if (isset($_GET['remove'])) {
	  $id = $_GET['remove'];
	  $emaili = $_SESSION['emaili'];
	  $stmt = $connect->prepare("DELETE FROM shporta WHERE sh_id=? AND email ='$emaili'");
	  $stmt->bind_param('i',$id);
	  $stmt->execute();

	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'Produkti u largua nga shporta!';
	  header('Location: ../../shporta.php');
	}

	// Remove all items at once from cart
	if (isset($_GET['clear'])) {
	  $stmt = $connect->prepare('DELETE FROM shporta');
	  $stmt->execute();
	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'Te gjitha produktet jane larguar nga shporta!';
	  header('Location: ../../shporta.php');
	}

	// Set total price of the product in the cart table
	if (isset($_POST['qty'])) {
	  $qty = $_POST['qty'];
	  $pid = $_POST['pid'];
	  $pprice = $_POST['pprice'];

	  $tprice = $qty * $pprice;

	  $stmt = $connect->prepare('UPDATE shporta SET sasia=?, totali=? WHERE sh_id=?');
	  $stmt->bind_param('idi',$qty,$tprice,$pid);
	  $stmt->execute();
	}

    // Checkout and save customer info in the orders table
	if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
	  $emaili = $_SESSION['emaili'];
      $phone = $_POST['phone'];
	  $products = $_POST['products'];
	  $grand_total = $_POST['grand_total'];
	  $address = $_POST['address'];
	  $pmode = $_POST['pmode'];
      $today = date("Y-m-d");
	  $transporti=0;
      $data ="";

    if($pmode == 'Cash On Delivery') {

	  $stmt = $connect->prepare('INSERT INTO porosia(email,tel,emri_u,cmimi,pagesa,adresa,transporti,data) VALUES (?,?,?,?,?,?,?,?)');
	  $stmt->bind_param('sisdssss',$emaili,$phone,$products,$grand_total,$pmode,$address, $transporti,$today);
	  $stmt->execute();
	  $stmt2 = $connect->prepare("DELETE FROM shporta WHERE email ='$emaili'");
	  $stmt2->execute();
	  $data .= '<div class="text-center">
								<h1 class="display-4 mt-2 text-danger">Faleminderit!</h1>
								<h2 class="text-success">Pagesa eshte kryer me sukses!</h2>
								<h4 class="bg-danger text-light rounded p-2">Produktet e blere : ' . $products . '</h4>
								<h4>Adresa juaj : ' . $address . '</h4>
								<h4>Emaili juaj : ' . $emaili . '</h4>
								<h4>Numri i telefonit : ' . $phone . '</h4>
								<h4>Totali i paguar : ' . number_format($grand_total,2) . '</h4>
								<h4>Menyra e pageses : ' . $pmode . '</h4>
				</div>';
	  echo $data;
	}

  else if ($pmode == 'Debit or Credit Card'){
    $data = '';
    $stmt = $connect->prepare('INSERT INTO porosia(email,tel,emri_u,cmimi,pagesa,adresa,transporti,data) VALUES (?,?,?,?,?,?,?,?)');
    $stmt->bind_param('sisdssss',$emaili,$phone,$products,$grand_total,$pmode,$address,$transporti,$today);
    $stmt->execute();

      $data .= '<script type="text/javascript">
             window.location = "cardpayment.php"
        </script>';
      echo $data;
    }
  }
?>

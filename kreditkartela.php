<?php

require "includes/functions/connect.php";

    $cnumber = $_POST['cnumber'];
    $emrimbiemri = $_POST['emrimbiemri'];
    $expdate = $_POST['expdate'];
    $cvc = $_POST['cvc'];
    $register = true;
    $errorGen = "";
    $emaili = $_SESSION['emaili'];

    if(empty($cnumber) || empty($emrimbiemri) || empty($expdate) || empty($cvc)) {
	$errorGen = "Te gjitha fushat duhet te plotesohen!";
	$register = false;
}

    else {
    
        if($register == true) {
          $querysql = "INSERT INTO kartela (card_number, emri_mbiemri, expiration_date, card_verification_value) VALUES ('$cnumber', '$emrimbiemri', '$expdate', '$cvc');";

            //funksioni ne vazhdim perdoret per te ekzekutuar deklarata te shumta te sql query ne mysql
            if (mysqli_query($connect, $querysql)) {
                header("Location: faleminderit.php");
                $stmt2 = $connect->prepare("DELETE FROM shporta WHERE email ='$emaili'");
	            $stmt2->execute();
            }
            else {
                echo '<script type="text/javascript">';
                echo 'alert("Ka ndodhur nje gabim ne pagese!")';  
                echo '</script>';
            }
        }
    }
?>
<?php

//konekto me db
require "includes/functions/connect.php";
    $emri = $_POST['emri'];
    $mbiemri = $_POST['mbiemri'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $queryEmail = mysqli_query($connect, "SELECT email FROM perdoruesi WHERE email='$email'");
    $countEmail = mysqli_num_rows($queryEmail);

    $register = true;

    //ne vazhdim do te shikojme vetem rastet kur ka ndodhur ndonje gabim gjate plotesimit te formes te cilen po e validojme (per te dhenat e saj aktuale)
    //nese asnjera nga fushat e formes nuk eshte e plotesuar
    if(empty($name) && empty($surname) && empty($email) && empty($password) && empty($ConfirmPassword)) {
    	$errorGen = "Te gjitha fushat duhet te plotesohen!";
    	$register = false;
    }
    //nese te pakten njera nga fushat permban nje vlere perkatese, na nevojitet ta validojme ate vlere
else {

	if(empty($emri)) {
		$erroremri= "Fusha e emrit duhet te plotesohet!";
		$register = false;
	}

	//emri ka vlere, validoje ate
	else {
		//nese emri permban edhe karaktere tjera jo-shkronje
		if(!preg_match("/^[a-zA-Z ]*$/", $emri)) {
			$erroremri= "Emri duhet te permbaje vetem shkronja!";
			$register = false;
		}
	}

    if(empty($mbiemri)) {
		$errormbiemri="Fusha e mbiemrit duhet te plotesohet!";
		$register = false;
	}


	else {

		if(!preg_match("/^[a-zA-Z ]*$/", $mbiemri)) {
			$errormbiemri="Mbiemri duhet te permbaje vetem shkronja!";
			$register = false;
		}
	}

    //nese fusha e email adreses eshte e zbrazet
	if(empty($email)) {
		$erroremail = "Fusha e email adreses duhet te plotesohet!";
		$register = false;
	}

	//email adresa ka vlere, validoje ate
	else {
		//nese formati i email adreses se shenuar nuk eshte i sakte
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$erroremail = "Formati i email adreses nuk eshte i sakte!";
			$register = false;
		}
		//nese ekziston nje perdorues qe e ka kete email adrese
		else if($countEmail != 0) {
			$erroremail = "Ky email tashme ekziston!";
			$register = false;
		}
	}

    //nese fusha e fjalekalimit eshte e zbrazet
	if(empty($password)) {
		$errorpassword = "Fusha e fjalekalimit duhet te plotesohet!";
		$register = false;
	}

	//fjalekalimi ka vlere, validoje ate
	else {
		$uppercase = preg_match("@[A-Z]@", $password);
		$lowercase = preg_match("@[a-z]@", $password);
		$number = preg_match("@[0-9]@", $password);
		$specialChars = preg_match("@[^\w]@", $password);

		//nese fjalekalimi eshte i dobet
		//nese nuk plotesohet njeri nga kushtet e meposhtem atehere konsiderohet qe fjalekalimi eshte i dobet
		if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
			$errorpassword = "Fjalekalim i dobet";
			$errorPassTooltip = "Fjalekalimi duhet te permbaje te pakten 8 karaktere dhe duhet te perfshije te pakten nje shkronje te madhe dhe nje numer!";
			$register = false;
		}
	}

	//nese asnje gabim nuk ka ndodh (dmth nuk eshte plotesuar asnje nga kushtet qe perfaqesojne vetem kontrollimin e gabimeve qe kane ndodhe) atehere dmth qe variabla $register kurre nuk e ka marre vleren false, por vazhdon te kete vleren fillestare true, qe i bjen se kushti do te plotesohet dhe do te mundemi te realizojme insertimin e te dhenave ne db
	if($register == true) {

		$insert = "INSERT INTO perdoruesi(emri,mbiemri,email,password,roli) VALUES ('$emri','$mbiemri','$email',('$password'),2);";


		//funksioni ne vazhdim perdoret per te ekzekutuar deklarata te shumta te sql query ne mysql
		if (mysqli_query($connect, $insert)) {
            echo '<script type="text/javascript">';
            echo 'alert("Punetori u shtua me sukses.")';
            echo '</script>';
		}
		else {
            echo '<script type="text/javascript">';
            echo 'alert("Ka ndodhur nje gabim ne insertim!")';
            echo '</script>';
		}
	}
}
?>

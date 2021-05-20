<?php

//validimi i te dhenave te formes se kyqjes

//marrja e te dhenave te formes permes metodes POST
$emaili = $_POST['emailLogin'];
$pass = $_POST['passLogin'];

$login = true;

//konektimi me db
require "Includes/functions/connect.php";

//validimi i te dhenave hyrese

//nese asnjera nga fushat nuk eshte plotesuar
if(empty($emaili) && empty($pass)) {
	$errorGeni = "Te gjitha te dhenat duhet te plotesohen!";
	$login = false;
}

//nese te pakten njera nga fushat ka vlere, atehere validoje ate vleren
else {
	//validimi i username-it

	//nese username eshte i zbrazet
	if(empty($emaili)) {
		$errorEmaili = "Fusha e username-it duhet te plotesohet!";
		$login = false;
	}

	//nese username ka vlere, validoje ate
	else {
		//nese perdoruesi nuk ekziston

		$query1 = "SELECT * FROM perdoruesi WHERE email = '$emaili';";
		$query1Res = mysqli_query($connect, $query1);
		$count1 = mysqli_num_rows($query1Res);

		//nese nuk ka rreshta rezultat => perdoruesi nuk ekziston
		if($count1 == 0) {
			$errorEmaili = "Ky perdorues nuk ekziston!";
			$login = false;
		}
	}

	//validimi i password-it

	//nese fjalekalimi eshte i zbrazet
	if(empty($pass)) {
		$errorPasswordi = "Fusha e fjalekalimit duhet te plotesohet!";
		$login = false;
	}

	//nese fjalekalimi ka vlere, validoje ate
	else {
		//nese fjalekalimi per kete perdorues nuk eshte i sakte

		$query2 = "SELECT password FROM perdoruesi WHERE email = '$emaili';";
		$query2Res = mysqli_query($connect, $query2);
		$query2Row = mysqli_fetch_array($query2Res);
		$passwordDB = $query2Row['password'];
		$pass1 = $pass;

		//nese vlerat e fjalekalimeve nuk perputhen
		if($pass1 != $passwordDB) {
			$errorPasswordi = "Fjalekalimi nuk eshte i sakte!";
			$login = false;
		}
	}

	//nese asnje gabim nuk ka ndodhur, atehere asnjehere nuk eshte plotesu asnje kusht qe perfaqeson nje gabim te ndodhur => variabla login ende e permban vleren fileestare true
	if($login == true) {
		//perdoruesi kyqet ne sistem, varesisht prej rolit te tij

		$query3 = "SELECT roli FROM perdoruesi WHERE email = '$emaili';";
		$query3Res = mysqli_query($connect, $query3);
		$query3Row = mysqli_fetch_array($query3Res);
		$roli = $query3Row['roli'];

		$_SESSION['emaili'] = $emaili;
		$_SESSION['roli'] = $roli;

		//ridrejtoje ne faqen baze e cila mund te qaset pas kyqjes
		header("Location: index.php");
	}
}

?>

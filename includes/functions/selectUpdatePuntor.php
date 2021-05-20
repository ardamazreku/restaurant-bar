<?php


require "connect.php";

	$id = $_POST['id'];
	$email = $_POST['email'];
	$fjalekalimi = $_POST['fjalekalimi'];


$queryID = mysqli_query($connect, "SELECT id FROM perdoruesi WHERE id='$id'");
$countID = @mysqli_num_rows($queryID);
$queryEmail = mysqli_query($connect, "SELECT email FROM perdoruesi WHERE email='$email'");
$countEmail = @mysqli_num_rows($queryEmail);

//variabla $register tregon nese mund te kryejme regjistrimin e studentit apo jo, varesisht nga vlera e saj meqe eshte boolean-e
//kudo qe ka gabime variabla $register e merr vleren false (dmth mbishkruhet vlera fillestare true me false)
$register = true;

//ne vazhdim do te shikojme vetem rastet kur ka ndodhur ndonje gabim gjate plotesimit te formes te cilen po e validojme (per te dhenat e saj aktuale)
//nese asnjera nga fushat e formes nuk eshte e plotesuar
if($id == "Perzgjidh id-n" && empty($email) && empty($fjalekalimi)) {
	$errorGen = "Te gjitha fushat duhet te plotesohen!";
	$register = false;
}

//nese te pakten njera nga fushat permban nje vlere perkatese, na nevojitet ta validojme ate vlere
else {




	if($id == "Perzgjidh id-ne") {
		$errorid = "Fusha e id-se duhet te plotesohet!";
		$register = false;
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
	if(empty($fjalekalimi)) {
		$errorfjalekalimi = "Fusha e fjalekalimit duhet te plotesohet!";
		$register = false;
	}

	//fjalekalimi ka vlere, validoje ate
	else {
		$uppercase = preg_match("@[A-Z]@", $fjalekalimi);
		$lowercase = preg_match("@[a-z]@", $fjalekalimi);
		$number = preg_match("@[0-9]@", $fjalekalimi);
		$specialChars = preg_match("@[^\w]@", $fjalekalimi);

		//nese fjalekalimi eshte i dobet
		//nese nuk plotesohet njeri nga kushtet e meposhtem atehere konsiderohet qe fjalekalimi eshte i dobet
		if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($fjalekalimi) < 8) {
			$errorfjalekalimi = "Fjalekalim i dobet!";
			//$errorPassTooltip = "Fjalekalimi duhet te permbaje te pakten 8 karaktere dhe duhet te perfshije te pakten nje shkronje te madhe, nje numer dhe nje karakter special!";
			$register = false;
		}
	}

	if($register == true) {

		$updateQuery = "UPDATE perdoruesi
				SET	email='$email', password='$fjalekalimi'
					WHERE id = '$id' AND roli=2;";
		$updateQuery .= "Update puntori";


		if (mysqli_multi_query($connect, $updateQuery)) {
			echo '<script type="text/javascript">';
            echo 'alert("Punetori u be Update me sukses!")';
            echo '</script>';
		}
		else {
            echo '<script type="text/javascript">';
            echo 'alert("Ka ndodhur nje gabim ne Update!")';
            echo '</script>';
		}
	}
}
?>

<?php
 //Connectimi me database
 require "includes/functions/connect.php";

 //marrja e te dhenave te formes me POST
$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$password = $_POST['password'];
$ConfirmPassword = $_POST['ConfirmPassword'];

//Kjo pjes na nevojitet te shikojm nese ekziston perdoruesi me email te njejtt
$queryEmail = mysqli_query($connect, "SELECT email FROM perdoruesi WHERE email='$email'");
$countEmail = @mysqli_num_rows($queryEmail);

//ne fillim eshte true boolean nese do te ket ndonje gabim atehere do te behet false
$register = true;
//error te pergjithshem
if(empty($name) && empty($surname) && empty($email) && empty($password) && empty($ConfirmPassword)) {
	$errorGen = "Te gjitha fushat duhet te plotesohen!";
	$register = false;
}
//nese te pakten njera nga fushat permban nje vlere perkatese, na nevojitet ta validojme ate vlere
else {
	//nese fusha e emrit eshte e zbrazet
	if(empty($name)) {
		$errorName = "Fusha e emrit duhet te plotesohet!";
		$register = false;
	}

	//emri ka vlere, validoje ate
	else {
		//nese emri permban edhe karaktere tjera jo-shkronje
		if(!preg_match("/^[a-zA-Z ]*$/", $name)) {
			$errorName = "Emri duhet te permbaje vetem shkronja!";
			$register = false;
		}
	}
	//nese fusha e mbiemrit eshte e zbrazet
	if(empty($surname)) {
		$errorSurname = "Fusha e mbiemrit duhet te plotesohet!";
		$register = false;
	}
		else {
		//nese mbiemri permban edhe karaktere tjera jo-shkronje
		if(!preg_match("/^[a-zA-Z ]*$/", $surname)) {
			$errorSurname = "Mbiemri duhet te permbaje vetem shkronja!";
			$register = false;
		}
			}
	//nese fusha e email adreses eshte e zbrazet
	if(empty($email)) {
		$errorEmail = "Fusha e email adreses duhet te plotesohet!";
		$register = false;
	}
	//email adresa ka vlere, validoje ate
	else {
		//nese formati i email adreses se shenuar nuk eshte i sakte
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errorEmail = "Formati i email adreses nuk eshte i sakte!";
			$register = false;
		}
		//nese ekziston nje perdorues qe e ka kete email adrese
		else if($countEmail != 0) {
			$errorEmail = "Ky email tashme ekziston!";
			$register = false;
		}
	}
	if(empty($password)) {
		$errorPassword = "Fusha e fjalekalimit duhet te plotesohet!";
		$register = false;
	}

	//fjalekalimi ka vlere, validoje ate
	else {
		$uppercase = preg_match("@[A-Z]@", $password);
		$lowercase = preg_match("@[a-z]@", $password);
		$number = preg_match("@[0-9]@", $password);

		//nese fjalekalimi eshte i dobet
		//nese nuk plotesohet njeri nga kushtet e meposhtem atehere konsiderohet qe fjalekalimi eshte i dobet
		if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
			$errorPassword = "Fjalekalim i dobet";
			$errorPassTooltip = "Fjalekalimi duhet te permbaje te pakten 8 karaktere dhe duhet te perfshije te pakten nje shkronje te madhe,dhe  nje numer !";
			$register = false;
		}
	}
    if($password != $ConfirmPassword)
    {

        $errorConfirmPassword="Fusha confirm password duhet te jete e njejte me fushen password";
        $register=false;
    }

    if($register == true) {

		//tani jemi gati te insertojme perdoruesin e ri ne db
		//ne rastin tone do te bejme nje insertim
		$querysql = "INSERT INTO perdoruesi
			( emri, mbiemri, email, password, roli)
			VALUES ('$name', '$surname', '$email',('$password'), 3);";

		//funksioni ne vazhdim perdoret per te ekzekutuar deklarata te shumta te sql query ne mysql
		if (mysqli_multi_query($connect, $querysql)) {
			header("Location: login.php");

		}
		else {
            echo '<script type="text/javascript">';
            echo 'alert("Ka ndodhur nje gabim ne insertim!")';  
            echo '</script>';
		}
	}
}
?>

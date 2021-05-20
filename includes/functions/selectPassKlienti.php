<?php

//validimi i te dhenave te formes se kyqjes
require"includes/functions/connect.php";
//marrja e te dhenave te formes permes metodes POST
$newpassword= $_POST['newpassword'];
$oldpassword= $_POST['oldpassword'];
$confirmpassword=$_POST['confirmpassword'];
$email=$_SESSION['emaili'];

$register= true;


//konektimi me db
require "includes/functions/connect.php";

//validimi i te dhenave hyrese

//nese asnjera nga fushat nuk eshte plotesuar
if(empty($newpassword) && empty($oldpassword)&& empty($confirmpassword)) {
	$errorGen = "Te gjitha te dhenat duhet te plotesohen!";
	$register = false;
}

//nese te pakten njera nga fushat ka vlere, atehere validoje ate vleren
else {
	if(empty($oldpassword)) {
		$erroroldpassword = "Fusha e fjalkalimit te vjeter duhet te plotesohet!";
		$register = false;
	}


	else {
		

		$query2 = "SELECT password FROM perdoruesi WHERE email = '$email';";
		$query2Res = mysqli_query($connect, $query2);
		$query2Row = mysqli_fetch_array($query2Res);
		$passwordDB = $query2Row['password'];
		$pass1 = $oldpassword;

		//nese vlerat e fjalekalimeve nuk perputhen
		if($pass1 != $passwordDB) {
			$erroroldpassword = "Fjalekalimi nuk eshte i sakte!";
			$register= false;
		}
    }
    
    if(empty($newpassword)) {
		$errornewpassword = "Fusha e fjalkalimit te ri duhet te plotesohet!";
		$register = false;
	}
else{
		$uppercase = preg_match("@[A-Z]@", $newpassword);
		$lowercase = preg_match("@[a-z]@", $newpassword);
		$number = preg_match("@[0-9]@", $newpassword);

		//nese fjalekalimi eshte i dobet
		//nese nuk plotesohet njeri nga kushtet e meposhtem atehere konsiderohet qe fjalekalimi eshte i dobet
		if(!$uppercase || !$lowercase || !$number || strlen($newpassword) < 8) {
			$errornewpassword= "Fjalekalim i dobet";
			$errorPassTooltip = "Fjalekalimi duhet te permbaje te pakten 8 karaktere dhe duhet te perfshije te pakten nje shkronje te madhe,dhe  nje numer !";
			$register = false;
		}
	
    if($newpassword != $confirmpassword)
    {

        $errorconfirmpassword="Fusha confirm password duhet te jete e njejte me fushen password";
        $register=false;
    }
    
	}
	

	
	if($register == true) {
		
		$update = "update perdoruesi set password='$newpassword' WHERE email = '$email';";
		if (mysqli_query($connect, $update)) {
            echo '<script type="text/javascript">';
            echo 'alert("Passwordi u be update me sukses.")';  
            echo '</script>';
		}
		else {
            echo '<script type="text/javascript">';
            echo 'alert("Ka ndodhur nje gabim ne UPDATE!")';  
            echo '</script>';
		}
	}
}
?>

<?php


require "connect.php";

	$id = $_POST['id'];
	$emri = $_POST['emri'];


$queryID = mysqli_query($connect, "SELECT id FROM kategorite WHERE id = '$id'");
$countID = @mysqli_num_rows($queryID);


//variabla $register tregon nese mund te kryejme regjistrimin e studentit apo jo, varesisht nga vlera e saj meqe eshte boolean-e
//kudo qe ka gabime variabla $register e merr vleren false (dmth mbishkruhet vlera fillestare true me false)
$register = true;

//ne vazhdim do te shikojme vetem rastet kur ka ndodhur ndonje gabim gjate plotesimit te formes te cilen po e validojme (per te dhenat e saj aktuale)
//nese asnjera nga fushat e formes nuk eshte e plotesuar
if($id == "Perzgjidh id-n" && empty($emri)) {
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
	if(empty($emri)) {
		$erroremri = "Fusha e emrit adreses duhet te plotesohet!";
		$register = false;
	}

	if($register == true) {

		$updateQuery = "UPDATE kategorite
				SET	id='$emri'
					WHERE id = '$id'";



		if (mysqli_query($connect, $updateQuery)) {
			echo '<script type="text/javascript">';
            echo 'alert("Kategoria u be Update me sukses!")';
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

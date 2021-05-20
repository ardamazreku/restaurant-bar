<?php

//konekto me db
require "includes/functions/connect.php";

    $id = $_POST['id'];
    $emri = $_POST['emri'];
    $pershkrimi = $_POST['pershkrimi'];
    $cmimi = $_POST['cmimi'];


    $queryID = mysqli_query($connect, "SELECT * FROM ushqimi WHERE id = '$id' ");
    $countKodi = mysqli_num_rows($queryID);


    $buton = true;

    //ne vazhdim do te shikojme vetem rastet kur ka ndodhur ndonje gabim gjate plotesimit te formes te cilen po e validojme (per te dhenat e saj aktuale)
    //nese asnjera nga fushat e formes nuk eshte e plotesuar
    if(empty($id) && empty($emri) && empty($pershkrimi) && empty($cmimi) )
    {
        $errorGen = "Te gjitha fushat duhet te plotesohen!";
        $buton = false;
    }

    //nese te pakten njera nga fushat permban nje vlere perkatese, na nevojitet ta validojme ate vlere
else {

	if($id == "Perzgjidh id-ne") {
		$errorId = "Fusha e id-se duhet te plotesohet!";
		$buton = false;
	}




	if(empty($emri)) {
		$errorEmri= "Fusha e emrit duhet te plotesohet!";
		$buton = false;
	}


    if(empty($pershkrimi)) {
		$errorPershkrimi="Fusha e pershkrimit duhet te plotesohet!";
		$buton = false;
	}


    //nese fusha e email adreses eshte e zbrazet
	if(empty($cmimi)) {
		$errorCmimi = "Fusha e cmimit duhet te plotesohet!";
		$buton = false;
	}
	else {
		if(!is_numeric($cmimi)) {
            $errorCmimi= "Cmimi duhet te permbaje vetem numra!";
            $buton = false;
        }
	}



	//nese asnje gabim nuk ka ndodh (dmth nuk eshte plotesuar asnje nga kushtet qe perfaqesojne vetem kontrollimin e gabimeve qe kane ndodhe) atehere dmth qe variabla $register kurre nuk e ka marre vleren false, por vazhdon te kete vleren fillestare true, qe i bjen se kushti do te plotesohet dhe do te mundemi te realizojme insertimin e te dhenave ne db
	if($buton == true) {

		$update= "UPDATE ushqimi SET  emri='$emri',pershkrimi='$pershkrimi',cmimi='$cmimi' WHERE id = '$id';";



		//funksioni ne vazhdim perdoret per te ekzekutuar deklarata te shumta te sql query ne mysql
		if (mysqli_query($connect, $update)) {
            echo '<script type="text/javascript">';
            echo 'alert("Ushqimi u be update me sukses.")';
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

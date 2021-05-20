<?php

//konekto me db
require "includes/functions/connect.php";

    $emri = $_POST['emri'];

  $gjendjaaktuale=$_POST['gjendjaaktuale'];
    $buton = true;

    //ne vazhdim do te shikojme vetem rastet kur ka ndodhur ndonje gabim gjate plotesimit te formes te cilen po e validojme (per te dhenat e saj aktuale)
    //nese asnjera nga fushat e formes nuk eshte e plotesuar
    if(empty($emri))
    {
        $errorGen = "Fusha duhet te plotesohet!";
        $buton = false;
    }

 
else {
	if($gjendjaaktuale=="Perzgjidh gjendjen aktuale")
	{
		
		$errorGjendja1="Duhet te zgjedh njerin nga gjendja aktuale";
		$buton=false;
	}

  if (is_numeric($emri)) {
          $errorGjendja = "Fusha duhet te permbaj vetem shkronja!";
          $buton = false;
      }



	//nese asnje gabim nuk ka ndodh (dmth nuk eshte plotesuar asnje nga kushtet qe perfaqesojne vetem kontrollimin e gabimeve qe kane ndodhe) atehere dmth qe variabla $register kurre nuk e ka marre vleren false, por vazhdon te kete vleren fillestare true, qe i bjen se kushti do te plotesohet dhe do te mundemi te realizojme insertimin e te dhenave ne db
	if($buton == true) {

		$query ="UPDATE track SET gjendjaaktuale='$emri' WHERE gjendjaaktuale = '$gjendjaaktuale'";



		//funksioni ne vazhdim perdoret per te ekzekutuar deklarata te shumta te sql query ne mysql
		if (mysqli_query($connect, $query)) {
            echo '<script type="text/javascript">';
            echo 'alert("Track u update me sukses.")';
            echo '</script>';
		}
		else {
            echo '<script type="text/javascript">';
            echo 'alert("Ka ndodhur nje gabim ne update-im!")';
            echo '</script>';
		}
	}
}
?>

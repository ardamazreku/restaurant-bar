<?php

//konekto me db
require "includes/functions/connect.php";

    $gjendjaaktuale = $_POST['gjendjaaktuale'];


    $register = true;

    //ne vazhdim do te shikojme vetem rastet kur ka ndodhur ndonje gabim gjate plotesimit te formes te cilen po e validojme (per te dhenat e saj aktuale)
    //nese asnjera nga fushat e formes nuk eshte e plotesuar
    if(empty($gjendjaaktuale))
    {
        $errorGen = "Fusha duhet te plotesohet!";
        $register = false;
    }

    //nese te pakten njera nga fushat permban nje vlere perkatese, na nevojitet ta validojme ate vlere
else {

  if(is_numeric($gjendjaaktuale)) {
          $errorGjendia = "Fusha duhet te permbaj vetem shkronja!";
          $register = false;
      }



	//nese asnje gabim nuk ka ndodh (dmth nuk eshte plotesuar asnje nga kushtet qe perfaqesojne vetem kontrollimin e gabimeve qe kane ndodhe) atehere dmth qe variabla $register kurre nuk e ka marre vleren false, por vazhdon te kete vleren fillestare true, qe i bjen se kushti do te plotesohet dhe do te mundemi te realizojme insertimin e te dhenave ne db
	if($register == true) {

		$insert = "INSERT INTO track(gjendjaaktuale) VALUES ('$gjendjaaktuale');";



		//funksioni ne vazhdim perdoret per te ekzekutuar deklarata te shumta te sql query ne mysql
		if (mysqli_query($connect, $insert)) {
            echo '<script type="text/javascript">';
            echo 'alert("Track u shtua me sukses.")';
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

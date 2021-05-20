<?php

//konekto me db
require "includes/functions/connect.php";

    $id = $_POST['id'];

    $queryID = mysqli_query($connect, "SELECT id FROM kategorite where id='$id'");
    $countKodi =mysqli_num_rows($queryID);

    $register = true;

    //ne vazhdim do te shikojme vetem rastet kur ka ndodhur ndonje gabim gjate plotesimit te formes te cilen po e validojme (per te dhenat e saj aktuale)
    //nese asnjera nga fushat e formes nuk eshte e plotesuar
    if(empty($id))
    {
        $errorGen = "Te gjitha fushat duhet te plotesohen!";
        $register = false;
    }

    //nese te pakten njera nga fushat permban nje vlere perkatese, na nevojitet ta validojme ate vlere
else {

    if(empty($id)) {
        $errorid = "Fusha e ID-se duhet te plotesohet!";
		$register = false;
    }

        else if($countKodi != 0) {
            echo '<script type="text/javascript">';
            echo 'alert("Kjo kategori tashme ekziston!")';
            echo '</script>';
			$register = false;
    }

	if($register == true) {

		$insert = "INSERT INTO kategorite(id) VALUES ('$id');";

		//funksioni ne vazhdim perdoret per te ekzekutuar deklarata te shumta te sql query ne mysql
		if (mysqli_query($connect, $insert)) {
            echo '<script type="text/javascript">';
            echo 'alert("Kategoria u shtua me sukses.")';
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

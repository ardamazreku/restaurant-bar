<?php

//konekto me db
require "includes/functions/connect.php";

    $id = $_POST['id'];
    $pershkrimi = $_POST['pershkrimi'];
  

    $queryID = mysqli_query($connect, "SELECT r_id FROM roli where r_id='$id'");
    $countKodi =mysqli_num_rows($queryID);
    
    $register = true;

    //ne vazhdim do te shikojme vetem rastet kur ka ndodhur ndonje gabim gjate plotesimit te formes te cilen po e validojme (per te dhenat e saj aktuale)
    //nese asnjera nga fushat e formes nuk eshte e plotesuar
    if(empty($id) && empty($pershkrimi))
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
    else {
        
        if(!is_numeric($id)) {
            $errorid= "ID-ja duhet te permbaje vetem numra!";
            $register = false;
        }
        else if($countKodi != 0) {
            echo '<script type="text/javascript">';
            echo 'alert("Ky rol tashme ekziston!")';  
            echo '</script>';
			$register = false;
		}
    }
    

	if(empty($pershkrimi)) {
		$errorpershkrimi= "Fusha e pershkrimit duhet te plotesohet!";
		$register = false;
	}
	
	
	else {
		//nese emri permban edhe karaktere tjera jo-shkronje
		if(!preg_match("/^[a-zA-Z ]*$/", $pershkrimi)) {
			$errorpershkrimi= "Pershkrimi duhet te permbaje vetem shkronja!";
			$register = false;
		}
	}
    
	if($register == true) {
		
		$insert = "INSERT INTO roli(r_id,r_pershkrimi) VALUES ('$id','$pershkrimi');";
		
		//funksioni ne vazhdim perdoret per te ekzekutuar deklarata te shumta te sql query ne mysql
		if (mysqli_query($connect, $insert)) {
            echo '<script type="text/javascript">';
            echo 'alert("Roli u shtua me sukses.")';  
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
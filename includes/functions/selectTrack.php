<?php

require "Includes/functions/connect.php";

$selectQuery = "SELECT id,email,tel,emri_u,cmimi,adresa,pagesa,gjendjaaktuale,data FROM porosia where transporti=1;";
//ekzekutimi i query-it
$selectQueryRes = mysqli_query($connect, $selectQuery);

if(mysqli_num_rows($selectQueryRes) == 0) {
	echo "
			<p>Nuk ka te dhena</p>
		";
}

while($row = mysqli_fetch_assoc($selectQueryRes)) {
	//marrja e te dhenave prej rreshtave rezultat ne secilin iterim te ciklit while
	$id = $row['id'];
	$emri = $row['emri_u'];
	$cmimi = $row['cmimi'];
	$adresa= $row['adresa'];
	$data = $row['data'];
    $pagesa=$row['pagesa'];
    $tel=$row['tel'];
    $email=$row['email'];
    $idT=$row['gjendjaaktuale'];
  
	echo "<div class='container'>";
	echo "<form action='Includes/functions/submitTrackDB.php' method='POST'>
         <div class='row'>
         <div class='col-lg-3 col-md-12 col-sm-12 col-xs-12'>
            <h4><b>USHQIMI:</b><input class='form-control' type='text' value='$emri' name='emri' readonly></input></h4>
         </div>
         <div class='col-lg-3 col-md-12 col-sm-12 col-xs-12'>
            <h4><b>CMIMI:</b><input class='form-control' type='text' value='$cmimi' name='cmimi' readonly></input></h4>
        </div>
        <div class='col-lg-3 col-md-12 col-sm-12 col-xs-12'>
            <h4><b>ADRESA:</b><input class='form-control' type='text' value='$adresa' name='adresa' readonly></input></h4>
        </div>
        <div class='col-lg-3 col-md-12 col-sm-12 col-xs-12'>
            <h4><b>DATA:</b><input class='form-control' type='text' value='$data' name='data' readonly></innput></h4>
        </div>
        </div> 
        <div class='row'>
        <div class='col-lg-3 col-md-12 col-sm-12 col-xs-12'>
            <h4><b>PAGESA:</b><input class='form-control' type='text' value='$pagesa' name='pagesa' readonly></input></h4>
        </div>
        <div class='col-lg-3 col-md-12 col-sm-12 col-xs-12'>
            <h4><b>TRACK:</b><input type='hidden' value='$id' name='id' readonly></input></h4>
            <br><select name='track' class='form-control track'>
            <option value='$idT'> $idT </option>";
            include "includes/functions/selectTrackID.php";
                echo"</select></div>";
				echo "
                <div class='col-lg-3 col-md-12 col-sm-12 col-xs-12'>
                    <h4><b>TEL:</b><input class='form-control' type='text' value='$email' name='email' readonly></input></h4>
                </div>
                <div class='col-lg-3 col-md-12 col-sm-12 col-xs-12'>
                    <h4><b>TEL:</b><input class='form-control' type='text' value='$tel' name='tel' readonly></input></h4>
                </div>
                <div class='col-lg-3 col-md-12 col-sm-12 col-xs-12'>
                <button class='btn btn primary' style='background:black;color:white' name='submit' type='submit'>Submit</button>
                <br><br><br><br>
                </div>
                </div></form>";
			
		echo "</div>";
}

?>
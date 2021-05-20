<?php

require "Includes/functions/connect.php";

$email=$_SESSION['emaili'];
$selectQuery = "SELECT id,emri_u,cmimi,adresa,email,pagesa,gjendjaaktuale,data FROM porosia where email='$email';";
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
	$email = $row['email'];
    $pagesa=$row['pagesa'];
    $idT=$row['gjendjaaktuale'];
    $data=$row['data'];
  
	echo "<br><div class='container'>";
	echo "<div class='row'>
    <form action='' method='POST'>
         <div class='col-lg-3 col-md-12 col-sm-12 col-xs-12'>
            <h4><b>USHQIMI:</b><input class='form-control' type='text' value='$emri' name='emri' readonly></input></h4>
         </div>
        <div class='col-lg-2 col-md-12 col-sm-12 col-xs-12'>
            <h4><b>ADRESA:</b><input class='form-control' type='text' value='$adresa' name='adresa' readonly></input></h4>
        </div>
        <div class='col-lg-1 col-md-12 col-sm-12 col-xs-12'>
            <h4><b>CMIMI:</b><input class='form-control' type='text' value='$cmimi' name='cmimi' readonly></innput></h4>
        </div>
        <div class='col-lg-2 col-md-12 col-sm-12 col-xs-12'>
            <h4><b>PAGESA</b><input class='form-control' type='text' value='$pagesa' name='pagesa' readonly></input></h4>
        </div>
        <div class='col-lg-2 col-md-12 col-sm-12 col-xs-12'>
        <h4><b>Track</b><input type='text' name='track' class='form-control' value='$idT' readonly></input></h4></div>
        <div class='col-lg-2 col-md-12 col-sm-12 col-xs-12'>
        <h4><b>Data</b><input type='text' name='track' class='form-control' value='$data' name='data' readonly></input></h4></div>";     
        echo "</div></form><br><br>";
			
		echo "</div></div>";
}

?>
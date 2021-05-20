<?php


//selektimi i ushqimeve qe mund te fshihen nga tabela ushqimi ne db, nga adminstratori i kyqur ne sistem

//adminstratori i kyqur
$emaili = $_SESSION['emaili'];

//konektimi me db
require "includes/functions/connect.php";


$selectQuery = "SELECT *
				FROM ushqimi";
//ekzekutimi i query-it
$selectQueryRes = mysqli_query($connect, $selectQuery);

//marrja e te dhenave nga rreshtat rezultat


echo"<div class='container-fluid col-lg-12 col-md-12 col-sm-12 col-xs-12'>";

if(mysqli_num_rows($selectQueryRes) == 0) {
	echo "<div class='row'>
    <div class='col-12'><p> Nuk ka te dhena</p></div>
    </div>";
}

while($rreshti = mysqli_fetch_array($selectQueryRes)) {
	$id=$rreshti['id'];
	$emri = $rreshti['emri'];
	$pershkrimi = $rreshti['pershkrimi'];
    $foto = $rreshti['fotografia'];
	$cmimi = $rreshti['cmimi'];

   echo "<center>
   <div class='row'>
       <div class='col-lg-2 col-md-6 col-sm-6 col-xs-12'><p><b>ID:</b>$id</p></div>
       <div class='col-lg-2 col-md-6 col-sm-6 col-xs-12' ><p><b> EMRI:</b>$emri</p></div>
       <div class='col-lg-2 col-md-6 col-sm-6 col-xs-12'><p><b> PERSHKRIMI:</b>$pershkrimi</p></div>
       <div class='col-lg-2 col-md-6 col-sm-6 col-xs-12'><p><b> FOTOGRAFIA:</b><br><img src='$foto' height='80'></p></div>
	   <div class='col-lg-2 col-md-6 col-sm-6 col-xs-12'><p><b>CMIMI: </b>$cmimi</p></div>
       <div class='col-lg-2 col-md-6 col-sm-6 col-xs-12' ><a href = 'Includes/functions/deleteUshqimiDB.php?id=$id'class='btn btn primary' style= 'text-decoration: none; background-color: #000000;color: white;cursor: pointer;'>Delete</a><div>
    </div> 
    </center><hr style='height:10px; background-color:black'>";
}

echo "</div>";




?>

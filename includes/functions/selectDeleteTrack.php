<?php


//selektimi i ushqimeve qe mund te fshihen nga tabela ushqimi ne db, nga adminstratori i kyqur ne sistem

//adminstratori i kyqur
$emaili = $_SESSION['emaili'];

//konektimi me db
require "includes/functions/connect.php";


$selectQuery = "SELECT *
				FROM track";
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
	$gjendjaaktuale=$rreshti['gjendjaaktuale'];


   echo "<center>
   <div class='row'>
       <div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'><p><b>Gjendja Aktuale:</b>$gjendjaaktuale</p></div>
   
       <div class='col-lg-6 col-md-6 col-sm-12 col-xs-12' ><a href = 'Includes/functions/deleteTrackDB.php?gjendjaaktuale=$gjendjaaktuale'class='btn btn primary' style= 'text-decoration: none; background-color: #000000;color: white;cursor: pointer;'>Delete</a><div>
    </div> 
    </center><hr>";
}

echo "</div>";




?>

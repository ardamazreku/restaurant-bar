<?php

//selektimi i lendeve qe mund te fshihen nga tabela lenda ne db, nga adminstratori i kyqur ne sistem

//adminstratori i kyqur
$emaili = $_SESSION['emaili'];

//konektimi me db
require "includes/functions/connect.php";

//query per selektimin e lendeve per fshirjen
$selectQuery = "SELECT *
				FROM kategorite";
//ekzekutimi i query-it
$selectQueryRes = mysqli_query($connect, $selectQuery);

//marrja e te dhenave nga rreshtat rezultat

//krijimi i tabeles per vendosjen e te dhenave rezultat
echo"<div class='container' style='margin-left:15%'>";

if(mysqli_num_rows($selectQueryRes) == 0) {
	echo "<div class='row'>
    <div class='col-12'><p> Nuk ka te dhena</p></div>
    </div>
		";
}

while($rreshti = mysqli_fetch_array($selectQueryRes)) {
	$id=$rreshti['id'];



  echo "<center>
  <div class='row'>
      <div class='col-sm-3'><p>ID:$id</p></div>
      <div class='col-sm-3'><a class='btn btn primary' href ='includes/functions/deleteKategoritDB.php?id=$id' style= 'text-decoration: none; background-color: #000000;color: white;cursor: pointer;'>Delete</a></div></div></center>";
      }
echo "</div>";

?>

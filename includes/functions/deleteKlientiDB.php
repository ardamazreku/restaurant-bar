<?php
//startimi i sesionit
require "connect.php";
session_start();


if(isset($_SESSION['emaili']) && isset($_SESSION['roli']) && $_SESSION['roli'] == 3) {
	$email=$_SESSION['emaili'];




	$deleteQuery = "DELETE FROM perdoruesi WHERE email = '$email';";
	//ekzekutimi i query-it per fshirjen
	mysqli_query($connect, $deleteQuery);

}

//ridrejto ne faqen baze
session_destroy();

header("Location: ../../index.php");
?>
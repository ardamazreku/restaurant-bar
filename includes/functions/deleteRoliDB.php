<?php
//startimi i sesionit
require "connect.php";
session_start();

//marrja e te dhenave me metoden GET
//perdoruesi i kyqur dhe roli i tij administrator
if(isset($_SESSION['emaili']) && isset($_SESSION['roli']) && $_SESSION['roli'] == 1 && isset($_GET['r_id'])) {
	$id = $_GET['r_id'];



	//query per fshirjen e lendes perkatese
	$deleteQuery = "DELETE FROM roli where r_id='$id'";
	//ekzekutimi i query-it per fshirjen
	mysqli_query($connect, $deleteQuery);

}

//ridrejto ne faqen baze

header("Location: ../../deleteRoli.php");
?>

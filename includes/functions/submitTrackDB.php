<?php

//startimi i nje sesionit
session_start();
require "connect.php";

if(isset($_SESSION['emaili']) && isset($_SESSION['roli']) && $_SESSION['roli'] == 2 && isset($_POST['submit'])) {
	

	$id=$_POST['id'];
	$idT = $_POST['track'];
    
	//query per update ne db
	$updateQuery = "UPDATE porosia 
					SET gjendjaaktuale = '$idT' where id='$id';";
	mysqli_query($connect, $updateQuery);
}

//ridrejtoje perdoruesin ne faqe
header("Location: ../../track.php");

?>
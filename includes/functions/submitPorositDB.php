<?php

//startimi i nje sesionit
session_start();

//ndryshimi i nje rreshti ne DB

//kontrollo nese eshte kliku butoni, jane dergu te dhenat permes metodes GET
//perdoruesi i kyqur dhe roli i tij student
if(isset($_SESSION['emaili'])  && $_SESSION['roli'] == 2 && isset($_GET['id'])&& isset($_GET['transporti'])) {
	
	//marrja e vlerave me GET
	$id = $_GET['id'];
	$transporti = $_GET['transporti'];
	
	//konekto me db
	require "connect.php";
	
	//query per update ne db
	$updateQuery = "UPDATE porosia 
					SET transporti = 1 where id='$id';";
	mysqli_query($connect, $updateQuery);
}

//ridrejtoje perdoruesin ne faqen submitExams.php
header("Location: ../../porosit.php");

?>
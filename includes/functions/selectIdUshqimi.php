<?php

//konektimi me db (i nevojshem)
require "includes/functions/connect.php";

$query = mysqli_query($connect, "SELECT id FROM ushqimi");

//tani na nevojitet te i marrim keto rreshta rezultat nga query i ekzekutuar
//meqe rezultati permban disa rreshta si rezultat qe kthehen nga query i ekzekutuar me larte, atehere duhet te iterojme ne secilin rresht me nje cikel
while($row = @mysqli_fetch_assoc($query)) { 
	$id = $row['id'];
	
	//vendosja e te dhenave te marra ne etiketat <option> ne HTML
	echo "<option value = '$id'>$id </option>";
}



?>
<?php

//konektimi me db (i nevojshem)
require "includes/functions/connect.php";

$query = mysqli_query($connect, "SELECT gjendjaaktuale FROM track");

while($row = @mysqli_fetch_assoc($query)) { 
	
	$idT= $row['gjendjaaktuale'];

	//vendosja e te dhenave te marra ne etiketat <option> ne HTML
	echo "<option value = '$idT'>$idT </option>";
}
?>

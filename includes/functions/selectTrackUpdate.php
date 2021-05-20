<?php

//konektimi me db (i nevojshem)
require "connect.php";


$query = mysqli_query($connect, "SELECT gjendjaaktuale FROM track");

while($row = @mysqli_fetch_assoc($query)) { //ne secilin iterim variabla $row do te permbaje nje rresht rezultat nga vargu i rezultateve te kthyera
	//meqe funksioni i perdorur mysqli_fetch_assoc na kthen rreshtat rezultat si varg asociativ, atehere na duhet te marrim vetem vleren e atributut emri te tabeles departamenti
	$gjendjaaktuale1 = $row['gjendjaaktuale'];


	echo "<option value = '$gjendjaaktuale1'>$gjendjaaktuale1 </option>";

}
?>
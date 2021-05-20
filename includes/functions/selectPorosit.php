<?php

require "Includes/functions/connect.php";

$selectQuery = "SELECT id,emri_u,cmimi,adresa,gjendjaaktuale,email,transporti FROM porosia;";
//ekzekutimi i query-it
$selectQueryRes = mysqli_query($connect, $selectQuery);

if(mysqli_num_rows($selectQueryRes) == 0) {
	echo "
			<p>Nuk ka te dhena.</p>
		";
}

while($row = mysqli_fetch_assoc($selectQueryRes)) {
	//marrja e te dhenave prej rreshtave rezultat ne secilin iterim te ciklit while
	$id = $row['id'];
	$emri = $row['emri_u'];
	$cmimi = $row['cmimi'];
	$adresa= $row['adresa'];
	$gjendjaaktuale = $row['gjendjaaktuale'];
	$email = $row['email'];
    $transporti=$row['transporti'];

	echo "<div class='container'>";
	echo "<div class='row'>
         <div class='col-lg-2 col-md-6 col-sm-12 col-xs-12'>
            <h4><b>EMRI:</b> $emri</h4>
         </div>
         <div class='col-lg-2 col-md-6 col-sm-12 col-xs-12'>
            <h4><b>CMIMI:</b> $cmimi</h4>
        </div>
        <div class='col-lg-2 col-md-6 col-sm-12 col-xs-12'>
            <h4><b>ADRESA:</b> $adresa</h4>
        </div>
        <div class='col-lg-2 col-md-6 col-sm-12 col-xs-12'>
            <h4><b>Gjendja aktuale:</b> $gjendjaaktuale </h4>
        </div>
        <div class='col-lg-2 col-md-6 col-sm-12 col-xs-12'>
            <h4><b>EMAIL:</b> $email</h4>
        </div>";

			//kontrollo, nese studenti e ka paraqit lenden perkatese atehere mos e paraqit butonin Submit
			$selectQuery1 = "SELECT * FROM porosia p
							WHERE p.id='$id' and p.transporti=0;";
			//ekzekuto query-in
			$selectQuery1Res = mysqli_query($connect, $selectQuery1);
			$selectQuery1NumRow = mysqli_num_rows($selectQuery1Res);

			if($selectQuery1NumRow != 0) {
				echo "
                <div class='col-lg-2 col-md-12 col-sm-12 col-xs-12'><a class='btn btn primary'style='background:black;color:white' href = 'Includes/functions/submitPorositDB.php?id=$id&emri=$emri&cmimi=$cmimi&adresa=$adresa&gjendjaaktuale=$gjendjaaktuale&email=$email&transporti=$transporti'>Gati per Transport</a>
                    </div>";
			}
		echo "</div></div><br>";
}

?>

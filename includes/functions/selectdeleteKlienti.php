<?php

//konekto me db
require "includes/functions/connect.php";
   
    $email = $_SESSION['emaili'];

    $query = mysqli_query($connect, "SELECT * FROM perdoruesi WHERE email='$email'");

    while($row = @mysqli_fetch_assoc($query)) { 
        $id = $row['id'];
        $emri=$row['emri'];
        $mbiemri=$row['mbiemri'];
        $email=$row['email'];
	
        echo "<div class='row'>
           <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' style='background-color:white;'>
              <center>
                    <h4><b>ID:</b> $id</h4><br>
                    <h4><b>EMRI:</b> $emri</h4><br>
                    <h4><b>MBIEMRI:</b> $mbiemri</h4><br>
                    <h4><b>EMAIL:</b> $email</h4><br>
                    <div class='col-sm-3 col-lg-12'><a class='btn btn primary' href ='includes/functions/deleteKlientiDB.php?email=$email' style= 'text-decoration: none; background-color: #000000;color: white;cursor: pointer;'>Delete Account</a>
                    </div>
              </center>
         </div>
         </div>";
}

?>
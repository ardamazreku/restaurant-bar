		<li><a href="index.php"> Home </a></li>
        <li><a href="about-us.php"> About Us </a></li>

	<?php
		//nese perdoruesi nuk eshte kyq ne sistem
		if(!isset($_SESSION['emaili'])) {
			echo '	<li><a href="login.php"> SIGN IN </a></li>';
		}

		//nese perdoruesi eshte kyqur ne sistem
		else {
			if(isset($_SESSION['roli'])) {
				//student
				if($_SESSION['roli'] == 3) {
					echo '<li><a href="sendEmail.php"> Contact Us </a></li>
                          <li><a href="shop.php"> Menu </a></li>
						  <li><a href="updatePassKlienti.php"> Account </a></li>
						  <li><a href="trackKlienti.php"> Track </a></li>
                          <li><a href="shporta.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a></li>';
				}

				//punetor
				else if($_SESSION['roli'] == 2) {
					echo '<li><a href="porosit.php"> Porositë </a></li>
					<li><a href="track.php">Track</a></li>';
				}

				//administrator
				else if($_SESSION['roli'] == 1) {
					echo '<li><a href="registerRoli.php">Rolet</a></li>
						  <li><a href="registerPuntoret.php">Puntoret</a></li>
						  <li><a href="registerUshqimi.php">Ushqimet</a></li>
						  <li><a href="searchPorosite.php">Porositë</a></li>
							<li><a href="insertTrack.php">Track</a></li>
							<li><a href="registerKategorit.php">Kategorite</a></li>
						  ';
				}
			}

			echo '<li><a href = "Includes/validate/logOut.php">Logout</a></li>';
		}
	?>
